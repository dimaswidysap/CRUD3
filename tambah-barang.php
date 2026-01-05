<?php
// Panggil koneksi database
include 'koneksi.php';

// Cek apakah tombol simpan sudah diklik
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $harga       = $_POST['harga'];
    $stok        = $_POST['stok'];

    // Cek apakah kode barang sudah ada (mencegah duplikat)
    $cek_kode = mysqli_query($koneksi, "SELECT kode_barang FROM barang WHERE kode_barang = '$kode_barang'");
    
    if (mysqli_num_rows($cek_kode) > 0) {
        // Jika kode sudah ada, tampilkan peringatan
        echo "<script>
                alert('Gagal! Kode Barang $kode_barang sudah terdaftar.');
              </script>";
    } else {
        // Jika kode belum ada, lakukan proses INSERT
        $query = "INSERT INTO barang (kode_barang, nama_barang, kategori, harga, stok) 
                  VALUES ('$kode_barang', '$nama_barang', '$kategori', '$harga', '$stok')";
        
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>
                    alert('Data Barang Berhasil Ditambahkan!');
                    window.location.href='index.php';
                  </script>";
        } else {
            echo "<script>alert('Gagal menambahkan data!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="tambah-barang.css">
</head>
<body>

    <div class="card">
        <h2>Tambah Barang Baru</h2>
        
        <form action="" method="POST">
            
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" name="kode_barang" placeholder="Contoh: BRG011" required autofocus autocomplete="off">
            </div>

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" placeholder="Contoh: Headset Gaming" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" required>
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Aksesoris">Aksesoris</option>
                    <option value="ATK">ATK (Alat Tulis Kantor)</option>
                    <option value="Makanan">Makanan/Minuman</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div class="row">
                <div class="form-group half">
                    <label for="harga">Harga (Rp)</label>
                    <input type="number" name="harga" placeholder="0" required min="0">
                </div>

                <div class="form-group half">
                    <label for="stok">Stok Awal</label>
                    <input type="number" name="stok" placeholder="0" required min="0">
                </div>
            </div>

            <div class="btn-container">
                <button type="submit" name="simpan" class="btn btn-save">Simpan Barang</button>
                <a href="index.php" class="btn btn-cancel">Batal</a>
            </div>

        </form>
    </div>

</body>
</html>