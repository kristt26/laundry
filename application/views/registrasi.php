<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title['header']?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="data-flush" data-flash="<?= $this->session->flashdata('pesan');?>"></div>
  <div class="login-box">
    <div class="login-logo">
      <h3>REGISTRASI USER</h3>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Lengkapi biodata anda</p>

        <form action="<?= base_url();?>authorization/simpan" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="number" class="form-control" name="no_hp" placeholder="Kontak">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select name="jk" class="form-control">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-transgender"></span>
              </div>
            </div>
          </div>
          
          <div class="input-group mb-3">
            <textarea type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-home"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <div>
              <a href="<?= base_url()?>index.php/authorization" type="submit" class="btn btn-secondary btn-block" style="margin-top: 0 !important ;">Kembali</a>
            </div>
              <div>
              <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
              </div>
              
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url();?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    $(function () {
      $(document).ready(function () {
          var data = $('.data-flush').data('flash');
          console.log(data);
          if (data) {
              var a = data.split(',');
              if (a[1].replace(/\s/g, '') == 'success') {
                  swal("Information!", a[0], "success");
              } else {
                  swal("Information!", a[0], "error");
              }
          }
      })
    })
  </script>

</body>

</html>