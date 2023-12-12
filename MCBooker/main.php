<?php
session_start();
if (empty($_SESSION['username_mcbooker'])) {
    header("location:login");
}
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user where username='$_SESSION[username_mcbooker]' ");
$hasil = mysqli_fetch_array($query);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MCBooker- Aplikasi Informasi dan Penyewaan MC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

</head>

<body>
    <!--Header-->
    <?php include "header.php" ?>
    <!--end header-->

    <div class="container-lg">
        <div class="row">
            <!-- Sidebar -->

            <!--end sidebar-->
            <?php include "sidebar.php" ?>
            <!--content-->
            <?php
            include $page;
            ?>
            <!--end content-->
        </div>
        <div class="fixed-bottom text-center mb-2">
            Srimutia
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>