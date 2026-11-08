<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $idbarang = $_GET['id'];

    $cekquery = "SELECT COUNT(*) AS total FROM transaksi_detail WHERE barang_id = '$idbarang'";
    $cekresult = mysqli_query($koneksi, $cekquery);
    $datacek = mysqli_fetch_assoc($cekresult);

    if ($datacek['total'] > 0) {
        header("Location: barang.php?status=gagal_terpakai");
        exit();
    }

    $deletequery = "DELETE FROM barang WHERE id = '$idbarang'";
    if (mysqli_query($koneksi, $deletequery)) {
        header("Location: barang.php?status=sukses_hapus");
        exit();
    } else {
        header("Location: barang.php?status=gagal_error");
        exit();
    }
} else {
    header("Location: barang.php");
    exit();
}
?>