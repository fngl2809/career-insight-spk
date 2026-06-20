<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi Karier</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; padding: 20px; color: #333; }
        .container { max-width: 700px; margin: 0 auto; background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #2c3e50; font-size: 24px; margin-bottom: 10px; }
        p.subtitle { text-align: center; color: #7f8c8d; margin-bottom: 30px; }
        
        .juara-1 { background-color: #d4edda; border: 2px solid #c3e6cb; color: #155724; padding: 20px; border-radius: 8px; margin-bottom: 30px; text-align: center; }
        .juara-1 h2 { margin: 0 0 5px 0; font-size: 28px; }
        .juara-1 span { font-size: 14px; font-weight: normal; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; border-bottom: 1px solid #e0e0e0; text-align: left; }
        th { background-color: #3498db; color: white; text-transform: uppercase; font-size: 14px; }
        tr:hover { background-color: #f1f1f1; }
        
        .btn-kembali { display: block; width: 200px; margin: 40px auto 0; padding: 12px; text-align: center; background-color: #2c3e50; color: white; text-decoration: none; border-radius: 6px; font-weight: bold; transition: 0.3s; }
        .btn-kembali:hover { background-color: #1a252f; }
    </style>
</head>
<body>

    <div class="container">
        <h1>🎉 Yeay! Hasil Analisis Kariermu Sudah Keluar 🎉</h1>
        <p class="subtitle">Berdasarkan perhitungan SPK (Profile Matching + AHP + TOPSIS)</p>

        @php
            // Karena $ranking sudah diurutkan dari nilai terbesar ke terkecil di Controller,
            // Kita tinggal ambil elemen paling pertama sebagai Juara 1!
            $juara_1_key = array_key_first($ranking);
            $juara_1_nilai = $ranking[$juara_1_key];
        @endphp

        <div class="juara-1">
            <span style="font-size: 20px;">🏆 Rekomendasi Utama Kamu 🏆</span>
            <h2>{{ strtoupper(str_replace('_', ' ', $juara_1_key)) }}</h2>
            <span>Nilai Preferensi (V): <strong>{{ number_format($juara_1_nilai, 4) }}</strong></span>
        </div>

        <h3>📊 Detail Peringkat 9 Bidang Karier:</h3>
        <table>
            <thead>
                <tr>
                    <th>Peringkat</th>
                    <th>Bidang Karier</th>
                    <th>Nilai Preferensi (V)</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($ranking as $bidang => $nilai)
                    <tr>
                        <td style="font-weight: bold; text-align: center; width: 80px;">#{{ $no++ }}</td>
                        <td>{{ strtoupper(str_replace('_', ' ', $bidang)) }}</td>
                        <td>{{ number_format($nilai, 4) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/" class="btn-kembali">Kembali ke Beranda</a>
    </div>

</body>
</html>