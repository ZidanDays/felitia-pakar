<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/logo.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo2.png" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item active ">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-gauge"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class='sidebar-title'>Master</li>
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-list-check"></i>
                                <span>Pertanyaan Diagnosa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-stethoscope"></i>
                                <span>Lakukan Diagnosa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-star"></i>
                                <span>Kesimpulan</span>
                            </a>
                        </li>
                        <li class='sidebar-title'>Lainnya</li>
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-square-poll-vertical"></i>
                                <span>Hasil Diagnosa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-clock-rotate-left"></i>
                                <span>Riwayat Diagnosa</span>
                            </a>
                        </li>
                        <li class='sidebar-title'>Users</li>
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="fa-solid fa-users"></i>
                                <span>Data User</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">

                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <p class="text-subtitle text-muted">This is MvpOnal Bro!!!</p>
                </div>
                <section class="section">

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class='card-heading p-1 pl-3'>Table</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Username</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'conf/conf.php';

                                            // Query untuk mengambil data pengguna dari tabel users
                                            $query = "SELECT * FROM users";
                                            $result = mysqli_query($conn, $query);

                                            // Tampilkan data pengguna dalam tabel
                                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['username'] ?></td>

                                            </tr>
                                            <?php endwhile;

                                            // Tutup koneksi
                                            mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2024 &copy; MvpOnal</p>
                    </div>
                    <div class="float-right">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                href="">MvpOnal</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>