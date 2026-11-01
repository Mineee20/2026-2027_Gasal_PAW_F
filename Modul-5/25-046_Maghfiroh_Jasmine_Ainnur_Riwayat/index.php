<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #dcebf4; }
        .btn { padding: 6px 12px; text-decoration: none; color: white; border-radius: 4px; font-size: 14px; }
        .btn-tambah { background-color: #4CAF50; float: right; margin-bottom: 10px; }
        .btn-edit { background-color: #ff9800; }
        .btn-hapus { background-color: #f44336; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Data Master Supplier</h2>
    <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM supplier");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['telp']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-hapus" onclick="return confirm('Anda yakin akan menghapus supplier ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>