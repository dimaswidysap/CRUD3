<?php
// 1. HUBUNGKAN KE DATABASE
// Sesuaikan path ini. 
// Jika file ini ada di folder utama, gunakan 'koneksi.php'
// Jika file ini ada di dalam folder 'code-aksi', gunakan '../koneksi.php'
include 'koneksi.php'; 

// 2. CEK PARAMETER URL
// Memastikan ada 'kode' yang dikirim (misal: hapus.php?kode=BRG001)
if (isset($_GET['kode'])) {
    
    // Ambil data kode dari URL
    $kode_barang = $_GET['kode'];

    // 3. JALANKAN QUERY DELETE
    // Menghapus baris di tabel 'barang' yang kode_barangnya cocok
    $query = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";
    $hasil = mysqli_query($koneksi, $query);

    // 4. CEK KEBERHASILAN
    if ($hasil) {
        echo "<script>
                alert('Data barang berhasil dihapus!');
                // Redirect kembali ke halaman index (sesuaikan path jika perlu)
                window.location.href = 'index.php'; 
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data! Error: " . mysqli_error($koneksi) . "');
                window.location.href = 'index.php';
              </script>";
    }

} else {
    // Jika user mencoba buka hapus.php tanpa klik tombol (tanpa parameter kode)
    echo "<script>
            alert('Kode barang tidak ditemukan!');
            window.location.href = 'index.php';
          </script>";
}
?>