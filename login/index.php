<?php
session_start();

// Cek apakah pengguna sudah login, jika ya, arahkan ke dashboard.php
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit;
}

// Jika form login dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Anda dapat menambahkan validasi form di sini

    // Simpan data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Anda dapat menambahkan validasi form di sini

    // Simpan data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username dan password benar
    if ($username == "username_anda" && $password == "password_anda") {
        // Jika benar, atur session dan arahkan ke dashboard.php
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Jika salah, tampilkan SweetAlert
        echo '<script>
                swal("Gagal", "Username atau password salah!", "error").then((value) => {
                    location.reload();
                });
              </script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/login.css" />
    <title>Login Sistem Pakar</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="proseslogin.php" method="POST" class="sign-in-form">
                    <h2 class="title">Masuk</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <button type="submit" class="btn solid">Masuk</button>
                </form>
                <form action="prosesregister.php" class="sign-up-form" method="POST">
                    <!-- Tambahkan method="POST" -->
                    <h2 class="title">Daftar Akun</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" /> <!-- Tambahkan name="username" -->
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                        <!-- Tambahkan name="password" -->
                    </div>
                    <input type="submit" class="btn" value="Daftar" />
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Belum mempunyai akun?</h3>
                    <p>
                        Jika belum mempunyai akun silahkan melakukan pendaftaran dengan klik tombol dibawah.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Daftar
                    </button>
                </div>
                <img src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah mempunyai akun?</h3>
                    <p>
                        Jika anda sudah memiliki akun, silahkan langsung masuk menggunakan akun anda
                        yang sudah anda daftarkan
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Masuk
                    </button>
                </div>
                <img src="https://i.ibb.co/nP8H853/Mobile-login-rafiki.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>

</html>