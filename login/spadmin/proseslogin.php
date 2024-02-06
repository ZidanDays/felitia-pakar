<?php
include("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    header('location:index.php?error=Username dan Password harus diisi!');
    exit();
}

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

if ($query) {
    // Ambil satu baris hasil dari query
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        // Ambil hash password dari database
        $storedPasswordHash = $row['password_hash'];

        // Lakukan verifikasi password menggunakan password_verify
        if (password_verify($password, $storedPasswordHash)) {
            // Password valid, lakukan tindakan selanjutnya

            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['alamat'] = $row['alamat'];
            $_SESSION['level'] = $row['level'];
            $_SESSION['gambar'] = $row['gambar'];

            // cek level pengguna dan alihkan ke halaman yang sesuai
            if ($row['level'] == "Admin") {
                header("location: admin/index.php");
            } elseif ($row['level'] == "User") {
                header("location: User/index.php");
            } elseif ($row['level'] == "Pengurus") {
                header("location: superuser/admin/index.php");
            } else {
                // Jika level tidak sesuai dengan yang diharapkan, tambahkan penanganan sesuai kebutuhan.
                echo "Level pengguna tidak valid.";
            }
        } else {
            // Password tidak valid
            header('location:index.php?error=Password salah. Coba lagi.');
            exit();
        }
    } else {
        // Pengguna dengan username yang diberikan tidak ditemukan
        header('location:index.php?error=Username tidak ditemukan.');
        exit();
    }
} else {
    // Kesalahan dalam menjalankan query
    header('location:index.php?error=Terjadi kesalahan dalam mengambil data pengguna.');
    exit();
}











// $q = mysqli_query($koneksi, "select * from users where username='$username' and password_hash='$password'");
// $row = mysqli_fetch_array ($q);

// if (mysqli_num_rows($q) == 1) {
//     $_SESSION['id_user']        = $row['id_user'];
//     $_SESSION['username']   = $username;
//     $_SESSION['nama']       = $row['nama'];
//     $_SESSION['alamat'] = $row['alamat'];
     
//     $_SESSION['level']      = $row['level'];
    
//     $_SESSION['gambar']     = $row['gambar'];
    


//     // cek jika user login sebagai admin
//     if($row['level']=="Admin"){

//         // buat session login dan username
//         $_SESSION['username'] = $username;
//         $_SESSION['level'] = "Admin";
//         // alihkan ke halaman dashboard admin
//         header("location:admin/index.php");

//     // cek jika user login sebagai pegawai
//     }else if($row['level']=="User"){
//         // buat session login dan username
//         $_SESSION['username'] = $username;
//         $_SESSION['level'] = "User";
//         // alihkan ke halaman dashboard pegawai
//         header("location:User/index.php");

//     // cek jika user login sebagai pengurus
//     }else if($row['level']==""){
//         // buat session login dan username
//         $_SESSION['username'] = $username;
//         $_SESSION['level'] = "pengurus";
//         // alihkan ke halaman dashboard pengurus
//         header("location:superuser/admin/index.php");

   
//     }



// } else {
//     header('location:index.php?error=Anda Belum Terdaftar!');
// }
