<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultation;
use App\Models\ConsultationMessage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

        $this->kirimAutoReply($consultation, $request->keluhan);

        return response()->json(['success' => true, 'id' => $consultation->id]);
    }

    public function showChat($id)
    {
        $chat = Consultation::with('messages', 'nurse')->findOrFail($id);
        
        $jamSekarang = \Carbon\Carbon::now()->hour;
        $isJamKerja = ($jamSekarang >= 8 && $jamSekarang < 17);
        $isOffline = !$isJamKerja && $chat->status === 'menunggu';

        return view('konsultasi.chat', compact('chat', 'isOffline'));
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
        } elseif (Auth::user()->role === 'pengguna') {
            $this->kirimAutoReply($consultation, $request->message);
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

            private function kirimAutoReply($consultation, $pesan)
    {
        $jamSekarang = \Carbon\Carbon::now()->hour;
        $isJamKerja = ($jamSekarang >= 8 && $jamSekarang < 17);

        $pesanLower = strtolower($pesan);
        $kataDarurat = ['sesak napas', 'pendarahan', 'pingsan', 'nyeri dada', 'kejang', 'tidak sadar'];
        $isDarurat = false;
        foreach ($kataDarurat as $kata) {
            if (str_contains($pesanLower, $kata)) {
                $isDarurat = true;
                break;
            }
        }

        if (!$isJamKerja && $consultation->status === 'menunggu') {
            ConsultationMessage::create([
                'consultation_id' => $consultation->id,
                'sender_id' => 1,
                'message' => 'Halo, perawat kami sedang offline (Jam Operasional: 08:00 - 17:00). Pesan Anda sudah masuk antrean dan akan dibalas pada jam kerja berikutnya.'
            ]);
        }

        if ($isDarurat) {
            ConsultationMessage::create([
                'consultation_id' => $consultation->id,
                'sender_id' => 1,
                'message' => '⚠️ PERINGATAN DARURAT: Berdasarkan pesan Anda, segera hubungi 119 atau datang ke IGD fasilitas kesehatan terdekat. Jangan menunggu balasan perawat. Klik tombol darurat di bawah.'
            ]);
        }
    }
}