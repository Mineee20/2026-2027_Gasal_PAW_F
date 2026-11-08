<?php
include 'koneksi.php';

$query = "SELECT barang.*, supplier.nama AS namasupplier 
          FROM barang 
          JOIN supplier ON barang.supplier_id = supplier.id 
          ORDER BY barang.id ASC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        .alert-error { padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; margin-bottom: 15px; }
        .alert-success { padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; margin-bottom: 15px; }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .btn:hover { background-color: #5a6268; }
        .btn-danger {
            background-color: #dc3545;
            padding: 4px 10px;
            font-size: 13px;
        }
        .btn-danger:hover { background-color: #c82333; }
    </style>
</head>
<body>

    <h2>Daftar Barang</h2>

    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'gagal_terpakai'): ?>
            <div class="alert-error">
                <strong>Gagal Menghapus!</strong> Barang ini tidak boleh dihapus karena masih digunakan pada data transaksi detail.
            </div>
        <?php elseif ($_GET['status'] == 'sukses_hapus'): ?>
            <div class="alert-success">
                Data barang berhasil dihapus dari database.
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <a href="index.php" class="btn">Kembali ke Daftar Transaksi</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['kode_barang']; ?></td>
            <td><?= $row['nama_barang']; ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?= $row['stok']; ?></td>
            <td><?= $row['namasupplier']; ?></td>
            <td>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>