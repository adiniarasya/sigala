<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screening;
use Illuminate\Support\Facades\Auth;

class CekKondisiController extends Controller
{
    public function index()
    {
        return view('cek-kondisi.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keluhan' => 'required|string',
            'is_danger' => 'required|boolean',
            'detail_bahaya' => 'nullable|string'
        ]);

        Screening::create([
            'user_id' => Auth::id(),
            'keluhan' => $request->keluhan,
            'is_danger' => $request->is_danger,
            'detail_bahaya' => $request->detail_bahaya,
        ]);

        return response()->json(['success' => true]);
    }
}