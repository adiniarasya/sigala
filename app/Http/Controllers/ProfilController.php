<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Screening;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $screenings = Screening::where('user_id', Auth::id())->latest()->get();
        return view('profil.index', compact('screenings'));
    }
}