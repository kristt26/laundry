        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.5
      </div>
      <strong><a href="http://adminlte.io">Sistem Informasi Laundry</a></strong> 
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  
  <!-- Bootstrap 4 -->
  <script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="<?= base_url();?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="<?= base_url();?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url();?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url();?>assets/dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      bsCustomFileInput.init();
    });

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