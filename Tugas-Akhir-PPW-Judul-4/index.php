<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

if(!isset($_SESSION['kontak'])){
    $_SESSION['kontak'] = [];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kontak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>Daftar Kontak</h3>
        <div>
            <span class="me-3">Hi, <?= $_SESSION['user'] ?></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>

    <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Kontak</a>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th style="width:140px;">Aksi</th>
                </tr>

                <?php if(empty($_SESSION['kontak'])): ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada kontak</td>
                </tr>

                <?php else: ?>
                    <?php foreach($_SESSION['kontak'] as $i => $k): ?>
                        <tr>
                            <td><?= htmlspecialchars($k['nama']) ?></td>
                            <td><?= htmlspecialchars($k['telp']) ?></td>
                            <td><?= htmlspecialchars($k['email']) ?></td>
                            <td>
                                <a href="edit.php?id=<?= $i ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a onclick="return confirm('Yakin?')" href="hapus.php?id=<?= $i ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

            </table>

        </div>
    </div>
</div>

</body>
</html>
