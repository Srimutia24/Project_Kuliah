<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $jumlah_barang=3;
    $harga=1000;
    echo $pembayaran=$jumlah_barang + $harga;
    echo"<br>";
    echo $pembayaran=$jumlah_barang - $harga;
    echo"<br>";
    echo $pembayaran=$jumlah_barang * $harga;
    echo"<br>";
    echo $pembayaran=$jumlah_barang / $harga;
    echo"<br>";
    echo $pembayaran=$jumlah_barang % $harga;
    echo"<br>";
    ?>
</body>
</html>