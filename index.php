<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Berita Masjid Baiturrahman</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f3f7f4; margin: 0; padding: 20px; }
        h2 { text-align: center; color: #14452F; margin-bottom: 30px; }
        .berita-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px; max-width: 1200px; margin: 0 auto; }
        .berita-card { background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); transition: transform 0.2s; }
        .berita-card:hover { transform: translateY(-5px); }
        .berita-img img { width: 100%; height: 200px; object-fit: cover; }
        .berita-date { display: block; padding: 10px 15px 0 15px; color: #666; font-size: 0.85rem; }
        .berita-body { padding: 15px; }
        .berita-body h4 { margin: 0 0 10px 0; color: #14452F; font-size: 1.2rem; }
        .berita-body p { margin: 0; color: #555; font-size: 0.95rem; line-height: 1.5; }
    </style>
</head>
<body>

    <h2>📰 Galeri Kegiatan Masjid</h2>

    <!-- ⚠️ KUNCI UTAMA: Kode upload.php akan selalu menyisipkan berita baru tepat di bawah baris pembuka grid ini -->
    <div class="berita-grid">

      <!-- CONTOH BERITA AWAL -->
      <div class="berita-card">
        <div class="berita-img">
          <img src="https://placeholder.com" alt="Sampel" />
          <span class="berita-date">📅 16 Juni 2026</span>
        </div>
        <div class="berita-body">
          <h4>Selamat Datang di Galeri Masjid</h4>
          <p>Ini adalah area tempat berita baru dari formulir XAMPP akan muncul otomatis secara berurutan ke bawah.</p>
        </div>
      </div>

    </div>

</body>
</html>
