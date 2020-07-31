<div class="row">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Pelanggan</h3>
      </div>
      <form action="<?= base_url()?>admin/pelanggan/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="hidden" class="form-control" name="kd_pelanggan" id="kd_pelanggan">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pelanggan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="no_hp" class="col-sm-3 col-form-label">Kontak (Hp.)</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Kontak Hp." required>
            </div>
          </div>
          <div class="form-group row">
            <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                  <input type="radio" class="jk" id="jk1" name="jk" value="Pria" checked>
                  <label for="jk1">Pria
                  </label>
                </div>
                <div class="icheck-primary d-inline">
                  <input type="radio" class="jk" id="jk2" value="Wanita" name="jk">
                  <label for="jk2">Wanita
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
            </div>
          </div>
          <div class="form-group row username">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="username" id="username" placeholder="User Name" required>
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
              <th>Nama</th>
              <th>Kontak</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th style="width: 15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no =1;
              foreach($data as $item):?>
            <tr>
              <td><?= $no?></td>
              <td><?= $item->nama?></td>
              <td><?= $item->no_hp?></td>
              <td><?= $item->jk?></td>
              <td><?= $item->alamat?></td>
              <td>
            
                <div class="tombol">
                  <bottom class="btn btn-default" id="ubahPelanggan" data-kd_pelanggan="<?= $item->kd_pelanggan?>"
                    data-nama="<?= $item->nama?>" data-no_hp="<?= $item->no_hp?>" data-jk="<?= $item->jk?>"
                    data-alamat="<?= $item->alamat?>">
                    <ion-icon name="create-outline"></ion-icon>
                  </bottom>
                  <bottom class="btn btn-danger hapuspelanggan"
                    data-url="<?= base_url().'admin/pelanggan/hapus/'.$item->kd_pelanggan?>">
                    <ion-icon name="trash-outline"></ion-icon>
                  </bottom>
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
      var kd_pelanggan;
      var nama;
      var no_hp;
      var jk;
      var alamat;
      if (document.getElementById("kd_pelanggan").value == "") {
        $('.prosess').val('Simpan');
      } else {
        $('.prosess').val('Ubah');
      }
      // get Edit Product
      $('.btn-default').on('click', function () {
        $(".username").hide();
        // get data from button edit
        kd_pelanggan = $(this).data('kd_pelanggan');
        nama = $(this).data('nama');
        no_hp = $(this).data('no_hp');
        jk = $(this).data('jk');
        alamat = $(this).data('alamat');
        // Set data to Form Edit
        $('#kd_pelanggan').val(kd_pelanggan);
        $('#nama').val(nama);
        $('#no_hp').val(no_hp);

        $('#alamat').val(alamat);
        if (jk == 'Wanita')
          $('#jk2').prop('checked', true);
        else
          $('#jk1').prop('checked', true);
        $('.prosess').val('Ubah');
      });

      $('.clear').on('click', function () {
        $('#kd_pelanggan').empty();
        $('#nama').empty();
        $('#no_hp').empty();

        $('#alamat').empty();
        $('#jk1').prop('checked', true);
        $('.prosess').val('Simpan');
        $(".username").show();
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