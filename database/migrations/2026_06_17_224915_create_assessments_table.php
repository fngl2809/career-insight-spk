<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            
            // Mengaitkan jawaban dengan user yang login
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Sihir Looping: Otomatis bikin 135 kolom (q1 sampai q135) untuk nampung nilai 1-5
            for ($i = 1; $i <= 135; $i++) {
                $table->integer('q' . $i);
            }

            // Kolom untuk menyimpan hasil akhir rekomendasi karier setelah dihitung SPK
            $table->string('hasil_rekomendasi')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};