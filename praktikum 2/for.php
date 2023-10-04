<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo"Mencari jumlah huruf vokal dalam suatu kata ";
    echo"<br>";
    $jumlah=0;
    $kata="'Belajar PHP'";
    $huruf="a"; //huruf vokal yang dibaca bisa huruf a,i,u,e,o
    for($i=0;$i<strlen($kata);$i++){
        if(substr($kata,$i,1) == $huruf){
            $jumlah++;
        }
    }
    echo"Jumlah huruf ". $huruf." dalam kata ".$kata." : ";
    echo"<br>";
    echo$jumlah;
    ?>
</body>
</html>