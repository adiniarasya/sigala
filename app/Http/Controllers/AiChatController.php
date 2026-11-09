<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Content;

class AiChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate(['message' => 'required|string']);

        try {
            $systemInstruction = Content::parse(
                'Kamu adalah Asisten SIGALA, asisten virtual yang ahli dalam kebencanaan dan kesehatan. 
                Jawablah dengan singkat, jelas, dan ramah. 
                Jangan pernah memberikan diagnosis medis. Selalu sarankan untuk menghubungi tenaga medis profesional.'
            );

$response = Gemini::generativeModel(model: 'gemini-3.5-flash-lite')
                ->withSystemInstruction($systemInstruction)
                ->generateContent($request->message);

            return response()->json([
                'success' => true,
                'reply' => $response->text()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'reply' => 'ERROR: ' . $e->getMessage()
            ]);
        }
    }
}