<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Screening; 

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $screenings = Screening::where('user_id', $user->id)->latest()->take(5)->get();

        return view('profil.index', compact('user', 'screenings'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'usia' => 'nullable|integer',
            'gender' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'alamat' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }
            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $user->foto_profil = $path;
        }

        if ($request->filled('nama')) {
            $user->name = $request->nama;
        }

        $user->usia = $request->usia;
        $user->gender = $request->gender;
        $user->whatsapp = $request->whatsapp;
        $user->alamat = $request->alamat;
        
        $user->save();

        return back()->with('success', 'Data pribadi berhasil diperbarui!');
    }

    public function updateKesehatan(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'berat' => 'nullable|integer',
            'tinggi' => 'nullable|integer',
            'golongan_darah' => 'nullable|string',
            'alergi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
        ]);

        $user->update($request->only('berat', 'tinggi', 'golongan_darah', 'alergi', 'riwayat_penyakit'));

        return back()->with('success', 'Informasi kesehatan berhasil diperbarui!');
    }

    public function kesehatan()
    {
        return view('profil.kesehatan');
    }
}