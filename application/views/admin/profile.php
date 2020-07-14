<div class="row">
  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Data Profile</h3>
      </div>
      <form action="<?= base_url()?>admin/profile/simpan" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="namaLaundry" class="col-sm-2 col-form-label">Nama Laundry</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" name="kd_profile" id="namaLaundry" value="<?= isset($data->kd_profile) ? $data->kd_profile : null?>">
              <input type="text" class="form-control" name="nama_laundry" id="namaLaundry" value="<?= isset($data->nama_laundry) ? $data->nama_laundry :''?>" placeholder="Nama Laundry">
            </div>
          </div>
          <div class="form-group row">
            <label for="noTlp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="no_tlp" id="noTlp" value="<?= isset($data->no_tlp) ? $data->no_tlp :''?>" placeholder="No Telepon">
            </div>
          </div>
          <div class="form-group row">
            <label for="alamatLaundri" class="col-sm-2 col-form-label">Alamat Laundri</label>
            <div class="col-sm-10">
              <textarea type="text" name="alamat_laundry" id="alamatLaundri" class="form-control" aria-describedby="helpId"><?= isset($data->alamat_laundry) ? $data->alamat_laundry :''?></textarea>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>