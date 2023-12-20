<?php
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_list_order
LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
LEFT JOIN tb_daftarmc ON tb_daftarmc.id = tb_list_order.daftarmc
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
order by waktu_order asc
");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_mc = mysqli_query($conn, "SELECT id,nama_mc FROM tb_daftarmc");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Konfirmasi Acara
        </div>
        <div class="card-body">
            <?php if (empty($result)) {
                echo "Data Konfirmasi tidak ada";
            } else {
                foreach ($result as $row) { ?>
                    <!-- Modal Tambah Item Baru-->
                    <div class="modal fade" id="terima<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah MC Pilihanmu !!!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_terima_orderitem.php " method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="daftarmc" id="">
                                                        <option selected hidden value="">Pilih MC</option>
                                                        <?php
                                                        foreach ($select_menu as $value) {
                                                            if ($row['menu'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_mc]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_mc]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="menu">MC yang dipilih</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan MC
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingPassword">Catatan</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="terima_orderitem_validate" value="12345">Terima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Terima Dapur-->

                    <!--Modal siap saji -->
                    <div class="modal fade" id="siapsaji<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>Diterima Pelanggan
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_siapsaji_orderitem.php " method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="daftarmc" id="">
                                                        <option selected hidden value="">Pilih Menu</option>
                                                        <?php
                                                        foreach ($select_menu as $value) {
                                                            if ($row['menu'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_mc]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_mc]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="menu">Daftar MC</label>
                                                    <div class="invalid-feedback">
                                                        Pilih MC
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingInput">catatan</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="siapsaji_orderitem_validate" value="12345">Report</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal siap sajji -->
                <?php }
                ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Waktu Order</th>
                                <th scope="col">Tanggal Acara</th>
                                <th scope="col">Nama MC</th>
                                <th scope="col">Alamat Acara</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                if ($row['status'] != 2) {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row['kode_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['waktu_order'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['waktu_acara'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama_mc'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['alamat'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['catatan'] ?>
                                        </td>
                                        <td>

                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge text-bg-warning'>On going</span>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<span class='badge text-bg-primary'>Done</span>";
                                            }
                                            ?>
                                        </td>
                                        <td>

                                            <div class="d-flex">
                                                <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-primary btn-sm me-1 "; ?>" data-bs-toggle="modal" data-bs-target="#terima<?php echo $row['id_list_order'] ?>">Terima</button>
                                                <button class="<?php echo (empty($row['status']) || $row['status'] != 1) ? "btn btn-secondary btn-sm me-1 disabled text-nowrap" : "btn btn-success  text-nowrap btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#siapsaji<?php echo $row['id_list_order'] ?>">Selesai</button>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>