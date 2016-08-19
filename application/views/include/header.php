<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seeds School Of Exellence</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/public/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/iCheck/flat/blue.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables/dataTables.bootstrap.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fullcalendar/fullcalendar.print.css" media="print">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php $session = $this->session->userdata('session_data');
    $id = $session['id'];
    $role = $session['role']; ?>
    <header class="main-header">
        <!-- Logo -->
        <?php if ($role == "admin" || $role=="teacher") { ?>
            <a href="<?php echo site_url() ?>admin/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Seeds School Of</b>Exellence</span>
            </a>

        <?php }
        if ($role == "receptionist") { ?>
            <a href="<?php echo site_url() ?>reception/index" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Seeds School Of</b>Exellence</span>
            </a>
        <?php } ?>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if ($role == "admin") { ?>
                        <li role="presentation">
                            <a href="<?= site_url() ?>graphical">Home</a>
                        </li>
                        <li role="presentation">
                            <a href="<?= site_url() ?>visitor/index">Visitor
                                <span class="badge">
                         <?php echo $this->visitor_m->unviewed_visitors(); ?>
                        </span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="<?= site_url() ?>events/">Calander</a>
                        </li>
                    <?php } ?>

                    <li class="dropdown user user-menu">
                        <a href="<?php echo base_url('home/logout'); ?>">
                  <span class="hidden-xs">
                  <?php if ($this->session->userdata('session_data')) { ?>
                      <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                  <?php } ?>
                  </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>