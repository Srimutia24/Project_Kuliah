<?php
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'daftarmc') {
    $page = "daftarmc.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kategoriacara') {
    $page = "kategoriacara.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
    $page = "order.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'konfirmasipesanan') {
    $page = "konfirmasipesanan.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    $page = "user.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    $page = "report.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} else {
    include "main.php";
}
