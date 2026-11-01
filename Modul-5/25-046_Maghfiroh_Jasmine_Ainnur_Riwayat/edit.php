<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id = '$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal mengupdate data!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 80px; font-weight: bold; }
        input[type="text"], textarea { width: 300px; padding: 6px; }
        .btn { padding: 6px 14px; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-update { background-color: #4CAF50; }
        .btn-batal { background-color: #f44336; text-decoration: none; display: inline-block; padding: 6px 14px; color: white; border-radius: 4px; }
    </style>
</head>
<body>

    <h3>Edit Data Master Supplier</h3>
    <form method="POST" action="">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $row['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Telp</label>
            <input type="text" name="telp" value="<?= $row['telp']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" required><?= $row['alamat']; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-update">Update</button>
        <a href="index.php" class="btn-batal">Batal</a>
    </form>

</body>
</html>