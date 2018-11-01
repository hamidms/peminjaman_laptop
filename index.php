<?php 

	session_start(); // mulai session
	include "function.php";

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Peminjaman Alat</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/jquery-ui.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        <style>
            .pilih:hover{cursor: pointer;}

            .kepala {
                color: white; 
                padding: 15px 50px 5px 50px; 
                float: right; 
                font-size: 16px;
            }

            .gambar {
                height: 60px; 
                width: 240px; 
                margin-top: 25px; 
                margin-bottom: 35px
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="kepala">


                    
                    <?php if (@$_SESSION['Admin'] || @$_SESSION['User']) { ?>
                        <a href="register.php" class="btn btn-warning">Register</a>
                        <a href="logout.php" class="btn btn-danger">Logout</a>

                    <?php } else { ?>

                        <a href="logout.php" class="btn btn-primary">Login</a>

                    <?php } ?>

                </div>
            </nav>
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
        				<li class="text-center">
                            <img src="assets/img/4.png" class="user-image img-responsive gambar"/>
    					</li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                        </li>
                        <li>
                            <a  href=""><i class="fa fa-sitemap fa-2x"></i> Peminjaman<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=daftar_peminjaman"> Daftar Peminjaman</a>
                                </li>
                                <li>
                                    <a href="?page=peminjaman"> Rekap Peminjaman</a>
                                </li>
                                <li>
                                    <a href="?page=sortir"> Sortir Pencarian</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?page=laptop"><i class="fa fa-desktop fa-2x"></i> Laptop</a>
                        </li>
                    </ul>
                </div>
            </nav>  

            <!-- /. NAV SIDE  -->
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                        <?php
                        
                            $page = @$_GET['page'];
                            $aksi = @$_GET['aksi'];

                            if ($page == "") {
                                include 'page/dashboard/dashboard.php';
                            } elseif ($page == "peminjaman") {
                            	if ($aksi == "") {
                            		include "page/peminjaman/peminjaman.php";
                            	} elseif ($aksi == "tambah") {
                            		include "page/peminjaman/tambah.php";
                            	} elseif ($aksi == "hapus") {
                            		include "page/peminjaman/hapus.php";
                            	}
                            } elseif ($page == "laptop") {
                            	if ($aksi == "") {
                            		include "page/laptop/laptop.php";
                            	} elseif ($aksi == "tambah") {
                            		include "page/laptop/tambah.php";
                            	} elseif ($aksi == "ubah") {
                            		include "page/laptop/ubah.php";
                            	} elseif ($aksi == "hapus") {
                            		include "page/laptop/hapus.php";
                            	}
                            } elseif ($page == "daftar_peminjaman") {
                            	if ($aksi == "") {
                            		include "page/daftar_peminjaman/daftar_peminjaman.php";
                            	} elseif ($aksi == "kembali") {
                            		include "page/daftar_peminjaman/kembali.php";
                            	} elseif ($aksi == "ubah") {
                                    include "page/daftar_peminjaman/ubah.php";
                                } elseif ($aksi == "batal") {
                                    include "page/daftar_peminjaman/batal.php";
                                } elseif ($aksi == "cetak") {
                                    include "page/daftar_peminjaman/cetak.php";
                                } elseif ($aksi == "lihat") {
                                    include "page/daftar_peminjaman/lihat.php";
                                }
                            } elseif ($page == "sortir") {
                                    include "page/sortir/sortir.php";
                            } 
                        
                         ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/jquery-1.12.4.js"></script>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.metisMenu.js"></script>
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.min.js"></script>
       
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();

                $(".pencarian").focusin(function() {
        		$("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
      		});
      		$('#example').DataTable();
            });
        </script>
        <script src="assets/js/custom.js"></script>
    </body>
    </html>