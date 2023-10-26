<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi</title>
</head>
<body>
    <h1>Koneksi database dengan mysqli _fetch_array</hr><br>

    <?php
    $koneksi= mysqli_connect("localhost","root","","db_saya") 
    or die("koneksi gagal");
    $query=mysqli_query($koneksi,"SELECT * from liga");
    while ($row = mysqli_fetch_row ($query)){
        echo "liga ".$row[1]; //array numeric 
        echo "mempunyai ".$row[2]; //array numeric
        echo " wakil di liga champion <br>";
    }
    ?>
</body>
</html>