<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Menangkap kiriman 135 jawaban kuesioner dari Frontend
     */
    public function store(Request $request)
    {
        // Sihir 'dd' (Dump and Die) buat nampilin semua data yang masuk ke layar secara mentah
        // Ini cara paling ampuh buat ngecek data sebelum masuk ke rumus matematika SPK!
        dd($request->all());
    }
}