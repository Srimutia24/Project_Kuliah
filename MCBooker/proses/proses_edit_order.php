<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$waktu_acara= (isset($_POST['waktu_acara'])) ? htmlentities($_POST['waktu_acara']) : "";

if (!empty($_POST['edit_order_validate'])) {
        $query = mysqli_query($conn, "UPDATE tb_order SET pelanggan='$pelanggan',alamat='$alamat',waktu_acara='$waktu_acara' WHERE id_order ='$kode_order'");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../order"</script>';
        } else {
            $message = '<script>alert("data gagal dimasukkan")
            window.location="../order"</script>';
        }
    
}
echo $message;
?>