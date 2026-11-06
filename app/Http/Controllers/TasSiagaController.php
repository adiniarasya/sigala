<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBagItem;
use Illuminate\Support\Facades\Auth;

class TasSiagaController extends Controller
{
    public function index()
    {
        $defaultItems = [
            ['name' => 'Air Minum', 'icon' => '💧'],
            ['name' => 'Makanan Siap Saji', 'icon' => '🥫'],
            ['name' => 'Obat-obatan Pribadi', 'icon' => '💊'],
            ['name' => 'Kotak P3K', 'icon' => '🧰'],
            ['name' => 'Senter & Baterai', 'icon' => '🔦'],
            ['name' => 'Power Bank', 'icon' => '🔋'],
            ['name' => 'Dokumen Penting', 'icon' => '📄'],
            ['name' => 'Pakaian Ganti', 'icon' => '👕'],
            ['name' => 'Perlengkapan Kebersihan', 'icon' => '🧼'],
        ];

        $userItems = UserBagItem::where('user_id', Auth::id())->get();

        if ($userItems->isEmpty()) {
            foreach ($defaultItems as $item) {
                UserBagItem::create([
                    'user_id' => Auth::id(),
                    'item_name' => $item['name'],
                    'is_checked' => false
                ]);
            }
            $userItems = UserBagItem::where('user_id', Auth::id())->get();
        }

        return view('tas-siaga.index', compact('userItems'));
    }

    public function update(Request $request)
    {
        $item = UserBagItem::where('id', $request->id)->where('user_id', Auth::id())->first();
        
        if ($item) {
            $item->is_checked = $request->is_checked;
            $item->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}