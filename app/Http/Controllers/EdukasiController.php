<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disaster;

class EdukasiController extends Controller
{
    public function index()
    {
        $disasters = Disaster::all();
        return view('edukasi.index', compact('disasters'));
    }

    public function show($slug)
    {
        $disaster = Disaster::where('slug', $slug)->firstOrFail();
        return view('edukasi.show', compact('disaster'));
    }
}