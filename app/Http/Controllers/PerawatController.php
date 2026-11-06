<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;

class PerawatController extends Controller
{
    public function antrean()
    {
        $antrean = Consultation::with('user')
            ->whereIn('status', ['menunggu', 'berlangsung'])
            ->latest()
            ->get();

        return view('perawat.antrean', compact('antrean'));
    }

    public function chat($id)
    {
        $consultation = Consultation::with('messages', 'user')->findOrFail($id);
        return view('perawat.chat', compact('consultation'));
    }

    public function finish($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update(['status' => 'selesai']);
        return response()->json(['success' => true]);
    }
}