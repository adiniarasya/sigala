<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function kelolaPengguna()
    {
        // Mengambil semua user dari database
        $users = User::all();
        return view('admin.pengguna', compact('users'));
    }
}