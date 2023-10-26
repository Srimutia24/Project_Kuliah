<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn= mysqli_connect("localhost","root","","db_saya");
    $hasil= mysqli_query($conn,"select * from bukutamu");
    $jumlah=mysqli_num_rows($hasil);
    echo "<center><h1>Daftar Pengunjung</h1></center>";
    echo "Jumlah Pengunjung : $jumlah";
    $a=1;
    while ($baris = mysqli_fetch_array($hasil)){
        echo "<br>";
        echo $a;
        echo "<br>";
        echo "Nama : ";
        echo $baris[0];
        echo "<br>";
        echo $baris[1];
        echo "<br>";
        echo $baris[2];
        $a++;
    } ?>
</body>
</html>