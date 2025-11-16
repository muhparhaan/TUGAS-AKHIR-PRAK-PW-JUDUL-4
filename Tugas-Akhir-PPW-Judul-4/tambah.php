<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

$err = "";
$nama = "";
$telp = "";
$email = "";

if(isset($_POST['simpan'])){
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $email = trim($_POST['email']);

    if($nama == "" || $telp == "" || $email == ""){
        $err = "Semua field wajib diisi";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err = "Email tidak valid";
    } else {
        $_SESSION['kontak'][] = [
            "nama" => $nama,
            "telp" => $telp,
            "email" => $email
        ];

        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kontak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4" style="max-width:500px;">
    <div class="card p-3 shadow-sm">

        <h4 class="mb-3">Tambah Kontak</h4>

        <?php if($err): ?>
            <div class="alert alert-danger"><?= $err ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $nama ?>" class="form-control mb-3">

            <label>Telepon</label>
            <input type="text" name="telp" value="<?= $telp ?>" class="form-control mb-3">

            <label>Email</label>
            <input type="text" name="email" value="<?= $email ?>" class="form-control mb-3">

            <button name="simpan" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>

</body>
</html>
