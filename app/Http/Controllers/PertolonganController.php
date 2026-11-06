<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstAidTopic;

class PertolonganController extends Controller
{
    public function index()
    {
        $topics = FirstAidTopic::all();
        return view('pertolongan.index', compact('topics'));
    }

    public function show($slug)
    {
        $topic = FirstAidTopic::where('slug', $slug)->with('steps')->firstOrFail();
        return view('pertolongan.show', compact('topic'));
    }
}