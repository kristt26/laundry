<div class="row">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Transaksi</h3>
      </div>
      <form action="<?= base_url()?>admin/transaksi/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row kd_pemesanan" id="kd_pemesanan">
            <label for="id" class="col-sm-4 col-form-label">Kode Pemesanan</label>
            <div class="col-sm-8">
              <select name="id" class="form-control select2" id="id" style="width: 100%;">
                <option></option>
                <?php foreach($pemesanan as $item):?>
                  <option value='<?= $item->id?>'><?= $item->kd_pemesanan?></option>
                <?php endforeach;?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="tgl_ambil" class="col-sm-4 col-form-label">Tanggal Ambil</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control" name="kd_transaksi" id="kd_transaksi" required>
              <input type="date" class="form-control" name="tgl_ambil" id="tgl_ambil" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis_type" class="col-sm-4 col-form-label">Jenis Type</label>
            <div class="col-sm-8">
              <input class="form-control" name="jenis_type" id="jenis_type" placeholder="jenis_type" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="berat" class="col-sm-4 col-form-label">Berat</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="berat" id="berat" placeholder="Dalam Kg" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah satuan potong" required>
            </div>
          </div>
        </div>
        <div class="card-footer justify-content-between">
          <input type="submit" class="btn btn-primary prosess">
          <botton type="button" class="btn btn-default clear">Clear</button>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Pelanggan</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Kode Pemesanan</th>
              <th>Tanggal Ambil</th>
              <th>Jenis</th>
              <th>Berat<br>(Kg)</th>
              <th>Jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no =1;
              foreach($transaksi as $item):?>
            <tr>
              <td><?= $no?></td>
              <td><?= $item->kd_pemesanan?></td>
              <td><?= $item->tgl_ambil?></td>
              <td><?= $item->jenis_type?></td>
              <td><?= $item->berat?></td>
              <td><?= $item->jumlah?></td>
              <td>
                <div class="tombol">
                  <bottom class="btn btn-default ubahTransaksi" data-kd_transaksi="<?= $item->kd_transaksi?>"
                    data-tgl_ambil="<?= $item->tgl_ambil?>" data-jenis_type="<?= $item->jenis_type?>" data-berat="<?= $item->berat?>"
                    data-jumlah="<?= $item->jumlah?>">
                    <ion-icon name="create-outline"></ion-icon>
                  </bottom>
                  <!-- <bottom class="btn btn-danger hapuspelanggan"
                    data-url="<?= base_url().'admin/pelanggan/hapus/'.$item->kd_transaksi?>">
                    <ion-icon name="trash-outline"></ion-icon>
                  </bottom> -->
                </div>
              </td>
            </tr>
            <?php 
              $no ++;
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    $(document).ready(function () {
      var tombol;
      var kd_transaksi;
      var tgl_ambil;
      var jenis_type;
      var berat;
      var jumlah;
      if (document.getElementById("tgl_ambil").value == "") {
        $('.prosess').val('Simpan');
      } else {
        $('.prosess').val('Ubah');
      }
      // get Edit Product
      $('.ubahTransaksi').on('click', function () {
        $("#kd_pemesanan").hide();
        // get data from button edit
        kd_transaksi = $(this).data('kd_transaksi');
        tgl_ambil = $(this).data('tgl_ambil');
        jenis_type = $(this).data('jenis_type');
        berat = $(this).data('berat');
        jumlah = $(this).data('jumlah');
        // Set data to Form Edit
        $('#kd_transaksi').val(kd_transaksi);
        $('#tgl_ambil').val(tgl_ambil);
        $('#jenis_type').val(jenis_type);
        $('#berat').val(berat);
        $('#jumlah').val(jumlah);
        $('.prosess').val('Ubah');
      });

      $('.clear').on('click', function () {
        $('#kd_transaksi').val("");
        $('#tgl_ambil').val("");
        $('#jenis_type').val("");
        $('#berat').val("");
        $('#jumlah').val("");
        $('.prosess').val('Simpan');
        $("#kd_pemesanan").show();
      });

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