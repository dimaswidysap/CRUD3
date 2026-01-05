<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/universal.css">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="index.css">
    <title>Inventaris Toko</title>
</head>
<body>

    <main class="main-container">
        <h2 style="margin-top: 2rem; color: #333;">Manajemen Inventaris</h2>

        <section class="tambah-transaksi">
            <a href="tambah-barang.php"><span></span><span>Tambah Barang</span></a>
        </section>

        <section class="container-table">
            <table>
                <tr class="adiedja">
                    <td>Kode Barang</td>
                    <td>Nama Barang</td>
                    <td>Kategori</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Aksi</td>
                </tr>

                <?php
                // Koneksi Database (Sesuaikan nama DB di file koneksi.php menjadi 'db_toko')
                include 'koneksi.php';

                $query = "SELECT * FROM barang ORDER BY kode_barang ASC";
                $result = mysqli_query($koneksi, $query);

                if (!$result) {
                    echo "<tr><td colspan='6'>Error: " . mysqli_error($koneksi) . "</td></tr>";
                } elseif (mysqli_num_rows($result) == 0) {
                    echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data barang.</td></tr>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="table-transaksi">
                        <td><?= $row['kode_barang']; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['kategori']; ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?= $row['stok']; ?> pcs</td>
                        
                        <td class="adnieg">
                            <a class="link-aksi" href="edit.php?kode=<?= $row['kode_barang']; ?>">
                                <span></span>
                                <span>Edit</span>
                            </a>
                            
                            <a class="link-aksi" 
                               href="hapus.php?kode=<?= $row['kode_barang']; ?>" 
                               onclick="return confirm('Yakin ingin menghapus barang <?= $row['nama_barang']; ?>?');">
                                <span></span>
                                <span>Hapus</span> 
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                }
                ?>
            </table>
        </section>        
    </main>

    <script type="module" src="./js/nav.js"></script>
</body>
</html>