<?php
include 'koneksi.php';

$query = "SELECT t.*, p.nama AS nama_pelanggan 
          FROM transaksi t 
          JOIN pelanggan p ON t.pelanggan_id = p.id 
          ORDER BY t.id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengelolaan Master-Detail Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; color: #333; }
        h2, h3 { color: #222; }
        .menu { margin-bottom: 20px; }
        .btn {
            display: inline-block;
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            margin-right: 10px;
        }
        .btn:hover { background-color: #0056b3; }
        .btn-success { background-color: #28a745; }
        .btn-success:hover { background-color: #218838; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; background: white; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f4f4f4; }
        tr:hover { background-color: #f1f1f1; }
        hr { border: 0; border-top: 1px solid #ddd; margin: 20px 0; }
    </style>
</head>
<body>

    <h2>SISTEM PENGELOLAAN MASTER-DETAIL PENJUALAN</h2>

    <div class="menu">
        <a href="barang.php" class="btn btn-success">Kelola Data Barang</a>
    </div>

    <hr>

    <h3>Daftar Seluruh Transaksi</h3>
    <table>
        <tr>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Keterangan</th>
            <th>Total Transaksi</th>
            <th>Aksi</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td>#<?= $row['id']; ?></td>
                <td><?= $row['waktu_transaksi']; ?></td>
                <td><?= htmlspecialchars($row['nama_pelanggan']); ?> (<?= $row['pelanggan_id']; ?>)</td>
                <td><?= htmlspecialchars($row['keterangan']); ?></td>
                <td><b>Rp <?= number_format($row['total'], 0, ',', '.'); ?></b></td>
                <td>
                    <a href="master_detail.php?transaksi_id=<?= $row['id']; ?>" class="btn">Kelola Detail</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center;">Belum ada data transaksi.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>