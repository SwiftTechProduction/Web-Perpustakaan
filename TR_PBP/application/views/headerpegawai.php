<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library</title>
	<!-- Bootstrap Styles-->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="<?php echo base_url() ?>assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url() ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>





<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url('BukuPController/') ?>"><strong>Perpustakaan</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a href="<?= site_url('LoginController/logoutpegawai') ?>" >
                        <i class="fa fa-sign-out fa-fw"></i></i>Logout
                    </a>
                   
                    <!-- /.dropdown-user -->
                </li>
				
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
		
		
		
		
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					
                   <li>
                        <a href="<?= site_url('BukuPController/') ?>"><i class="fa fa-table"></i> Buku</a>
                    </li>
					
					<li>
                        <a href="<?= site_url('TransaksiPController/') ?>"><i class="fa fa-table"></i> Transaksi</a>
                    </li>

                 
                </ul>

            </div>

        </nav>
		
		
		
		
		
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
		<div class="header"> 
                        <h1 class="page-header">
                           Halaman Pegawai <small>ini adalah halaman khusus pegawai perpustakaan</small>
                        </h1>								
		</div>