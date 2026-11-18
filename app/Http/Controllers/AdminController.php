<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function kelolaPengguna()
    {

        $users = User::all();
        return view('admin.pengguna', compact('users'));
    }
    public function pengguna()
{
    $pengguna = \App\Models\User::all();

    return view('admin.pengguna', compact('pengguna'));
}
}