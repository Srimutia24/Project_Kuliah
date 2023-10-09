<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bandingkan Nilai</h1>
    <?php
$bil1=$_POST["bil1"];
$bil2=$_POST["bil2"];

echo"Bilangan pertama = ".$bil1;
echo "<br>";
echo"Bilangan kedua = ".$bil2;
echo"<br>";
if($bil1<$bil2){
    echo"$bil1 lebih kecil dari $bil2";
}elseif($bil1>$bil2){
    echo"$bil1 lebih besar dari $bil2";
}else{
    echo"$bil1 sama dengan $bil2";
}

?>
</body>
</html>