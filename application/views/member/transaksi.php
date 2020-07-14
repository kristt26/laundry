<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Traksasi</h3>
      </div>
      <div class="card-body">
      <table class="table table-bordered">
              <thead  class="bg-warning">
                <tr>
                  <th>kd_pemesanan</th>
                  <th>Tanggal Ambil</th>
                  <th>Jenis Pakaian</th>
                  <th>Berat</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach($data as $item):?>
                  <tr>
                      <td><?= $item->kd_pemesanan?></td>
                      <td><?= $item->tgl_ambil?></td>
                      <td><?= $item->jenis_type?></td>
                      <td><?= $item->berat?></td>
                      <td><?= $item->jumlah?></td>
                  </tr>
                <?php
                  $no++;
                 endforeach;?>
              </tbody>
            </table>
      </div>
    </div>
  </div>
</div>