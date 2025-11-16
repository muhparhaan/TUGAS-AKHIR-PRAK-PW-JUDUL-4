<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'] ?? -1;

if(!isset($_SESSION['kontak'][$id])){
    echo "ID kontak tidak ditemukan";
    exit();
}

$err = "";
$data = $_SESSION['kontak'][$id];

if(isset($_POST['update'])){
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $email = trim($_POST['email']);

    if($nama == "" || $telp == "" || $email == ""){
        $err = "Tidak boleh kosong";
    } else {
        $_SESSION['kontak'][$id] = [
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
    <title>Edit Kontak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4" style="max-width:500px;">
    <div class="card p-3 shadow-sm">

        <h4 class="mb-3">Edit Kontak</h4>

        <?php if($err): ?>
            <div class="alert alert-danger"><?= $err ?></div>
        <?php endif; ?>

        <form method="POST">

            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control mb-3">

            <label>Telepon</label>
            <input type="text" name="telp" value="<?= $data['telp'] ?>" class="form-control mb-3">

            <label>Email</label>
            <input type="text" name="email" value="<?= $data['email'] ?>" class="form-control mb-3">

            <button name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>

        </form>

    </div>
</div>

</body>
</html>
