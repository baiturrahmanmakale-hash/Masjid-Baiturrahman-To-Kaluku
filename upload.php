<?php
// Tentukan file utama tempat berita ditampilkan
$file_target = "index.php"; 

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $cerita = $_POST['cerita'];
    
    // Format tanggal otomatis hari ini (Contoh: 13 Juni 2026)
    $daftar_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $tanggal_hari_ini = date('j') . ' ' . $daftar_bulan[(int)date('m')] . ' ' . date('Y');

    // Proses unggah foto ke folder 'FOTO/'
    $nama_foto = $_FILES['foto']['name'];
    $lokasi_sementara = $_FILES['foto']['tmp_name'];
    $folder_tujuan = "FOTO/" . $nama_foto;

    if (move_uploaded_file($lokasi_sementara, $folder_tujuan)) {
        
        // Buat potongan kode HTML berita baru
        $berita_baru = '
      <!-- BERITA BARU DARI FORMULIR -->
      <div class="berita-card fade-in">
        <div class="berita-img">
          <img src="' . $folder_tujuan . '" alt="' . $judul . '" loading="lazy" />
          <span class="berita-date">📅 ' . $tanggal_hari_ini . '</span>
        </div>
        <div class="berita-body">
          <h4>' . $judul . '</h4>
          <p>' . $cerita . '</p>
          <a href="#" class="berita-link">Baca selengkapnya →</a>
        </div>
      </div>';

        // Baca konten index.php saat ini
        $konten_website = file_get_contents($file_target);

        // Sisipkan berita baru tepat di bawah pembuka grid pembungkus berita agar berada paling atas
        $pembatas = '<div class="berita-grid">';
        $konten_baru = str_replace($pembatas, $pembatas . $berita_baru, $konten_website);

        // Simpan kembali ke file index.php
        if (file_put_contents($file_target, $konten_baru)) {
            echo "<script>alert('Kegiatan Baru Berhasil Ditayangkan di Paling Atas!'); window.location='upload.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui halaman berita.');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengunggah foto. Pastikan folder FOTO tersedia.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upload Kegiatan Baru</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f3f7f4; padding: 40px 10px; margin: 0; }
        .upload-container { max-width: 600px; background: #fff; padding: 40px; margin: 0 auto; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 5px solid #14452F; }
        .header-form { text-align: center; font-size: 1.5rem; color: #14452F; font-weight: bold; margin-bottom: 30px; display: flex; align-items: center; justify-content: center; gap: 10px; }
        label { font-weight: 600; display: block; margin-top: 20px; color: #333; font-size: 0.95rem; }
        input[type="text"], textarea { width: 100%; padding: 12px; margin-top: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; font-size: 0.95rem; }
        input[type="file"] { width: 100%; padding: 10px; margin-top: 8px; border: 1px dashed #bbb; background: #fafafa; border-radius: 6px; box-sizing: border-box; }
        .btn-submit { background: #14452F; color: white; border: none; padding: 14px; margin-top: 30px; width: 100%; border-radius: 6px; font-size: 1rem; font-weight: bold; cursor: pointer; transition: background 0.3s ease; }
        .btn-submit:hover { background: #0e3021; }
        .back-link { text-align: center; display: block; margin-top: 20px; font-size: 0.85rem; color: #666; text-decoration: none; }
        .back-link:hover { color: #14452F; }
    </style>
</head>
<body>

<div class="upload-container">
    <div class="header-form">
        <span>➕ Upload Kegiatan Baru</span>
    </div>
    
    <!-- Atribut enctype wajib ada untuk fitur upload file/foto -->
    <form action="" method="POST" enctype="multipart/form-data">
        
        <label>Pilih Foto:</label>
        <input type="file" name="foto" accept="image/*" required>

        <label>Judul Kegiatan / Kata Mutiara:</label>
        <input type="text" name="judul" required placeholder="Contoh: Semarak Ramadhan ✨">

        <label>Cerita / Deskripsi Kegiatan:</label>
        <textarea name="cerita" rows="6" required placeholder="Tuliskan cerita jalannya kegiatan di sini..."></textarea>

        <button type="submit" name="submit" class="btn-submit">Simpan &amp; Masukkan ke Galeri</button>
    </form>

    <a href="index.php" class="back-link">← Kembali ke Halaman Utama</a>
</div>

</body>
</html>
