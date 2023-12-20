<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_daftarmc");
while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}

$query_chart = mysqli_query($conn, "SELECT nama_mc, tb_daftarmc.id, SUM(tb_list_order.jumlahdp) AS total_jumlah FROM tb_daftarmc LEFT JOIN tb_list_order ON tb_daftarmc.id = tb_list_order.daftarmc GROUP BY tb_daftarmc.id ORDER BY tb_daftarmc.id ASC");

// $result_chart = array();
while ($record_chart = mysqli_fetch_array($query_chart)) {
    $result_chart[] = $record_chart;
}
$array_menu = array_column($result_chart, 'nama_menu');
$array_menu_qoute = array_map(function ($menu) {
    return "'" . $menu . "'";
}, $array_menu);
$string_menu = implode(', ', $array_menu_qoute);
// echo $string_menu. "<br>";
$array_jumlah_pesanan = array_column($result_chart, 'total_jumlah');
$string_jumlah_pesanan = implode(',', $array_jumlah_pesanan);
// echo $string_jumlah_pesanan;


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="col-lg-9 mt-2">
    <!--Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $slide = 0;
            $firstSlideButton = true;
            foreach ($result as $dataTombol) {
                ($firstSlideButton) ? $aktif = "active" : $aktif = "";
                $firstSlideButton = false;
            ?>

                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
            <?php
                $slide++;
            } ?>
        </div>
        <div class="carousel-inner rounded">
            <?php
            $firstSlide = true;
            foreach ($result as $data) {
                ($firstSlide) ? $aktif = "active" : $aktif = "";
                $firstSlide = false;
            ?>
                <div class="carousel-item <?php echo $aktif ?>">
                    <img src="assets/img/<?php echo $data['foto'] ?>" class="img-fluid" style="height: 400px; width: 900px; object-fit : cover" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>
                            <?php echo $data['nama_mc'] ?>
                        </h5>
                        <p>
                            <?php echo $data['profil'] ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Akhir Carousel -->

    <!--Judul -->
    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <h5 class="card-title">MCBOOKER - APLIKASI PEMESANAN DAN PENYEWAAN JASA MC </h5>
            <p class="card-text"> Aplikasi pemesanan dalam meyewa jasa mc untuk setiap acara yang kamu ingin adakan.Nikmati acara terbaikmu dengan pilihan mc yang tepat.Caranya hanya dengan kalian cari tau mc mana yang kalian inginkan  dengan beberapa klik. Pesan, bayar dan lacak pesanan anda dengan mudah melalui
                Aplikasi ini.
            </p>
            <a href="daftarmc" class="btn btn-primary">List Daftar MC</a>

        </div>
    </div>
    <!--Akhir Judul -->


</div>