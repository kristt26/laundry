<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Pemesanan</h3>
      </div>
      <div class="card-body">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
              aria-controls="nav-home" aria-selected="true">Proses</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
              aria-controls="nav-profile" aria-selected="false">Selesai</a>
            <a class="nav-item nav-link" id="nav-batal-tab" data-toggle="tab" href="#nav-batal" role="tab"
              aria-controls="nav-profile" aria-selected="false">Batal</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-bordered">
              <thead class="bg-secondary">
                <tr>
                  <th>Kode Pemesanan</th>
                  <th>Nama Pelanggan</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Status</th>
                  <th style="width: 15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach($data as $item):?>
                <tr>
                  <td><?= $item->kd_pemesanan?></td>
                  <td><?= $item->nama?></td>
                  <td><?= $item->no_hp?></td>
                  <td><?= $item->alamat?></td>
                  <td><?= $item->tgl_pemesanan?></td>
                  <td><?= $item->status?></td>
                  <td>
                    <div class="tombol">
                      <button type="button" class="btn btn-default editpemesanan" data-kd_pemesanan="<?= $item->kd_pemesanan?>" data-status="<?= $item->status?>">
                        <ion-icon name="create-outline"></ion-icon>
                      </button>
                      <?php
                          if($item->status=='Boking'){?>
                      <bottom class="btn btn-danger hapusboking"
                        data-url="<?= base_url().'member/pemesanan/hapus/'.$item->kd_pemesanan?>">
                        <ion-icon name="trash-outline"></ion-icon>
                      </bottom>
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
                  <th>Nama Pelanggan</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
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
                  <td><?= $item->nama?></td>
                  <td><?= $item->no_hp?></td>
                  <td><?= $item->alamat?></td>
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
                  <th>Nama Pelanggan</th>
                  <th>Kontak</th>
                  <th>Alamat</th>
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
                  <td><?= $item->nama?></td>
                  <td><?= $item->no_hp?></td>
                  <td><?= $item->alamat?></td>
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
<div class="modal fade" id="modal-warning">
  <div class="modal-dialog">
    <div class="modal-content bg-default">
      <div class="modal-header">
        <h4 class="modal-title">Warning Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url()?>admin/pemesanan/ubah" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group row">
              <label for="bagian" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <input type="hidden" name="kd_pemesanan" id="kd_pemesanan"/>
                <select class="form-control" name="status" id="status">
                  <option value="Boking">Boking</option>
                  <option value="Proses">Proses</option>
                  <!-- <option value="Selesai">Selesai</option> -->
                  <option value="Batal">Batal</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-dark">Save changes</button>
        </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script>
  $(function () {
    $(document).ready(function () {
      var tombol;
      var kd_pegawai;
      var nama_pegawai;
      var bagian;
      $('.editpemesanan').on('click', function () {
        status = $(this).data('status');
        kd_pemesanan = $(this).data('kd_pemesanan');
        $('#status').val(status);
        $('#kd_pemesanan').val(kd_pemesanan);
        $('#modal-warning').modal('show');
      });

      $('.hapusboking').on('click', function () {
        const Url = $(this).data('url');
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