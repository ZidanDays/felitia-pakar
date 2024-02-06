<?php
include 'conf/conf.php';

// Mengambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mendapatkan hash password dari username yang dimasukkan
// $query = "SELECT level, password_hash FROM users WHERE username='$username'";
$query = "SELECT * FROM users WHERE username='$username'";

// Eksekusi query dan ambil hasilnya
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Verifikasi password
if ($row && password_verify($password, $row['password_hash'])) {

    if($row['level'] == 'Admin'){
    // Jika password cocok, arahkan pengguna ke halaman dashboard
    session_start();
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['alamat'] = $row['alamat'];
    $_SESSION['level'] = $row['level'];
    $_SESSION['gambar'] = $row['gambar'];
    header("Location: spadmin/admin/index.php");
    exit;

    }else{
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['alamat'] = $row['alamat'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['gambar'] = $row['gambar'];
        header("Location: spadmin/User/index.php");
    }
} else {
    // Jika password tidak cocok, tampilkan pesan kesalahan
    echo "Username atau password salah.";
}

// Tutup koneksi
mysqli_close($conn);