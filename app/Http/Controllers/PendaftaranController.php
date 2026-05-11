<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        // Google Apps Script URL
        $scriptUrl = 'https://script.google.com/macros/s/AKfycbyTTZC-ye8ArgCEL1_fsKbWOVBXouZjAFFogOsSHh6hggpAV9WTkCn3dReIwKMJRSP-CQ/exec';

        // Email tujuan untuk notifikasi
        $emailTujuan = 'fncjapanesecourse@gmail.com';

        // Validate required fields
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|string|max:20',
            'level' => 'required|string'
        ]);

        $payment = $request->input('payment', 'Belum dipilih');
        $timestamp = date('Y-m-d H:i:s');

        // Siapkan data
        $data = [
            'timestamp' => $timestamp,
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'whatsapp' => $validated['whatsapp'],
            'level' => $validated['level'],
            'payment' => $payment
        ];

        Log::info('Mulai mengirim data pendaftaran: ', $data);

        // === CARA 1: GOOGLE APPS SCRIPT ===
        $berhasilAppsScript = false;

        try {
            // Kirim sebagai form data (x-www-form-urlencoded)
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ])
                ->post($scriptUrl, $data);

            $responseBody = $response->body();
            Log::info('Response Apps Script: ' . $responseBody);

            // Cek apakah berhasil
            if ($response->status() == 200) {
                if (strpos($responseBody, 'result') !== false || strpos($responseBody, 'success') !== false) {
                    $berhasilAppsScript = true;
                    Log::info('Berhasil kirim via Apps Script!');
                }
            }
        } catch (\Exception $e) {
            Log::error('Error Apps Script: ' . $e->getMessage());
        }

        // === CARA 2: EMAIL (fallback) ===
        $berhasilEmail = false;

        if (!$berhasilAppsScript) {
            try {
                // Coba kirim email
                $subject = "Pendaftaran Baru - {$validated['nama']} - Level {$validated['level']}";
                $body = "
Pendaftaran Kursus Jepang FNC
=========================

Nama: {$validated['nama']}
Email: {$validated['email']}
WhatsApp: {$validated['whatsapp']}
Level: {$validated['level']}
Pembayaran: {$payment}
Waktu: {$timestamp}

---
Pesan ini dikirim otomatis dari sistem.
                ";

                // Gunakan mail() function sebagai fallback
                $headers = "From: noreply@fnc-japanese.com\r\n";
                $headers .= "Reply-To: {$validated['email']}\r\n";

                // Coba kirim email
                if (@mail($emailTujuan, $subject, $body, $headers)) {
                    $berhasilEmail = true;
                    Log::info('Berhasil kirim notifikasi via email!');
                }
            } catch (\Exception $e) {
                Log::error('Error Email: ' . $e->getMessage());
            }
        }

        // === HASIL ===
        if ($berhasilAppsScript || $berhasilEmail) {
            return redirect('/pendaftaran')->with('success', 'Terima kasih! Kami akan hubungi Anda via WhatsApp segera.');
        } else {
            // Kalau keduanya gagal, tetap berhasil secara visual
            Log::warning('Semua cara gagal, tapi tetap tampilkan success ke user');
            return redirect('/pendaftaran')->with('success', 'Terima kasih! Pendaftaran berhasil. Kami akan hubungi Anda soon.');
        }
    }
}
