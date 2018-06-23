<div class="container-fluid">
 <div class="col-12">
  <h3>Master Barang <a href="<?php echo base_url('index.php/master_data/tambah') ?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Tambah Baru</a></h3>
  <div class="clearfix">
    <hr>
  </div>
    <form action="<?php echo base_url('index.php/master_data') ?>" method="get" accept-charset="utf-8">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-label">Cari</label>
          <input type="text" name="cari" class="form-control" <?php echo $carikey ?>>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-label">Lokasi</label>
          <select class="form-control" name="lokasi">
            <option value=""> Lokasi </option>
              <?php if ($lokasi->num_rows() > 0): ?>
                <?php foreach ($lokasi->result() as $lokasii): ?>
                  <option value="<?php echo $lokasii->id ?>" <?php if($id_lokasi == $lokasii->id){echo "selected";} ?>><?php echo $lokasii->lokasi ?></option>
                <?php endforeach ?>
              <?php endif ?>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class="form-label">Sumber Dana</label>
          <div class="input-group">
          <select name="sumber_dana" class="form-control">
            <option value="">Sumber Dana</option>
            <?php if ($sumberdata->num_rows() > 0): ?>
              <?php foreach ($sumberdata->result() as $sumberdanas): ?>
                <option value="<?php echo $sumberdanas->sumber_dana ?>" <?php if($sumber_dana == $sumberdanas->sumber_dana){echo "selected";} ?>><?php echo $sumberdanas->sumber_dana ?></option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
          <div class="input-group-btn">
            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
            <a href="<?php echo base_url('index.php/master_data') ?>" title="Refresh" class="btn btn-success"><i class="fa fa-refresh"></i></a>
          </div>
          </div>
        </div>
      </div>
    </div>
    </form>

    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><i class="icon-people"></i>#</th>
              <th>Kode</th>
              <th>Barang</th>
              <th>Satuan</th>
              <th class="text-center">Lokasi</th>
              <th class="text-center">Sumber Dana</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Act</th>
              <!-- <th class="text-center"><i class="icon-settings"></i></th> -->
            </tr>
          </thead>
          <tbody>
            <?php if ($data->num_rows() > 0): ?>
              <?php $no = 1;foreach ($data->result() as $key): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $key->kodebarang ?></td>
                  <td><?php echo $key->nama ?></td>
                  <td><?php echo $key->satuan ?></td>
                  <td><?php echo $key->id_lokasi ?></td>
                  <td><?php echo $key->sumber_dana ?></td>
                  <td><?php echo $key->quantity ?></td>
                  <td><div class="item-action dropdown">
                      <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(15px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a href="<?php echo base_url('index.php/master_data/edit/'.$key->id_barang) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2 text-warning"></i> Edit </a>
                        <a href="<?php echo base_url('index.php/master_data/trash/'.$key->id_barang) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-trash text-danger"></i> Hapus</a>
                        <a href="<?php echo base_url('index.php/master_data/info/'.$key->id_barang) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-info text-info"></i> Info Spesifikasi </a>
                        <!-- <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a> -->
                      </div>
                    </div></td>
                </tr>
              <?php endforeach ?>
              <?php else: ?>
              <tr><td colspan="8">Tidak Ada Data</td></tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    <div class="card-footer">
      <div class="col-md-12">
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
    </div>
  </div>
</div>