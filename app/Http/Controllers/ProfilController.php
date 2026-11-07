<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screening;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $screenings = Screening::where('user_id', Auth::id())->latest()->get();
        return view('profil.index', compact('screenings'));
    }

    public function kesehatan()
    {
        return view('profil.kesehatan');
    }

    public function updateKesehatan(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'tinggi' => $request->tinggi,
            'berat' => $request->berat,
            'riwayat_penyakit' => $request->riwayat_penyakit,
            'alergi' => $request->alergi,
            'obat_rutin' => $request->obat_rutin,
            'kelompok_risiko' => $request->kelompok_risiko,
        ]);
        return response()->json(['success' => true]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'alamat' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil) {
                Storage::delete('public/' . $user->foto_profil);
            }
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $user->foto_profil = $path;
        }

        if ($request->has('alamat')) {
            $user->alamat = $request->alamat;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}