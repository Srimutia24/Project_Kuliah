<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str="Belajar PHP ternyata Menyenangkan";
    echo strtolower($str); //Ubah huruf kecil semua
    echo"<br>";
    echo strtoupper($str); //ubah ke huruf besar
    echo"<br>";
    echo str_replace("Menyenangkan","mudah lhooooooooo",$str); //mengganti
    ?>
</body>
</html>