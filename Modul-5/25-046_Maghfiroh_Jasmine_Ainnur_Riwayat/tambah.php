<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal menyimpan data!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 80px; font-weight: bold; }
        input[type="text"], textarea { width: 300px; padding: 6px; }
        .btn { padding: 6px 14px; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-simpan { background-color: #4CAF50; }
        .btn-batal { background-color: #f44336; text-decoration: none; display: inline-block; padding: 6px 14px; color: white; border-radius: 4px; }
    </style>
</head>
<body>

    <h3>Tambah Data Master Supplier Baru</h3>
    <form method="POST" action="">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label>Telp</label>
            <input type="text" name="telp" placeholder="telp" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" placeholder="alamat" required></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
        <a href="index.php" class="btn-batal">Batal</a>
    </form>

</body>
</html>