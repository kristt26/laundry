<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title['header']?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
  <?php
  $a = $this->session->userdata('jenis');
  if(!$this->session->userdata('jenis') || $this->session->userdata('jenis')!='Admin'){
    $this->session->set_flashdata('pesan', 'Anda tidak memiliki akses, error');
    $this->session->sess_destroy();
    redirect('auth/authorization');
  }
  ?>
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>auth/authorization/logout" role="button">
            <b>LOGOUT</b>
          </a>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?= base_url();?>assets/index3.html" class="brand-link">
        <img src="<?= base_url();?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url()?>admin/profile" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/pegawai" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Pegawai
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/pelanggan" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Pelanggan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/pemesanan" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Pemesanan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/profile" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Traksaksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url()?>admin/profile" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Laporan
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Charts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ChartJS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Flot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../charts/inline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inline</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $title['header'];?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $title['dash'];?></li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="data-flush" data-flash="<?= $this->session->flashdata('pesan');?>"></div>