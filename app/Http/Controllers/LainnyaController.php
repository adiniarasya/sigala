<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LainnyaController extends Controller
{
    public function index()
    {
        return view('lainnya.index');
    }

    public function kartuDarurat()
    {
        return view('lainnya.kartu-darurat');
    }

    public function kontakDarurat()
    {
        return view('lainnya.kontak-darurat');
    }

    public function panduanEvakuasi()
    {
        return view('lainnya.panduan-evakuasi');
    }
        public function tentang()
    {
        return view('lainnya.tentang');
    }

    public function faq()
    {
        return view('lainnya.faq');
    }
}