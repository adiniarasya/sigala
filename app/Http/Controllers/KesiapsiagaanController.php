<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PreparednessScore;
use Illuminate\Support\Facades\Auth;

class KesiapsiagaanController extends Controller
{
    public function index()
    {
        return view('kesiapsiagaan.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'score' => 'required|integer',
            'status' => 'required|string'
        ]);

        // Hapus skor lama user ini agar hanya menyimpan skor terbaru
        PreparednessScore::where('user_id', Auth::id())->delete();

        PreparednessScore::create([
            'user_id' => Auth::id(),
            'score' => $request->score,
            'status' => $request->status,
        ]);

        return response()->json(['success' => true]);
    }
}