<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function garis(){
        echo"<hr>";
    }
    echo"ini contoh fungsi yang tanpa parameter <br>";
    garis();
    echo"Lihat perbedaan dengan fungsi yang dengan parameter <br>"; garis();

    // require("modul_require.php"); //akan memanggil satu kali saja 
    // //dalam file php ini 
    // tulistebal("Ini adalah tulisan tebal");
    // echo"<br";
    // echo $a; // mengambil nilai dari require
    
    // for($b=1;$b<5;$b++){
    //     include("modul_include.php");
    //     //include bisa dipanggil lebih dr 1x
    // }

    ?>
</body>
</html>