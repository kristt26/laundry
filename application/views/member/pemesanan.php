<div class="row d-flex flex-row-reverse" style="margin-bottom:12px;">
  <a href="<?= base_url()?>member/pemesanan/simpan" class="button">Boking</a>
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
                <?php
                  $no = 1;
                  foreach($data as $item):?>
                  <tr>
                      <td><?= $item->kd_pemesanan?></td>
                      <td><?= $item->tgl_pemesanan?></td>
                      <td><?= $item->status?></td>
                    <td>
                      <div class="tombol">
                        <?php
                          if($item->status=='Boking'){?>
                            <bottom class="btn btn-danger hapusboking" data-url ="<?= base_url().'member/pemesanan/hapus/'.$item->kd_pemesanan?>"><ion-icon name="trash-outline"></ion-icon></bottom>
                          <?php } else{
                            ?>
                            <bottom class="btn btn-default disabled"><ion-icon name="trash-outline"></ion-icon></bottom>
                          <?php }?>
                        
                      </div>
                    </td>
                  </tr>
                <?php
                  $no++;
                 endforeach;?>
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
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($selesai as $item):?>
                    <tr>
                      <td><?= $item->kd_pemesanan?></td>
                      <td><?= $item->tgl_pemesanan?></td>
                      <td><?= $item->status?></td>
                    </tr>
                  <?php endforeach;?>
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
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($batal as $item):?>
                    <tr>
                      <td><?= $item->kd_pemesanan?></td>
                      <td><?= $item->tgl_pemesanan?></td>
                      <td><?= $item->status?></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
          </div>
        </div>
        
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
</script>