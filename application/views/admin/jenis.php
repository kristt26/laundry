<div class="row">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Jenis Laundry</h3>
      </div>
      <form action="<?= base_url()?>admin/jenis/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="jenis" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="hidden" class="form-control" name="idjenispakaian" id="idjenispakaian">
              <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis Laundry" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="harga" class="col-sm-3 col-form-label">Harga Satuan</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="harga" id="harga" placeholder="harga" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="statusbiaya" class="col-sm-3 col-form-label">Jenis Biaya</label>
            <div class="col-sm-9">
              <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                  <input type="radio" class="statusbiaya" id="statusbiaya1" name="statusbiaya" value="perkilo" checked>
                  <label for="statusbiaya1">Per Kilo
                  </label>
                </div>
                <div class="icheck-primary d-inline">
                  <input type="radio" class="statusbiaya" id="statusbiaya2" value="perpotong" name="statusbiaya">
                  <label for="statusbiaya2">Per Potong
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" class="btn btn-primary prosess">
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Jenis Laundry</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Jenis Laundry</th>
              <th>Harga</th>
              <th>Jenis Biaya</th>
              <th  style="width: 15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach($data as $item):?>
              <tr>
                <td><?= $no++?></td>
                <td><?= $item->jenis?></td>
                <td><?= $item->harga?></td>
                <td><?= $item->statusbiaya?></td>
                <td>
                  <div class="tombol">
                    <bottom class="btn btn-default ubahJenis" id="ubahJenis" data-idjenispakaian="<?= $item->idjenispakaian?>" data-jenis="<?= $item->jenis?>" data-harga="<?= $item->harga?>" data-statusbiaya="<?= $item->statusbiaya?>"><ion-icon name="create-outline"></ion-icon></bottom>
                    <!-- <bottom class="btn btn-danger hapuspegawai" data-url ="<?= base_url().'admin/pegawai/hapus/'.$item->idjenispakaian?>"><ion-icon name="trash-outline"></ion-icon></bottom> -->
                  </div>
                </td>
              </tr>
            <?php endforeach;?>
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
      var idjenispakaian;
      var jenis;
      var harga;
      var statusbiaya;
      if(document.getElementById("idjenispakaian").value == ""){
        $('.prosess').val('Simpan');
      }else{
        $('.prosess').val('Ubah');
      }
        // get Edit Product
        $('.ubahJenis').on('click', function () {
            // get data from button edit
            idjenispakaian = $(this).data('idjenispakaian');
            jenis = $(this).data('jenis');
            harga = $(this).data('harga');
            statusbiaya = $(this).data('statusbiaya');
            // Set data to Form Edit
            $('#idjenispakaian').val(idjenispakaian);
            $('#jenis').val(jenis);
            $('#harga').val(harga);
            if (statusbiaya == 'perkilo')
                $('#statusbiaya1').prop('checked', true);
            else
                $('#statusbiaya2').prop('checked', true);
            $('.prosess').val('Ubah');
        });

        // get Delete Product
        $('.hapuspegawai').on('click', function () {
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

        $('.btn-delete-wisata').on('click', function () {
            // get data from button edit
            const id = $(this).data('id');
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
                            type: 'POST',
                            url: Url,
                            data: { 'id': id },
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