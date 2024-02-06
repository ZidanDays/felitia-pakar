<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {


        case 'beranda':
            include './pages/pengaduan/pengaduan.php';
            break;
    }
} else {
    include './pages/beranda/beranda.php';
}