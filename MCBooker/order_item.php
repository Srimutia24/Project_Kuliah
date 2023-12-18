<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT *, SUM(harga) AS harganya
  FROM tb_list_order
  LEFT JOIN tb_order ON tb_list_order.order = tb_order.id_order
  LEFT JOIN tb_daftarmc ON tb_daftarmc.id = tb_list_order.daftarmc
  GROUP BY tb_list_order.id_list_order
  HAVING tb_list_order.order=$_GET[order]
");

$kode = $_GET['order'];
$pelanggan = $_GET['pelanggan'];
$alamat = $_GET['alamat'];
$waktu_acara = $_GET['waktu_acara'];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
//$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order Item
        </div>
        <div class="card-body">
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
                        <input disabled type="text" class="form-control " id="alamat" value="<?php echo $waktu_acara; ?>">
                        <label for="uploadfoto">Waktu Acara</label>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah item Baru-->
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php " method="post">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="menu" id="">
                                                <option selected hidden value="">Pilih Menu</option>
                                                <?php
                                                foreach ($select_menu as $value) {
                                                    echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="menu">Menu Makanan dan Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah Porsi" name="jumlah" required>
                                            <label for="floatingInput">Jumlah Porsi</label>
                                            <div class="invalid-feedback">
                                                Masukkan Masukkan Jumlah Porsi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Catatan" name="catatan">
                                            <label for="floatingPassword">Catatan</label>
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
                echo "Data menu makanan atau minuman tidak ada";
            } else {

                foreach ($result as $row) {
            ?>

                    <!-- Modal Edit Order -->
                <?php
                }
                foreach ($result as $row) {
                ?>
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_order.php " method="post">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input readonly type="text" class="form-control" id="uploadfoto" name="kode_order" value="<?php echo $row['id_order'] ?>" readonly>
                                                    <label for="uploadfoto">Kode Order</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Kode Order.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="meja" placeholder="Nomor Meja" name="meja" required value="<?php echo $row['meja'] ?>">
                                                    <label for="meja">Meja</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Meja.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" required value="<?php echo $row['pelanggan'] ?>">
                                                    <label for="pelanggan">Nama Pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Pelanggan.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="edit_order_validate" value="12345">Simpan</button>
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
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus order atas nama <b><?php echo $row['pelanggan'] ?></b> dengan kode order <b><?php echo $row['id_order'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="input_delete_validate" value="12345">Hapus</button>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">

                                <th scope="col">Nama MC</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Waktu Acara</th>
                                <th scope="col">Jumlah Dp</th>
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
                                    <td><?php echo $row['jumlahdp'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_order'] ?>"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i class="bi bi-trash"></i></button>
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
        <button class="btn btn-success btn-sm me-1" data-bs-toggle="modal" data-bs-target="#tambahItem "><i class="bi bi-plus-circle-fill"></i> Detai Pesanan</button>
        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#bayar<?php echo $row['id_order'] ?>"><i class="bi bi-cash-coin"></i> Pembayaran</button>

    </div>
    </div>
</div>
</div>