<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";
$waktu_acara = (isset($_POST['waktu_acara'])) ? htmlentities($_POST['waktu_acara']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$daftarmc = (isset($_POST['daftarmc'])) ? htmlentities($_POST['daftarmc']) : "";
$jumlahdp = (isset($_POST['jumlahdp'])) ? htmlentities($_POST['jumlahdp']) : "";
$katacara = (isset($_POST['kat_acara'])) ? htmlentities($_POST['kat_acara']) : "";

if (!empty($_POST['edit_orderitem_validate'])) {
    $query = mysqli_query($conn, "UPDATE tb_list_order SET daftarmc='$daftarmc',jumlahdp='$jumlahdp',catatan='$catatan',kat_acara='$katacara' where id_list_order='$id' ");
    if ($query) {
        $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../?x=orderitem&order=' . $kode_order . '&pelanggan=' . $pelanggan . '&alamat=' . $alamat . '&waktu_acara=' . $waktu_acara . '"</script>';
    } else {
        $message = '<script>alert("data gagal dimasukkan")
            window.location="../?x=orderitem&order=' . $kode_order . '&pelanggan=' . $pelanggan . '&alamat=' . $alamat . '&waktu_acara=' . $waktu_acara . '"</script>';
    }
}
echo $message;
