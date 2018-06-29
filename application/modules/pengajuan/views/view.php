<div class="container-fluid">
 <div class="col-12">
  <h3>Data Pengajuan <a href="<?php echo site_url('index.php/pengajuan/tambah') ?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Tambah Baru</a></h3>
    <?php if ($this->session->flashdata('status')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Pesan</strong> Berhasil Menambahkan Data
    </div>
    <?php endif ?>
    <div class="card">
      <!-- <div class="table-responsive"> -->
        <div class="pull-right">
        <div class="col-md-6">
          <form action="<?php echo base_url('index.php/pengajuan') ?>" method="get" accept-charset="utf-8">
            <div class="form-group">
              <div class="input-group">
                <select name="tahun" class="form-control">
                  <option value="">Tahun</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>
                  <option value="2016">2016</option>
                  <option value="2015">2015</option>
                </select>
                <input type="text" name="pengajuan" class="form-control" placeholder="Pengajuan">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
        </div>
        <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th>Tanggal Pengajuan</th>
              <th>Jumlah Barang</th>
              <th class="text-center">Total Harga</th>
              <th class="text-center">Yang Mengajukan</th>
              <th class="text-center">Act</th>
              <!-- <th class="text-center"><i class="icon-settings"></i></th> -->
            </tr>
          </thead>
          <tbody>
            <?php if ($data->num_rows() > 0): ?>
              <?php foreach ($data->result() as $key): ?>
                <tr>
                  <td class="center" align="center"><?php if(substr($key->tgl_pengajuan, 0,10) == '0000-00-00'){echo 'Tanggal Tidak Valid <a class="btn btn-primary" data-toggle="modal" href="#mod-'.substr($key->tgl_pengajuan, 0,10).'">Trigger modal</a>';}else{echo longdate_indo(substr($key->tgl_pengajuan, 0,10));} ?>
                  <div class="modal fade" id="mod-<?php echo substr($key->tgl_pengajuan, 0,10) ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Tanggal Yang Tidak Valid</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="tgl_pengajuan" class="form-control datepicker datanya" placeholder="Tanggal Pengajuan">
                              <input type="hidden" name="tgl_asli" class="tgl_asli" value="<?php echo $key->tgl_pengajuan ?>">
                              <div class="input-group-btn">
                                <button type="button" class="btn btn-success save"><i class="fa fa-save"></i></button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  </td>
                  <td class="center" align="center"><?php echo $key->count ?></td>
                  <td class="center" align="center"><?php echo $key->quantity * 120000 ?></td>
                  <td class="center" align="center"><?php echo $key->peng ?></td>
                  <td class="center" align="center">
                    <div class="item-action dropdown">
                      <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(15px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a href="<?php echo base_url('index.php/pengajuan/info/'.substr($key->tgl_pengajuan, 0,10)) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-info"></i> Info </a>
                        <a href="<?php echo base_url('index.php/pengajuan/edit?tgl='.substr($key->tgl_pengajuan, 0,10)) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Edit </a>
                        <a href="javascript:;" class="dropdown-item hapus" data-tanggal="<?php echo substr($key->tgl_pengajuan, 0,10) ?>"><i class="dropdown-icon fe fe-trash"></i> Hapus</a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo base_url('index.php/pengajuan/generatepdf/'.substr($key->tgl_pengajuan, 0,10)) ?>" class="dropdown-item"><i class="dropdown-icon fa fa-file-pdf-o"></i> ExportTo PDF</a>
                      </div>
                    </div>
                    </td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <td colspan="5" align="center">Tidak ada data</td>
            <?php endif ?>
          </tbody>
        </table>
        <div class="pagination">
          <?php echo $this->pagination->create_links() ?>
        </div>
      <!-- </div> -->
    </div>
  </div>
</div>
<script>
  $(function()
  {
    $('.datepicker').datepicker({format:"yyyy-mm-dd"});
    $(document).on('click','.save',function()
    {
      var tanggal = $('.datanya').val();
      var tgl_asli = $('.tgl_asli').val();
      $.ajax({
        url:"<?php echo base_url('index.php/pengajuan/save_tgl_invalid') ?>",
        data:{tanggal:tanggal,tgl_asli:tgl_asli},
        method:"post",
        dataType:"JSON",
        success:function(data)
        {
          swal({
            title: 'Berhasil Mengganti tanggal',
            text: 'popup ini akan close dalam 2 detik.',
            timer: 2000,
            onOpen: () => {
              swal.showLoading()
            }
          }).then((result) => {
            if (
              // Read more about handling dismissals
              result.dismiss === swal.DismissReason.timer
            ) {
              console.log('Berhasil')
            }
          })
        }
      })
    })

    $('.hapus').click(function ()
    {
      var tanggal = $(this).data('tanggal');
      const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
      })

      swalWithBootstrapButtons({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:"<?php echo base_url('index.php/pengajuan/hapus') ?>",
            data:{tanggal:tanggal},
            method:"post",
            dataType:"JSON",
            success:function(data)
            {
              if (data.status)
              {
                swalWithBootstrapButtons(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            }
          })
        } else if (
          // Read more about handling dismissals
          result.dismiss === swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    })
  })
</script>