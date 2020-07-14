<div class="row">
  <div class="col-md-4">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Pegawai</h3>
      </div>
      <form action="<?= base_url()?>admin/pegawai/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="namaPegawai" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="hidden" class="form-control" name="kd_pegawai" id="kd_pegawai">
              <input type="text" class="form-control" name="nama_pegawai" id="namaPegawai" placeholder="Nama pegawai" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="bagian" class="col-sm-3 col-form-label">Bagian</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="bagian" id="bagian" placeholder="Bagian" required>
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
        <h3 class="card-title">Data Pegawai</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">No</th>
              <th>Nama</th>
              <th>Bagian</th>
              <th  style="width: 15%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach($data as $item):?>
              <tr>
                <td><?= $no++?></td>
                <td><?= $item->nama_pegawai?></td>
                <td><?= $item->bagian?></td>
                <td>
                  <div class="tombol">
                    <bottom class="btn btn-default ubahPegawai" id="ubahPegawai" data-kd_pegawai="<?= $item->kd_pegawai?>" data-nama_pegawai="<?= $item->nama_pegawai?>" data-kd_pegawai="<?= $item->kd_pegawai?>" data-bagian="<?= $item->bagian?>"><ion-icon name="create-outline"></ion-icon></bottom>
                    <bottom class="btn btn-danger hapuspegawai" data-url ="<?= base_url().'admin/pegawai/hapus/'.$item->kd_pegawai?>"><ion-icon name="trash-outline"></ion-icon></bottom>
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
      var kd_pegawai;
      var nama_pegawai;
      var bagian;
      if(document.getElementById("kd_pegawai").value == ""){
        $('.prosess').val('Simpan');
      }else{
        $('.prosess').val('Ubah');
      }
        // get Edit Product
        $('.ubahPegawai').on('click', function () {
            // get data from button edit
            kd_pegawai = $(this).data('kd_pegawai');
            nama_pegawai = $(this).data('nama_pegawai');
            bagian = $(this).data('bagian');
            // Set data to Form Edit
            $('#kd_pegawai').val(kd_pegawai);
            $('#namaPegawai').val(nama_pegawai);
            $('#bagian').val(bagian);
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