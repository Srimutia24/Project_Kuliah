<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$waktu_acara = (isset($_POST['waktu_acara'])) ? htmlentities($_POST['waktu_acara']) : "";
if (!empty($_POST['input_order_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$kode_order'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Order yang dimasukkan telah ada");
        window.location="../order"</script>';
    } else {

        $query = mysqli_query($conn, "INSERT INTO tb_order (id_order,pelanggan,alamat,waktu_acara)
    values ('$kode_order','$pelanggan','$alamat','$waktu_acara') ");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../?x=orderitem&order='.$kode_order.'&pelanggan='.$pelanggan.'&alamat='.$alamat.'&waktu_acara='.$waktu_acara.'"</script>';
        } else {
            $message = '<script>alert("data gagal dimasukkan")</script>';
        }
    }
}
echo $message;
