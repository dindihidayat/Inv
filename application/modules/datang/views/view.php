<div class="container-fluid">
 <div class="col-12">
  <h3>Data Datang Barang<a href="<?php echo site_url('index.php/datang/tambah') ?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Tambah Baru</a></h3>
    <div class="card">

        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><i class="icon-people"></i>#</th>
              <th class="text-center">Tanggal Kedatangan</th>
              <th class="text-center">No BST</th>
              <th class="text-center">No Po</th>
              <th class="text-center">Pic</th>
              <th class="text-center">Act</th>
              <!-- <th class="text-center"><i class="icon-settings"></i></th> -->
            </tr>
          </thead>
          <tbody>
            <?php if ($data->num_rows() > 0): ?>
              <?php $no = 1;foreach ($data->result() as $datang): ?>
                <tr>
                  <td class="text-center"><?php echo $no++ ?></td>
                  <td class="text-center"><?php echo mediumdate_indo(substr($datang->tgl_datang, 0,10)); ?></td>
                  <td class="text-center"><?php if($datang->no_bst){echo $datang->no_bst;}else{echo '<span class="text-danger" style="font-weight:bold" title="Nomor BST Kosong !"><i class="fe fe-x"></i></span>';} ?></td>
                  <td class="text-center"><?php if($datang->no_po){echo $datang->no_po;}else{echo '<span class="text-danger" style="font-weight:bold" title="Nomor Purchase Order Kosong !"><i class="fe fe-x"></i></span>';} ?></td>
                  <td class="text-center"><?php if($datang->pic){echo $datang->pic;}else{echo '<span class="text-danger" style="font-weight:bold"><i class="fe fe-alert-circle"></i>Tidak Ada PIC !</span>';} ?></td>
                  <td class="text-center">
                    <div class="item-action dropdown">
                      <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(15px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a href="<?php echo base_url('index.php/datang/info/'.str_replace('-', '_', $datang->tgl_datang)) ?>" class="dropdown-item text-info"><i class="dropdown-icon fe fe-info text-info"></i> Info </a>
                        <a href="<?php echo base_url('index.php/datang/edit/'.str_replace('-', '_', $datang->tgl_datang)) ?>" class="dropdown-item text-warning"><i class="dropdown-icon fe fe-edit-2 text-warning"></i> Edit </a>
                        <a href="<?php echo base_url('index.php/datang/trash/'.$datang->id_barang) ?>" class="dropdown-item text-danger"><i class="dropdown-icon fe fe-trash text-danger"></i> Hapus</a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url('index.php/datang/generatepdf/'.str_replace('-', '_', $datang->tgl_datang)) ?>" class="dropdown-item"><i class="dropdown-icon fa fa-file-pdf-o"></i> PDf</a>
                      </div>
                    </div>
                    </td>
                </tr>
              <?php endforeach ?>
              <?php else: ?>
                  <td colspan="6" class="text-center">Tidak Ada Data</td>
            <?php endif ?>
          </tbody>
        </table>

    </div>
  </div>
</div>