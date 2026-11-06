<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\ConsultationMessage;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        $activeChat = Consultation::where('user_id', Auth::id())
            ->whereIn('status', ['menunggu', 'berlangsung'])
            ->latest()
            ->first();

        $riwayat = Consultation::where('user_id', Auth::id())
            ->where('status', 'selesai')
            ->latest()
            ->get();

        return view('konsultasi.index', compact('activeChat', 'riwayat'));
    }

    public function jenis()
    {
        return view('konsultasi.jenis');
    }

    public function form(Request $request)
    {
        $jenis = $request->query('jenis', 'Konsultasi Keluhan Kesehatan');
        return view('konsultasi.form', compact('jenis'));
    }

    public function start(Request $request)
    {
        $request->validate(['keluhan' => 'required|string']);

        $existing = Consultation::where('user_id', Auth::id())
            ->whereIn('status', ['menunggu', 'berlangsung'])
            ->first();

        if ($existing) {
            return response()->json(['success' => true, 'id' => $existing->id]);
        }

        $consultation = Consultation::create([
            'user_id' => Auth::id(),
            'keluhan' => $request->keluhan,
            'jenis' => $request->input('jenis', 'Konsultasi Keluhan Kesehatan'),
            'status' => 'menunggu'
        ]);

        ConsultationMessage::create([
            'consultation_id' => $consultation->id,
            'sender_id' => Auth::id(),
            'message' => $request->keluhan
        ]);

        return response()->json(['success' => true, 'id' => $consultation->id]);
    }

    public function showChat($id)
    {
        $chat = Consultation::with('messages', 'nurse')->findOrFail($id);
        return view('konsultasi.chat', compact('chat'));
    }

    public function getMessages($id)
    {
        $consultation = Consultation::with('messages')->findOrFail($id);
        if (Auth::id() !== $consultation->user_id && Auth::user()->role === 'pengguna') {
            abort(403);
        }
        return response()->json($consultation->messages);
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);
        $consultation = Consultation::findOrFail($id);

        ConsultationMessage::create([
            'consultation_id' => $consultation->id,
            'sender_id' => Auth::id(),
            'message' => $request->message
        ]);

        if (Auth::user()->role === 'perawat' && $consultation->status === 'menunggu') {
            $consultation->update(['status' => 'berlangsung', 'nurse_id' => Auth::id()]);
        }

        return response()->json(['success' => true]);
    }

    public function checkStatus($id)
    {
        $consultation = Consultation::findOrFail($id);
        return response()->json(['status' => $consultation->status]);
    }

    public function finish($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => 'selesai']);
        return response()->json(['success' => true]);
    }

    public function riwayat()
    {
        $riwayat = Consultation::where('user_id', Auth::id())
            ->where('status', 'selesai')
            ->latest()
            ->get();
        return view('konsultasi.riwayat', compact('riwayat'));
    }
}