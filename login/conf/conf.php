<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'felitia_pakar';

// Establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Pastikan conn berhasil
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}