<?php
include "connect.php";
$jenisacara =  (isset($_POST['jenisacara'])) ? htmlentities($_POST['jenisacara']) : " ";
$katacara =  (isset($_POST['katacara'])) ? htmlentities($_POST['katacara']) : " ";

if(!empty($_POST['input_katacara_validate'])){
    $select = mysqli_query($conn, "SELECT kategori_acara FROM tb_katacara WHERE kategori_acara = '$katacara'");
    if(mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori acara yang dimasukkan telah ada");
                    window.location="../katacara"</script>';
    }else{
    $query = mysqli_query($conn,"INSERT INTO tb_katacara(jenis_acara,kategori_acara) values ('$jenisacara','$katacara')");
    if($query){
        $message = '<script>alert("Data berhasil dimasukkan");
                    window.location="../katacara"</script>';
    }else{
        $message = '<script>alert ("Data gagal dimasukkan") 
                    window.location="../katacara"</script>';  
    }}
}echo $message;

