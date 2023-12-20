<div class="col-lg-3 ">
                <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 ">
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x']=='home') || !isset($_GET['x']))? 'active link-light' : 'link-dark' ;?>" aria-current="page" href="home"> <i class="bi bi-house-door"></i> Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2  <?php echo ((isset($_GET['x']) && $_GET['x']=='daftarmc'))? 'active link-light' : 'link-dark' ;?> " href="daftarmc"><i class="bi bi-person-lines-fill"></i> Daftar MC</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link ps-2  <?php echo ((isset($_GET['x']) && $_GET['x']=='order') )? 'active link-light' : 'link-dark' ;?> " href="order"><i class="bi bi-bag-plus"></i> Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2  <?php echo ((isset($_GET['x']) && $_GET['x']=='konfirmasipesanan') )? 'active link-light' : 'link-dark' ;?> " href="konfirmasipesanan"><i class="bi bi-calendar-check"></i> Konfirmasi Pesanan</a>
                                    </li>
                                    <?php if($hasil['level']== 1) {?>
                                        <a class="nav-link ps-2  <?php echo ((isset($_GET['x']) && $_GET['x']=='user') )? 'active link-light' : 'link-dark' ;?> " href="user"><i class="bi bi-file-person"></i> User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2  <?php echo ((isset($_GET['x']) && $_GET['x']=='report') )? 'active link-light' : 'link-dark' ;?> " href="report"><i class="bi bi-flag"></i> Report</a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>