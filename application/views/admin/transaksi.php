<div class="row" ng-app="app" ng-controller="transaksiController">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Transaksi</h3>
      </div>
      <form ng-submit="simpan()" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row kd_pemesanan" id="kd_pemesanan">
            <label for="id" class="col-sm-4 col-form-label">Kode Pemesanan</label>
            <div class="col-sm-8">
              <div ng-show="tombol=='Simpan'" ng-hide="tombol=='Ubah'">
                <select ng-options="item as item.kd_pemesanan for item in datas.pemesanan" class="form-control select2"
                  ng-model="pemesanan" style="width: 100%;" ng-change="model.id_pemesanan = pemesanan">
                </select>
              </div>
              <input ng-show="tombol=='Ubah'" ng-hide="tombol=='Simpan'" type="text" class="form-control"
                ng-model="model.kd_pemesanan" disabled>

            </div>
          </div>
          <div class="form-group row">
            <label for="tgl_ambil" class="col-sm-4 col-form-label">Tanggal Ambil</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tgl_ambil" id="tgl_ambil" ng-model="model.tgl_ambil"
                required>
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis_type" class="col-sm-4 col-form-label">Jenis Type</label>
            <div class="col-sm-8">
              <select class="form-control select2" style="width: 100%;"
                ng-options="item as item.jenis for item in datas.jenis" ng-model="jenis" ng-change="selected(jenis)">
                <option>Select</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer justify-content-between">
          <input type="submit" class="btn btn-primary" value="{{tombol}}">
          <button type="button" class="btn btn-default" ng-click="clear()">Clear</button>
          <button ng-if="cetak" type="button" class="btn btn-success" id="printNota" ng-click="print()">Cetak</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Detail</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="35%">Jenis</th>
              <th>Berat</th>
              <th>Jumlah</th>
              <th width="40%">Bayar</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in model.jenis">
              <td><input type="text" class="form-control" ng-model="item.jenis" disabled></td>
              <td><input type="number" class="form-control" ng-model="item.berat" ng-change="hitung()"></td>
              <td><input type="number" class="form-control" ng-model="item.jumlah" ng-change="hitung()"></td>
              <td>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp. </span>
                  </div>
                  <input type="text" class="form-control text-right" ng-model="item.bayar" format="currency" disabled>
                </div>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp. </span>
                  </div>
                  <input type="text" class="form-control text-right" ng-model="model.total" format="currency" disabled>
                </div>
              </td>

            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Transaksi</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Kode Pemesanan</th>
              <th>Tanggal Ambil</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in datas.transaksi">
              <td>{{$index+1}}</td>
              <td>{{item.kd_pemesanan}}</td>
              <td>{{item.tanggal}}</td>
              <td>
                <div class="tombol">
                  <bottom class="btn btn-default" ng-click="ubah(item)">
                    <ion-icon name="create-outline"></ion-icon>
                  </bottom>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id="data-print">
    <div class="print-header">
      <h3 class="text-center">
        <strong>{{dataprint.nama_laundry}}</strong><br>
      </h3>
      <h5 class="text-center">{{dataprint.alamat_laundry}}</h5>
      <hr>
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="35%">Jenis</th>
                <th>Berat</th>
                <th>Jumlah</th>
                <th width="40%">Bayar</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="item in model.jenis">
                <td>{{item.jenis}}</td>
                <td>{{item.berat}}</td>
                <td>{{item.jumlah}}</td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="text" class="form-control text-right" ng-model="item.bayar" format="currency">
                  </div>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">TOTAL BAYAR</td>
                <td>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp. </span>
                    </div>
                    <input type="text" class="form-control text-right" ng-model="model.total" format="currency">
                  </div>
                </td>

              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
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
    .controller('transaksiController', function ($scope, $http) {
      $scope.datas = [];
      $scope.model = {};
      $scope.model.jenis = [];
      $scope.model.tgl_ambil = new Date();
      $scope.model.total = 0;
      $scope.tombol = "Simpan"
      $scope.cetak = false;
      $scope.dataprint = {};
      $http({
        method: 'get',
        url: '<?=base_url()?>admin/transaksi/gettransaksi',
      }).then(response => {
        $scope.datas = response.data;
        angular.forEach($scope.datas.transaksi, value => {
          var tgl = value.tgl_ambil.split('-');
          value.tanggal = new Date(tgl[0], tgl[1] - 1, tgl[2]);
          value.tanggal = convertanggal(value.tanggal)
        })
        console.log($scope.datas);
      })
      $scope.selected = (item) => {
        if (item) {
          item.berat = 0;
          item.jumlah = 0;
          item.bayar = 0;
          item.total = 0;
          $scope.model.jenis.push(angular.copy(item));
        }
      }
      $scope.simpan = () => {
        $http({
          method: 'post',
          url: '<?=base_url()?>admin/transaksi/simpan',
          data: $scope.model
        }).then(response => {
          $scope.datas = response.data;
          angular.forEach($scope.datas.transaksi, value => {
            var tgl = value.tgl_ambil.split('-');
            value.tanggal = new Date(tgl[0], tgl[1] - 1, tgl[2]);
            value.tanggal = convertanggal(value.tanggal)
          })
          $scope.tombol = "Simpan"
          $scope.tombol = "Ubah"
          if ($scope.model.kd_transaksi == undefined) {
            swal("Information!", "Berhasil di ditambahkan", "success").then((value) => {

            });
          } else {
            swal("Information!", "Berhasil diubah", "success").then((value) => {

            });
          }
        }, error => {
          swal("Information!", "proses gagal", "error").then((value) => {

          });
        })
      }
      $scope.ubah = (item) => {
        $scope.model = item;
        var cektanggal = typeof $scope.model.tgl_ambil;
        if (cektanggal == "string") {
          var tgl = $scope.model.tgl_ambil.split('-');
          $scope.model.tgl_ambil = new Date(tgl[0], tgl[1] - 1, tgl[2]);
        }
        angular.forEach(item.jenis, value => {
          value.berat = parseInt(value.berat);
          value.jumlah = parseInt(value.jumlah);
        })
        $scope.cetak = true;
        $scope.tombol = "Ubah"
      }
      $scope.clear = () => {
        $scope.model = {};
        $scope.model.jenis = [];
        $scope.tombol = "Simpan"
        $scope.cetak = false;
      }
      $scope.print = () => {
        $http({
          method: 'get',
          url: '<?= base_url()?>admin/profile/getprofile'
        }).then(params => {
          $scope.dataprint = params.data;
          setTimeout(function() {
            $('#data-print').printArea();
          }, 500);
          
        })

      }
      $scope.hitung = () => {
        $scope.model.total = 0;
        angular.forEach($scope.model.jenis, item => {
          if (item.statusbiaya == 'perkilo') {
            item.bayar = parseFloat(item.berat) * parseInt(item.harga);
            $scope.model.total += item.bayar;
          } else {
            item.bayar = parseInt(item.jumlah) * parseInt(item.harga);
            $scope.model.total += item.bayar;
          }
        })
      }
    })
  $(function () {
    $(document).ready(function () {
      // get Delete Product
      $('.hapuspelanggan').on('click', function () {
        // get data from button edit
        const Url = $(this).data('url');
        // Set data to Form Edit
        // $('.edit-kategori').val(idkategori);
        swal({
          title: "Anda Yakin?",
          text: "Akan Melakukan Penghapusan data?",
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
</script>