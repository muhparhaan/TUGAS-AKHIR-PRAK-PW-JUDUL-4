<?php
session_start();

$pesan = "";

if(isset($_POST['masuk'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    
    if($u == "muhaparhaan" && $p == "Farhan22."){
        $_SESSION['login'] = true;
        $_SESSION['user'] = $u;
        header("Location: index.php");
        exit();
    } else {
        $pesan = "Username / password salah";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Kontak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width:400px;">
    <div class="card p-3 shadow-sm">
        <h4 class="text-center mb-3">Login</h4>

        <?php if($pesan): ?>
            <div class="alert alert-danger"><?= $pesan ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" class="form-control mb-3">

            <label>Password</label>
            <input type="password" name="password" class="form-control mb-3">

            <button class="btn btn-primary w-100" name="masuk">Login</button>
        </form>
    </div>
</div>

</body>
</html>
