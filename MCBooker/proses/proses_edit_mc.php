<?php
include "connect.php";
$id =  (isset($_POST['id'])) ? htmlentities($_POST['id']) : " ";
$nama_mc = (isset($_POST['nama_mc'])) ? htmlentities($_POST['nama_mc']) : "";
$profil = (isset($_POST['profil'])) ? htmlentities($_POST['profil']) : "";
$layanan = (isset($_POST['layanan'])) ? htmlentities($_POST['layanan']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$tersedia = (isset($_POST['tersedia'])) ? htmlentities($_POST['tersedia']) : "";

$kode_rand = rand(10000,99999)."-";
$target_dir = "../assets/img/".$kode_rand;
$target_file = $target_dir.basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 

if (!empty($_POST['input_menu_validate'])) {
// Cek apakah gambar atau bukan
$cek = getimagesize($_FILES['foto']['tmp_name']);
if($cek === false) {
    $message = "ini bukan file gambar";
    $statusUpload = 0;
}else{
    $statusUpload =1;
    if(file_exists($target_file)){
        $message = "Maaf, File yang Dimasukkan Telah Ada";
        $statusUpload = 0;
    }else{
        if($_FILES['foto']['size'] > 500000){ //500kb
            $message = "File foto yang diupload terlalu besar";
            $statusUpload = 0;
        }else{
            if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){
                $message = "Maaf, hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG dan GIF";
                $statusUpload = 0;
            } 
        }
    }
}

if($statusUpload == 0){
    $message = '<script>alert("'.$message.', Gambar tidak dapat diupload");
                window.location="../menu"</script>';
}else{
    $select = mysqli_query($conn, "SELECT * FROM tb_daftarmc WHERE nama_mc = '$nama_mc'");
    if (mysqli_num_rows($select) > 0){
    $message = '<script>alert("Nama menu yang dimasukkan telah ada");
        window.location="../menu"</script>';
    }else{
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$target_file)){
            $query = mysqli_query($conn, "UPDATE tb_daftarmc SET foto='" .$kode_rand.$_FILES['foto']['name']."',nama_mc='$nama_mc',profil='$profil',layanan='$layanan',harga='$harga',tersedia='$tersedia' WHERE id='$id'");
            if ($query) {
                $message = '<script>alert("Data berhasil dimasukkan");
            window.location="../daftarmc"</script>';
            }else{
                $message = '<script>alert("Data gagal dimasukkan");
            window.location="../daftarmc"</script>';
            }
        }else{
            $message = '<script>alert("Maaf, Terjadi kesalahan file tidak dapat di upload");
            window.location="../daftarmc"</script>';
        }
    }
}
}
echo $message;
?>