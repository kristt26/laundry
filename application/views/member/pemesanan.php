<div ng-app="app" ng-controller="pemesananController">
  <div class="row d-flex flex-row-reverse" style="margin-bottom:12px;">
    <a href="" class="button" data-toggle="modal" data-target="#modal-warning" ng-click="itemPesanan=[]">Boking</a>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">Data Pemesanan</h3>
        </div>
        <div class="card-body">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Proses</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Selesai</a>
              <a class="nav-item nav-link" id="nav-batal-tab" data-toggle="tab" href="#nav-batal" role="tab" aria-controls="nav-profile" aria-selected="false">Batal</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <table class="table table-bordered">
                <thead  class="bg-secondary">
                  <tr>
                    <th>Kode Pemesanan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Status</th>
                    <th  style="width: 15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="item in datas.data.data">
                        <td>{{item.kd_pemesanan}}</td>
                        <td>{{item.tgl_pemesanan}}</td>
                        <td>{{item.status}}</td>
                      <td>
                        <div class="tombol">
                            <bottom class="btn btn-danger hapusboking"><ion-icon name="trash-outline"></ion-icon></bottom>
                            <bottom class="btn btn-warning"><i class="fas fa-edit" ng-click="setDetail(item)"></i></bottom>
                        </div>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <table class="table table-bordered">
                  <thead class="bg-info">
                    <tr>
                      <th>Kode Pemesanan</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="item in datas.data.selesai">
                      <td>{{item.kd_pemesanan}}</td>
                      <td>{{item.tgl_pemesanan}}</td>
                      <td>{{item.status}}</td>
                      <td><bottom class="btn btn-warning"><i class="fas fa-edit" data-toggle="modal" data-target="#detail" ng-click="itemPesanan=item.detail"></i></bottom></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="nav-batal" role="tabpanel" aria-labelledby="nav-batal-tab">
            <table class="table table-bordered">
                  <thead class="bg-danger">
                    <tr>
                      <th>Kode Pemesanan</th>
                      <th>Tanggal Pemesanan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr ng-repeat="item in datas.data.batal">
                        <td>{{item.kd_pemesanan}}</td>
                        <td>{{item.tgl_pemesanan}}</td>
                        <td>{{item.status}}</td>
                        <td><bottom class="btn btn-warning"><i class="fas fa-edit" data-toggle="modal" data-target="#detail" ng-click="itemPesanan=item.detail"></i></bottom></td>
                      </tr>
                  </tbody>
                </table>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-warning">
    <div class="modal-dialog">
      <div class="modal-content bg-default">
        <div class="modal-header">
          <h4 class="modal-title">Data Pesanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="jenispakaian" class="col-sm-4 col-form-label">Jenis Pakaian</label>
                  <div class="col-sm-8">
                    <select class="form-control" ng-options="item as item.jenis for item in datas.jenis" name="idjenispakaian" ng-model="jenis" ng-change="model.jenis=jenis.jenis;model.idjenispakaian= jenis.idjenispakaian" id="jenispakaian">
                      <option></option>                      
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Pakaian</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="jumlah" id="jumlah" ng-model="model.jumlah">
                  </div>
                </div>
                <div class="form-group row">
                  <button type="button" class="btn btn-info" ng-click="add()">Tambah</button>
                </div>
              </form>
            </div>
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th>Jenis Pakaian</th>
                  <th>Jumlah Potong</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat = "item in itemPesanan">
                  <td>{{item.jenis}}</td>
                  <td>{{item.jumlah}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-outline-dark" ng-click="simpan()">Simpan</button>
            </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="detail">
    <div class="modal-dialog">
      <div class="modal-content bg-default">
        <div class="modal-header">
          <h4 class="modal-title">Detail Pesanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          
          <div class="card-body">
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th>Jenis Pakaian</th>
                  <th>Jumlah Potong</th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat = "item in itemPesanan">
                  <td>{{item.jenis}}</td>
                  <td>{{item.jumlah}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Tutup</button>
            </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
<script>
$(function () {
    $(document).ready(function () {
      var tombol;
      var kd_pegawai;
      var nama_pegawai;
      var bagian;
      // if(document.getElementById("kd_pegawai").value == ""){
      //   $('.prosess').val('Simpan');
      // }else{
      //   $('.prosess').val('Ubah');
      // }
        // get Delete Product
        $('.hapusboking').on('click', function () {
            // get data from button edit
            const Url = $(this).data('url');
            // Set data to Form Edit
            // $('.edit-kategori').val(idkategori);
            swal({
                title: "Anda Yakin?",
                text: "Akan Melakukan Pembatalan?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'DELETE',
                            url: Url,
                            success: function (data) {
                                swal("Information!", "Berhasil di Hapus", "success")
                                    .then((value) => {
                                        location.reload();
                                    });
                            }
                        });
                    }
                });
        });
    });
})
angular.module('app', [])
    .directive('format', ['$filter', function ($filter) {
      return {
        require: '?ngModel',
        link: function (scope, elem, attrs, ctrl) {
          if (!ctrl) return;

          ctrl.$formatters.unshift(function (a) {
            return $filter(attrs.format)(ctrl.$modelValue, attrs.format == 'currency' ? '' : null)
          });

          elem.bind('blur', function (event) {
            var plainNumber = elem.val().replace(/[^\d|\-+|\.+]/g, '');
            elem.val($filter(attrs.format)(plainNumber));
          });
        }
      };
    }])
    .controller('pemesananController', function ($scope, $http) {
      $scope.datas = [];
      $scope.model = {};
      $scope.model.jenis = [];
      $scope.model.tgl_ambil = new Date();
      $scope.model.total = 0;
      $scope.tombol = "Simpan"
      $scope.cetak = false;
      $scope.itemPesanan = [];
      $scope.jenis = {};
      $scope.dataprint = {};
      $http({
        method: 'get',
        url: '<?=base_url()?>member/pemesanan/getData',
      }).then(response => {
        $scope.datas = response.data;
      })
      $scope.simpan =()=>{
        $http({
        method: 'POST',
        url: '<?= base_url()?>member/pemesanan/simpan',
        data: $scope.itemPesanan
      }).then(response => {
        location.reload();
      })
      }
      $scope.add = ()=>{
        $scope.itemPesanan.push(angular.copy($scope.model))
        $scope.model = {};
        $scope.jenis = {};
      }

      $scope.setDetail= (item)=>{
        $scope.itemPesanan = item.detail;
        $('#detail').modal('show');
      }
    })
</script>