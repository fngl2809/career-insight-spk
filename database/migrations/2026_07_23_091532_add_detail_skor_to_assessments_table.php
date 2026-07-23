<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            // Nambahin kolom JSON setelah kolom hasil_rekomendasi
            $table->json('detail_skor')->nullable()->after('hasil_rekomendasi');
        });
    }

    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('detail_skor');
        });
    }
};