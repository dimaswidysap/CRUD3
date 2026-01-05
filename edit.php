<?php

include 'koneksi.php';

// 1. AMBIL DATA LAMA (GET)
if (isset($_GET['kode'])) {
    $kode_barang = $_GET['kode'];
    

    $query_ambil = "SELECT * FROM barang WHERE kode_barang = '$kode_barang'";
    $result_ambil = mysqli_query($koneksi, $query_ambil);
    $data = mysqli_fetch_assoc($result_ambil);


    if (mysqli_num_rows($result_ambil) < 1) {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    }
} else {

    echo "<script>window.location='index.php';</script>";
}

// 2. PROSES UPDATE (POST)
if (isset($_POST['update'])) {
    // Ambil data dari form
    $kode_barang    = $_POST['kode_barang']; 
    $nama_barang    = $_POST['nama_barang'];
    $kategori       = $_POST['kategori'];
    $harga          = $_POST['harga'];
    $stok           = $_POST['stok'];

    // Query Update
    $query_update = "UPDATE barang SET 
                        nama_barang = '$nama_barang',
                        kategori = '$kategori',
                        harga = '$harga',
                        stok = '$stok'
                     WHERE kode_barang = '$kode_barang'";
    
    $result_update = mysqli_query($koneksi, $query_update);

    if ($result_update) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href='index.php'; // Kembali ke halaman utama
              </script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
   
    <link rel="stylesheet" href="edit.css">
</head>
<body>

    <div class="container">
        <div class="header-form">
            <h2>Edit Barang</h2>
            <p>Perbarui informasi inventaris barang</p>
        </div>

        <form action="" method="POST" class="form-body">
            
            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" value="<?= $data['kode_barang']; ?>" readonly class="input-readonly">
                <small>Kode barang tidak dapat diubah.</small>
            </div>

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <div class="select-wrapper">
                    <select name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Elektronik" <?= ($data['kategori'] == 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                        <option value="Aksesoris" <?= ($data['kategori'] == 'Aksesoris') ? 'selected' : ''; ?>>Aksesoris</option>
                        <option value="ATK" <?= ($data['kategori'] == 'ATK') ? 'selected' : ''; ?>>ATK</option>
                        <option value="Makanan" <?= ($data['kategori'] == 'Makanan') ? 'selected' : ''; ?>>Makanan</option>
                        <option value="Lainnya" <?= ($data['kategori'] == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Harga (Rp)</label>
                    <input type="number" name="harga" value="<?= $data['harga']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" value="<?= $data['stok']; ?>" required>
                </div>
            </div>

            <div class="action-buttons">
                <a href="index.php" class="btn-cancel">Batal</a>
                <button type="submit" name="update" class="btn-save">Simpan Perubahan</button>
            </div>

        </form>
    </div>

</body>
</html>