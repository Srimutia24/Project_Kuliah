<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Buku Tamu</h1>
    <?php
$nama=$_POST["nama"];
$email=$_POST["email"];
$komentar=$_POST["komentar"];
echo"Nama anda = ".$nama;
echo"<br>";
echo"Email anda = ".$email;
echo"<br>";
echo"Komentar yang anda berikan = ".$komentar;
?>
</body>
</html>