<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>DataPegawai</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url();?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url();?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url();?>assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo base_url();?>assets/images/icon/log.png" alt="kominfo" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="<?php echo base_url();?>users">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <?php if ($this->session->userdata('role')=='ADMIN'){ ?>
                        <li>
                            <a href="<?php echo base_url();?>pegawai">
                                <i class="fas fa-table"></i>Pegawai</a>
                        </li>
                        <?php } else { ?> <li></li> <?php } ?>
                        <li>
                            <a href="<?php echo base_url();?>barang">
                                <i class="fas fa-table"></i>Data Barang</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search !!!" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">ADMINISTRATOR</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">ADMIN</a>
                                                    </h5>
                                                    <span class="email">diskominfo@batukota.go.id</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?php echo base_url();?>login/logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                <div class="card">
                                    <div class="card-header">
                                        Edit Data
                                        <strong>Barang</strong>
                                    </div>
                                    <div class="card-body card-block">
                                    <?php foreach($barang as $u){ ?>
                                        <form action="<?php echo base_url();?>barang/edit" method="post" class="form-horizontal" >
                                            <div class="row form-group">
                                                <div class="col col-sm-5">
                                                    <label for="input-normal" class=" form-control-label">NAMA</label>
                                                    <input type="hidden" name="idbarang" value="<?php echo $u->idbarang ?>">
                                                    <input type="hidden" name="idpegawai" value="<?php echo $u->idpegawai ?>">
                                                </div>
                                                <div class="col col-sm-6">
                                                    <input type="text" id="input-normal" name="nama" placeholder="Normal" class="form-control" value="<?php echo $u->nama ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-5">
                                                    <label for="input-normal" class=" form-control-label">NAMA BARANG</label>
                                                </div>
                                                <div class="col col-sm-6">
                                                    <input type="text" id="input-normal" name="nama_brg" placeholder="Normal" class="form-control" value="<?php echo $u->nama_brg ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-sm-5">
                                                        <label for="input-normal" class=" form-control-label">SPESIFIKASI</label>
                                                    </div>
                                                    <div class="col col-sm-6">
                                                        <input type="text" id="input-normal" name="spesifikasi" placeholder="Normal" class="form-control"  value="<?php echo $u->spesifikasi ?>">
                                                    
                                                </div>
                                            </div>                            
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm" value="SIMPAN" >
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                                <?php } ?>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>COPYRIGHT@ghulam2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url();?>assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url();?>assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>

</html>

