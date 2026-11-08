<?php
include 'koneksi.php';

$transaksi = isset($_GET['transaksi_id']) ? $_GET['transaksi_id'] : 1;

$carimaster = mysqli_query($koneksi, "SELECT transaksi.*, pelanggan.nama AS nama_pelanggan 
                                     FROM transaksi 
                                     JOIN pelanggan ON transaksi.pelanggan_id = pelanggan.id 
                                     WHERE transaksi.id = '$transaksi'");
$master = mysqli_fetch_assoc($carimaster);

$caridetail = mysqli_query($koneksi, "SELECT transaksi_detail.*, barang.nama_barang, barang.kode_barang 
                                     FROM transaksi_detail 
                                     JOIN barang ON transaksi_detail.barang_id = barang.id 
                                     WHERE transaksi_detail.transaksi_id = '$transaksi'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Master Detail Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .box { border: 1px solid #ccc; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
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
        .btn-success { background-color: #28a745; }
        .btn-success:hover { background-color: #218838; }
    </style>
</head>
<body>

    <a href="index.php" class="btn">Kembali ke Daftar Transaksi</a>

    <div class="box">
        <h3>Master Transaksi #<?= $master['id']; ?></h3>
        <p><b>Pelanggan:</b> <?= $master['nama_pelanggan']; ?></p>
        <p><b>Tanggal:</b> <?= $master['waktu_transaksi']; ?></p>
        <p><b>Keterangan:</b> <?= $master['keterangan']; ?></p>
        <p><b>Total Biaya:</b> <span style="color: green; font-weight: bold;">Rp <?= number_format($master['total'], 0, ',', '.'); ?></span></p>
    </div>

    <div class="box">
        <h3>Detail Item Transaksi</h3>
        <table>
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($caridetail) > 0): ?>
                    <?php while ($detail = mysqli_fetch_assoc($caridetail)): ?>
                    <tr>
                        <td><?= $detail['kode_barang']; ?></td>
                        <td><?= $detail['nama_barang']; ?></td>
                        <td>Rp <?= number_format($detail['harga'], 0, ',', '.'); ?></td>
                        <td><?= $detail['qty']; ?></td>
                        <td>Rp <?= number_format($detail['harga'] * $detail['qty'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">Belum ada item detail untuk transaksi ini.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <br>
        <a href="tambah_detail.php?transaksi_id=<?= $transaksi; ?>" class="btn btn-success">Tambah Item Barang</a>
    </div>

</body>
</html>