<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT *, SUM(harga) AS harganya
  FROM tb_list_order
  LEFT JOIN tb_order ON tb_list_order.kode_order = tb_order.id_order
  LEFT JOIN tb_daftarmc ON tb_daftarmc.id = tb_list_order.daftarmc
  LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
  GROUP BY tb_list_order.id_list_order
  HAVING tb_list_order.kode_order=$_GET[order]
");

$kode = $_GET['order'];
$pelanggan = $_GET['pelanggan'];
$alamat = $_GET['alamat'];
$waktu_acara = $_GET['waktu_acara'];


while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
$select_mc = mysqli_query($conn, "SELECT id,nama_mc FROM tb_daftarmc");
//$select_kat_acara= mysqli_query($conn, "SELECT id,kategori_acara FROM tb_katacara");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order Item
        </div>
        <div class="card-body">
            <a href="order" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control " id="kodeorder" value="<?php echo $kode; ?>">
                        <label for="uploadfoto">Kode Order</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control " id="pelanggan" value="<?php echo $pelanggan; ?>">
                        <label for="uploadfoto">Pelanggan</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control " id="alamat" value="<?php echo $alamat; ?>">
                        <label for="uploadfoto">Alamat</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control " id="waktuacara" value="<?php echo $waktu_acara; ?>">
                        <label for="uploadfoto">Waktu Acara</label>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah item Baru-->
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mc yang Ingin Kamu Pilih</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php " method="post">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                <input type="hidden" name="waktu_acara" value="<?php echo $waktu_acara ?>">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="daftarmc" id="">
                                                <option selected hidden value="">Pilih MC</option>
                                                <?php
                                                foreach ($select_mc as $value) {
                                                    echo "<option value=$value[id]>$value[nama_mc]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="menu">Daftar Nama MC</label>
                                            <div class="invalid-feedback">
                                                Pilih MC
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah DP uang sewa" name="jumlahdp" required>
                                            <label for="floatingInput">Jumlah DP</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jumlah DP Uang Sewa.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan">
                                            <label for="floatingPassword">Catatan</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="kat_acara">
                                            <label for="floatingPassword">Nama Acara</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_orderitem_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah item Baru-->


            <?php
            if (empty($result)) {
                echo "Data Daftar Nama MC tidak ada";
            } else {

                foreach ($result as $row) {
            ?>

                    <!-- Modal Edit Order -->
                <?php
                }
                foreach ($result as $row) {
                ?>
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_orderitem.php " method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                        <input type="hidden" name="waktu_acara" value="<?php echo $waktu_acara ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="daftarmc" id="">
                                                        <option selected hidden value="">Pilih MC</option>
                                                        <?php
                                                        foreach ($select_mc as $value) {
                                                            if ($row['daftarmc'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_mc]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_mc]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="menu">Daftar Nama MC</label>
                                                    <div class="invalid-feedback">
                                                        Pilih MC
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah DP uang sewa" name="jumlahdp" required value="<?php echo $row['jumlahdp'] ?>">
                                                    <label for="floatingInput">Jumlah DP</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jumlah DP Uang Sewa.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingPassword">Catatan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="kat_acara" value="<?php echo $row['kat_acara'] ?>">
                                                    <label for="floatingPassword">Nama Acara</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_orderitem_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit Order -->

                    <!-- Modal Delete Order -->
                <?php
                }
                foreach ($result as $row) {
                ?>
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_orderitem.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                        <input type="hidden" name="waktu_acara" value="<?php echo $waktu_acara ?>">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus order item atas nama mc <b><?php echo $row['nama_mc'] ?></b> dengan kode order <b><?php echo $row['id_order'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_orderitem_validate" value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Delete-->
                <?php
                }

                ?>

                <!-- Modal Bayar-->
                <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th scope="col">Nama MC</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Waktu Acara</th>
                                            <th scope="col">Nama Acara</th>
                                            <th scope="col">Jumlah Dp</th>
                                            <th scope="col">Catatan</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($result as $row) {

                                            ?>
                                                <tr>

                                                    <td><?php echo $row['nama_mc'] ?></td>
                                                    <td><?php echo $row['harganya'] ?></td>
                                                    <td><?php echo $row['waktu_acara'] ?></td>
                                                    <td><?php echo $row['kat_acara'] ?></td>
                                                    <td><?php echo $row['jumlahdp'] ?></td>
                                                    <td><?php echo $row['catatan'] ?></td>


                                                </tr>

                                            <?php
                                                $total += $row['harganya'];
                                            } ?>
                                            <tr>
                                                <td colspan="5" class="fw-bold">
                                                    Total Harga
                                                </td>
                                                <td colspan="4" class="fw-bold">
                                                    <?php echo number_format($total, 0, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <span class="text-danger fs-5 fw-semibold">Apakah Anda Yakin Ingin Melakukan Pembayaran?</span>
                                <form class="needs-validation" novalidate action="proses/proses_bayar.php " method="post">
                                    <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <input type="hidden" name="alamat" value="<?php echo $alamat ?>">
                                    <input type="hidden" name="waktu_acara" value="<?php echo $waktu_acara ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang" name="uang" required>
                                                <label for="floatingInput">Nominal Uang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nominal Uang.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345">Bayar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Bayar -->

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">

                                <th scope="col">Nama MC</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Waktu Acara</th>
                                <th scope="col">Nama Acara</th>
                                <th scope="col">Jumlah Dp</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {

                            ?>
                                <tr>

                                    <td><?php echo $row['nama_mc'] ?></td>
                                    <td><?php echo $row['harganya'] ?></td>
                                    <td><?php echo $row['waktu_acara'] ?></td>
                                    <td><?php echo $row['kat_acara'] ?></td>
                                    <td><?php echo $row['jumlahdp'] ?></td>
                                    <td><?php echo $row['catatan'] ?></td>
                                    <td>

                                            <?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge text-bg-warning'>On Going</span>";
                                            } elseif ($row['status'] == 2) {
                                                echo "<span class='badge text-bg-primary'>Done</span>";
                                            }
                                            ?>
                                        </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class=" <?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1" ?> " data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class=" <?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1" ?> "  data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                </div>
                </td>
                </tr>

            <?php
                            } ?>
            </tbody>
            </table>

        </div>
    <?php
            } ?>
    <div>
        <button class=" <?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary disabled" : " btn btn-success" ?> " data-bs-toggle="modal" data-bs-target="#tambahItem "><i class="bi bi-plus-circle-fill"></i> Detai Pesanan</button>
        <button class=" <?php echo (!empty($row['id_bayar'])) ? " btn btn-secondary disabled" : " btn btn-primary" ?> " data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i> Pembayaran</button>

    </div>
    </div>
</div>
</div>