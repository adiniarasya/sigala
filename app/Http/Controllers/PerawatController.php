<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerawatController extends Controller
{
    public function dashboard()
    {
        $totalAntrean = Consultation::where('status', 'menunggu')->count();
        $sedangDitangani = Consultation::where('status', 'berlangsung')->count();
        $selesaiHariIni = Consultation::where('status', 'selesai')
                            ->whereDate('updated_at', \Carbon\Carbon::today())->count();
        
        $pasienMenunggu = Consultation::with('user')
                            ->where('status', 'menunggu')
                            ->orderBy('created_at', 'asc')
                            ->get();

        return view('dashboard-perawat', compact('totalAntrean', 'sedangDitangani', 'selesaiHariIni', 'pasienMenunggu'));
    }

    public function antrean()
    {
        $antrean = Consultation::with('user')
                    ->whereIn('status', ['menunggu', 'berlangsung'])
                    ->orderBy('created_at', 'asc')
                    ->get();

        return view('perawat.antrean', compact('antrean'));
    }

    public function riwayat()
    {
        $riwayat = Consultation::with('user')
                    ->where('status', 'selesai')
                    ->orderBy('updated_at', 'desc')
                    ->get();

        return view('perawat.riwayat', compact('riwayat'));
    }

    public function chat($id)
    {
        $consultation = Consultation::with('user')->findOrFail($id);
        
        if ($consultation->status === 'menunggu') {
            $consultation->update([
                'status' => 'berlangsung',
                'nurse_id' => Auth::id()
            ]);
        }

        $chats = Chat::where('consultation_id', $id)->orderBy('created_at', 'asc')->get();

        return view('perawat.chat', compact('consultation', 'chats'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        
        Chat::create([
            'consultation_id' => $id,
            'sender_id' => Auth::id(),
            'message' => $request->message
        ]);

        return response()->json(['status' => 'success']);
    }

    public function finishChat($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => 'selesai']);
        
        return response()->json(['status' => 'success']);
    }

    public function getMessages($id)
    {
        $chats = Chat::where('consultation_id', $id)->orderBy('created_at', 'asc')->get();
        return response()->json($chats);
    }
}