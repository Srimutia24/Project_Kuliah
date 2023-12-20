<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftarmc");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Daftar MC
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Daftar Menjadi MC</button>
                </div>
            </div>
            <!-- Modal Daftar MC-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Daftar Menjadi MC</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_mc.php " method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadfoto">Upload foto menu</label>
                                            <div class="invalid-feedback">
                                                Masukkan File Foto Menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama MC" name="nama_mc" required>
                                            <label for="floatingInput">Nama MC</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nama
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="profil" name="profil">
                                            <label for="floatingPassword">Profil singkat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="layanan yang disediakan" name="layanan">
                                            <label for="floatingPassword">Layanan yang tersedia</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga Sewa
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="tersedia" name="tersedia" required>
                                            <label for="floatingInput">Kesedian MC</label>
                                            <div class="invalid-feedback">
                                                Pilih waktu kesediaan.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Akhir Modal Tambah MC-->

            <!-- Modal View Menu -->
            <?php
            if (empty($result)) {
                echo "Data MC tidak ada";
            } else {

                foreach ($result as $row) {
            ?>
                    <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah MC</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_mc.php " method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_mc'] ?>" required>
                                                    <label for="floatingInput">Nama MC</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama MC.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['profil'] ?>" required>
                                                    <label for="floatingPassword">Profil</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['layanan'] ?>" required>
                                                    <label for="floatingPassword">Layanan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga'] ?>" required>
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Menu
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['tersedia'] ?>" required>
                                                    <label for="floatingInput">Tersedia</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Waktu yang Tersedia.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal View Menu-->

                    <!-- Modal Edit Menu -->
                <?php
                }
                foreach ($result as $row) {
                ?>
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_mc.php " method="post" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Your Name" name="foto" required>
                                                    <label class="input-group-text" for="uploadfoto">Upload foto menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan File Foto Menu.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_mc" required value="<?php echo $row['nama_mc'] ?>">
                                                    <label for="floatingInput">Nama Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Nama Menu.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="keterangan" name="profil" value="<?php echo $row['profil'] ?>">
                                                    <label for="floatingPassword">Profil</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="keterangan" name="layanan" value="<?php echo $row['layanan'] ?>">
                                                    <label for="floatingPassword">Layanan</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Mc
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Stok" name="tersedia" required value="<?php echo $row['tersedia'] ?>">
                                                    <label for="floatingInput">Waktu yang tersedia</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kesediaan Waktu.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_daftarmc_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit Menu -->

                    <!-- Modal Delete Menu -->
                <?php
                }
                foreach ($result as $row) {
                ?>
                    <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_mc.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus menu <b><?php echo $row['nama_mc'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Hapus</button>
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
                                <th scope="col">No</th>
                                <th scope="col">Foto </th>
                                <th scope="col">Nama </th>
                                <th scope="col">Profil</th>
                                <th scope="col">Layanan </th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tersedia</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td>
                                        <div style="width:140px">
                                        </div>
                                        <img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                    </td>
                                    <td><?php echo $row['nama_mc'] ?></td>
                                    <td><?php echo $row['profil'] ?></td>
                                    <td><?php echo $row['layanan'] ?></td>
                                    <td><?php echo $row['harga'] ?></td>
                                    <td><?php echo $row['tersedia'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
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
        </div>
    </div>
</div>
<script >
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>