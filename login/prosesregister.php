<?php

include 'conf/conf.php';

// Jika form pendaftaran dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan data dari form telah dikirim sebelum mencoba mengaksesnya
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Mengambil dan membersihkan data dari form pendaftaran
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        // Hashing password menggunakan bcrypt
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk memasukkan data ke dalam tabel users
        $query = "INSERT INTO users (username, password_hash) VALUES ('$username', '$passwordHash')";

        if (mysqli_query($conn, $query)) {
            // Jika pendaftaran berhasil, arahkan ke dashboard.php
            header("Location: index.php");
            exit;
        } else {
            echo "Error saat melakukan pendaftaran. Silakan coba lagi.";
        }
        // Tutup koneksi
        mysqli_close($conn);
    }
}