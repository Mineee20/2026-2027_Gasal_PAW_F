<?php
include 'koneksi.php';

$transaksi = isset($_GET['transaksi_id']) ? $_GET['transaksi_id'] : 0;

if (isset($_POST['simpan'])) {
    $idtransaksi = $_POST['transaksi_id'];
    $barang      = $_POST['barang_id'];
    $jumlah      = $_POST['qty'];

    $caribarang = mysqli_query($koneksi, "SELECT harga FROM barang WHERE id = '$barang'");
    $databarang = mysqli_fetch_assoc($caribarang);
    $harga      = $databarang['harga'];

    $simpanquery = "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES ('$idtransaksi', '$barang', '$harga', '$jumlah')";
    
    if (mysqli_query($koneksi, $simpanquery)) {
        $caritotal = mysqli_query($koneksi, "SELECT SUM(harga * qty) AS grand_total FROM transaksi_detail WHERE transaksi_id = '$idtransaksi'");
        $datatotal = mysqli_fetch_assoc($caritotal);
        $grandtotal = $datatotal['grand_total'] ?? 0;

        mysqli_query($koneksi, "UPDATE transaksi SET total = '$grandtotal' WHERE id = '$idtransaksi'");

        header("Location: master_detail.php?transaksi_id=" . $idtransaksi);
        exit();
    }
}

$cariterpakai = mysqli_query($koneksi, "SELECT barang_id FROM transaksi_detail WHERE transaksi_id = '$transaksi'");
$terpakai = [];
while ($baris = mysqli_fetch_assoc($cariterpakai)) {
    $terpakai[] = $baris['barang_id'];
}

$ambildata = mysqli_query($koneksi, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Detail Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f9f9f9; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, input[type="number"] { padding: 8px; width: 300px; border: 1px solid #ccc; border-radius: 4px; }
        .btn {
            display: inline-block;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            text-align: center;
        }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-secondary { background-color: #6c757d; color: white; margin-left: 10px; }
        .btn-secondary:hover { background-color: #5a6268; }
    </style>
</head>
<body>

    <h2>Tambah Item Barang (Transaksi #<?= $transaksi; ?>)</h2>

    <form method="POST" action="tambah_detail.php">
        <input type="hidden" name="transaksi_id" value="<?= $transaksi; ?>">

        <div class="form-group">
            <label>Pilih Barang:</label>
            <select name="barang_id" required>
                <option value="">-- Pilih Barang --</option>
                <?php while ($b = mysqli_fetch_assoc($ambildata)): ?>
                    <?php 
                        $statusaktif = in_array($b['id'], $terpakai) ? 'disabled' : '';
                        $statusteks  = $statusaktif ? ' (Sudah Ditambahkan)' : '';
                    ?>
                    <option value="<?= $b['id']; ?>" <?= $statusaktif; ?>>
                        <?= $b['kode_barang']; ?> - <?= $b['nama_barang']; ?> (Rp <?= number_format($b['harga'], 0, ',', '.'); ?>)<?= $statusteks; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah (Qty):</label>
            <input type="number" name="qty" min="1" value="1" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan Item</button>
        <a href="master_detail.php?transaksi_id=<?= $transaksi; ?>" class="btn btn-secondary">Batal</a>
    </form>

</body>
</html>