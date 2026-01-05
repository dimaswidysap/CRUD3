<?php

include 'koneksi.php'; 


if (isset($_GET['kode'])) {
    

    $kode_barang = $_GET['kode'];


    $query = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";
    $hasil = mysqli_query($koneksi, $query);


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
  
    echo "<script>
            alert('Kode barang tidak ditemukan!');
            window.location.href = 'index.php';
          </script>";
}
?>