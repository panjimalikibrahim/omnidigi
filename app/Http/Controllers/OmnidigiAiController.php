<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OmnidigiAiController extends Controller
{
    /**
     * Handle permintaan chat OMNIDIGI AI via OpenRouter API
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $userMessage =$request->input('message');
        $apiKey = env('OMNIDIGI_AI_API_KEY');$apiUrl = trim(env('OMNIDIGI_AI_API_URL', 'https://openrouter.ai/api/v1/chat/completions'));

        if (!$apiKey) {
            return response()->json([
                'status' => 'error',
                'reply'  => 'API Key OMNIDIGI AI belum dikonfigurasi di file .env'
            ]);
        }

        try {
            $response = Http::withoutVerifying()->timeout(30)->withHeaders([
                'Authorization' => 'Bearer ' . trim($apiKey),
                'Content-Type'  => 'application/json',
                'HTTP-Referer'  => config('app.url', 'http://localhost'),
                'X-Title'       => 'PLN DIGI - OMNIDIGI AI',
            ])->post($apiUrl, [
                'model'      => 'google/gemini-2.5-flash-lite',
                'max_tokens' => 300,
                'messages'   => [
                    [
                        'role' => 'system',
                        'content' => 'Anda adalah OMNIDIGI AI, asisten virtual resmi PLN DIGI sekaligus teman ngobrol yang ramah, santai, asik, dan solutif.

Aturan Komunikasi & Gaya Bahasa:
1. Berkomunikasilah dengan gaya bahasa yang ramah, luwes, komunikatif, dan natural seperti teman membantu teman (hindari bahasa yang kaku seperti robot/formal berlebihan).
2. Jika pengguna menyebut "kmu", "kamu", "lu", "anda", "engkau", atau sejenisnya, itu merujuk langsung kepada Anda (OMNIDIGI AI).
3. Berikan jawaban yang ringkas, jelas, dan langsung pada intinya.
4. DILARANG menggunakan karakter markdown seperti bintang ganda (**), bintang tunggal (*), hashtag (#), backtick (`), atau penanda kodingan lainnya. Gunakan teks biasa yang rapi.
5. Pahami konteks seputar kelistrikan, pembayaran tagihan, pembelian token, simulasi tambah daya, dan pengaduan layanan PLN.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $userMessage
                    ]
                ]
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                $rawReply = $responseData['choices'][0]['message']['content'] ?? null;

                if (is_array($rawReply)) {
                    $rawReply = collect($rawReply)->pluck('text')->implode(' ');
                }

                if (!$rawReply) {
                    $rawReply = 'Halo! Saya OMNIDIGI AI. Ada yang bisa saya bantu terkait layanan listrik PLN kamu hari ini?';
                }

                // Pembersihan otomatis karakter markdown
                $cleanReply = preg_replace('/\*\*(.*?)\*\*/', '$1', $rawReply);
                $cleanReply = preg_replace('/\*(.*?)\*/', '$1', $cleanReply);
                $cleanReply = preg_replace('/[#`_]/', '', $cleanReply);
                $cleanReply = trim($cleanReply);

                return response()->json([
                    'status' => 'success',
                    'reply'  => $cleanReply
                ]);
            }

            // Jika API merespons selain status 200 OK
            $errorMsg = $response->json()['error']['message'] ?? ('HTTP Status ' .$response->status());

            return response()->json([
                'status' => 'error',
                'reply'  => 'Maaf, AI sedang sibuk: ' . $errorMsg
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'reply'  => 'Maaf, terjadi kesalahan sistem: ' . $e->getMessage()
            ]);
        }
    }
}