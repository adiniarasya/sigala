<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BmkgController extends Controller
{
    public function getGempaTerkini()
    {
        $data = Cache::remember('gempa_terkini', 300, function () {
            try {
                $response = Http::get('https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json');
                
                if ($response->successful()) {
                    $json = $response->json();
                    $gempa = $json['Infogempa']['gempa'];
                    
                    return [
                        'magnitude' => $gempa['Magnitude'],
                        'kedalaman' => $gempa['Kedalaman'],
                        'wilayah' => $gempa['Wilayah'],
                        'waktu' => $gempa['Tanggal'] . ' ' . $gempa['Jam'],
                        'potensi_tsunami' => $gempa['Potensi'],
                    ];
                }
            } catch (\Exception $e) {
                return null;
            }
            
            return null;
        });

        return $data;
    }
}