<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment; // Panggil model Gudang kita
use Illuminate\Support\Facades\Auth; // Buat ngecek siapa user yang lagi login

class QuizController extends Controller
{
    public function store(Request $request)
    {
        // 1. Ambil semua jawaban (q1 sampai q135) dari form, buang data keamanan '_token'
        $data_jawaban = $request->except('_token');

        // 2. Tempelin ID user yang lagi login biar ketahuan ini jawaban punya siapa
        // (Pastikan kamu udah Register/Login di aplikasinya ya pas ngetes ini!)
        $data_jawaban['user_id'] = Auth::id();

        // 3. SIHIR UTAMA: Masukin semua 135 jawaban itu ke tabel 'assessments' di Laragon!
        Assessment::create($data_jawaban);

        // 4. Setelah sukses tersimpan, tampilkan pesan kemenangan ini di layar
        return "ALHAMDULILLAH YEYYY! DATA 135 JAWABANMU UDAH SUKSES TERSIMPAN PERMANEN DI DATABASE LARAGON! 🎉 BENTAR LAGI KITA HITUNG PAKAI METODE SPK!";
    }
}