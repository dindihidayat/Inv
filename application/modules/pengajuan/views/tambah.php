<div class="container-fluid">
<!--     <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Gagal Menambahkan data</strong> <?php echo $this->session->flashdata('status'); ?>
    </div> -->
    <div class="row">
      <div class="col-md-12">
      <h3>Tambah Data Pengajuan</h3>
      </div>
    </div>
    <div class="card">
      <div class="row" style="padding-top:15px">
         <div class="col-md-12">
            <div class="form-group">
             <label class="custom-switch">
                <span class="custom-switch-description">Cari data dari sispran Berdasarkan Tanggal Pengajuan ? <a href="<?php echo base_url('index.php/pengajuan/cari_sispran') ?>" class="btn-link" title="Cari Data Pengajuan Dari Sispran">Cari Dari Sispran</a></span>
              </label>
              <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" href='#modal-id'><i class="fa fa-cloud-upload"></i> Upload File Excel data pengajuan</button>
            </div>
          </div>

<!--           <div class="col-md-12">
              <div class="col-md-6">
                <div class="form-group">
                  <form action="<?php echo base_url('index.php/pengajuan/tambah') ?>" method="get" accept-charset="utf-8">
                   <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input type="checkbox" aria-label="Checkbox for following text input" class="sudahpengajuan" value="1">Data pengajuan Yang sudah ada ?
                        </div>
                      </div>
                      <select class="form-control dis" aria-label="Text input with checkbox" name="kodebarang" disabled>
                        <?php if ($kodebarang->num_rows() > 0): ?>
                          <option>Pilih Kode Barang</option>
                          <?php foreach ($kodebarang->result() as $value): ?>
                            <option value="<?php echo $value->id_barang ?>"><?php echo $value->kodebarang ?> || <?php echo $value->nama ?></option>
                          <?php endforeach ?>
                        <?php endif ?>
                      </select>
                      <input type="text" class="form-control dis datepicker" aria-label="Text input with checkbox" name="tglpengajuan" disabled>
                      <button type="submit" class="btn btn-success dis" disabled><i class="fa fa-search"></i></button>
                    </div>
                  </form>
                </div>
              </div>
          </div> -->
      </div>
    </div>
  <!-- <?php echo validation_errors();?> -->
  <?php $attributes = array('class' => 'card',  "enctype"=>"multipart/form-data");
  echo form_open(base_url('index.php/pengajuan/action'), $attributes);
   ?>
  <!-- <form class="card" action="<?php echo base_url('index.php/pengajuan/action') ?>" method="post" enctype="multipart/form-data"> -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label class="form-label">
            <?php if ($tglpengajuanada->num_rows() > 0): ?>
              <input type="checkbox" class="checkbox check">
            <?php endif ?>
              Tanggal Pengajuan yang sudah ada ?
            </label>
            <input type="text" class="form-control datepicker belum" name="name[tgl_pengajuan]" placeholder="Tanggal">
            <select class="form-control yangada">
              <option value="">Pilih</option>
              <?php if ($tglpengajuanada->num_rows() > 0): ?>
                <?php foreach ($tglpengajuanada->result() as $ada): ?>
                  <option value="<?php echo substr($ada->tgl_pengajuan, 0,10) ?>"><?php echo substr($ada->tgl_pengajuan, 0,10) ?></option>
                <?php endforeach ?>
              <?php endif ?>
            </select>
              <small class="text-danger">
                <strong><?php echo form_error('name[tgl_pengajuan]'); ?></strong>
            </small>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Program Kerja</label>
            <input type="text" class="form-control prog_kerja" name="name[prog_kerja]" placeholder="Program Kerja" value="<?php if($barang){if($barang->num_rows() > 0){echo $barang->row()->prog_kerja;}else{echo "";}}  ?>">
            <small class="text-danger">
                <strong><?php echo form_error('name[prog_kerja]'); ?></strong>
            </small>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Kegiatan</label>
            <input type="text" class="form-control kegiatan" name="name[kegiatan]" placeholder="Kegiatan" value="<?php if($barang){if($barang->num_rows() > 0){echo $barang->row()->kegiatan;}else{echo "";}}  ?>">
            <small class="text-danger">
                <strong><?php echo form_error('name[kegiatan]'); ?></strong>
            </small>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Pengajuan Oleh</label>
            <select name="name[pengajuan]" class="form-control unit">
              <option value="logistik">Logistik</option>
              <option value="unit">Unit</option>
            </select>
            <small class="text-danger">
                <strong><?php echo form_error('name[pengajuan]'); ?></strong>
            </small>
          </div>
        </div>
        <div class="col-md-12 showunit">
          <div class="form-group">
            <label class="form-label">Unit</label>
            <input type="text" class="form-control" name="unit" placeholder="Unit">
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="<?php if($barang){if($barang->num_rows() > 0){echo $barang->row()->nama;}else{echo "";}} ?>">
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Satuan</label>
            <select class="form-control pilih" name="satuan">
              <option value="">Satuan</option>
              <?php if ($satuan->num_rows() > 0): ?>
                <?php foreach ($satuan->result() as $sat): ?>
                	<option value="<?php echo $sat->satuan ?>"><?php echo $sat->satuan ?></option>
                <?php endforeach ?>
              <?php endif ?>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Lokasi</label>
           <select class="form-control pilih" name="lokasi">
            <option value="">Lokasi</option>
            <?php if ($lokasi->num_rows() > 0): ?>
              <?php foreach ($lokasi->result() as $value): ?>
                <option value="<?php echo $value->id ?>" <?php if($barang){if($value->id == $barang->row()->lokasi){echo "selected";}} ?>><?php echo $value->lokasi ?></option>
              <?php endforeach ?>
            <?php endif ?>
          </select>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="<?php if($barang){if($barang->num_rows() > 0){echo $barang->row()->quantity;}else{echo "";}} ?>">
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="form-group">
            <label class="form-label">Sumber Dana</label>
            <input type="text" class="form-control" name="sumber_dana" placeholder="Sumber Dana" value="<?php if($barang){if($barang->num_rows() > 0){echo $barang->row()->sumber_dana;}else{echo "";}} ?>">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Harga Realisasi</label>
            <input type="number" class="form-control" name="harga_realisasi" placeholder="Harga Realisasi" value="<?php if($barang){if($barang->num_rows() > 0){echo $barang->row()->harga;}else{echo "";}} ?>">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label class="form-label">Gambar</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="gambar" onchange="getFileData(this);">
              <label class="custom-file-label labelnya">Choose file</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group mb-0">
            <label class="form-label">Spesifikasi</label>
             <textarea id="editor1" name="spesifikasi" rows="10" cols="80">
                Spesifikasi : <?php if($barang){if($barang->num_rows() > 0){echo $barang->row()->spesifikasi;}else{echo "";}} ?>
              </textarea>
          </div>
        </div>               
      </div>
    </div>
    <div class="card-footer text-right">
      <button type="button" class="btn btn-primary kembali">Kembali</button>
      <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Buat</button>
    </div>
  </form>
</div>

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('index.php/pengajuan/uploader') ?>" class="dropzone">
          <div class="fallback">
            <input name="file" type="file" multiple/>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function()
  {
    $('.pilih').select2();
    $('.yangada').hide();
    $('.showunit').hide();
  })
  $(function()
  {
    $(document).on('change','.unit',function(){
      var kode = $(this).val();
      if (kode == "logistik"){
        $('.showunit').hide();
      }else{
        $('.showunit').show();
      }
    })
    $('.check').on('click',function()
    {
      if (this.checked)
      {
        $('.belum').hide();
        $('.belum').removeClass('datepicker');
        $('.yangada').show();
      }else{
        $('.belum').show();
        $('.belum').addClass('datepicker');
        $('.yangada').hide();
      }
    })
    $('.datepicker').datepicker({format:'yyyy-mm-dd'})
      CKEDITOR.replace('editor1',{
      on: {
            pluginsLoaded: function(event) {
               event.editor.dataProcessor.dataFilter.addRules({
                  elements: {
                     script: function(element) {
                        return false;
                     }
                  }
               });
            }
         }
      });
    $('.yangada').change(function()
    {
      var kode = $(this).val();
      $('.belum').val(kode);
      $.ajax({
        url:"<?php echo base_url('index.php/pengajuan/ajaxget') ?>",
        method:"get",
        data:{kode:kode},
        dataType:"JSON",
        success:function(data)
        {
          $('.prog_kerja').val(data.prog_kerja);
          $('.kegiatan').val(data.kegiatan);
        }
      })
    })
    $(document).on('change','.darisispran',function()
    {
      if (this.checked){
      $('.tampilsembunyi').hide();
        
      }else{
      $('.tampilsembunyi').hide();
      }
    })
    $(document).on('click','.kembali',function()
    {
      location.href = '<?php echo base_url('index.php/pengajuan') ?>';
    })
    $(document).on('click','.carisispran',function()
    {
      var tanggal = $('.sispran').val();
      $.ajax({
        url:"<?php echo base_url('index.php/pengajuan/getdarisispran') ?>",
        data:{tanggal:tanggal},
        dataType:"JSON",
        method:"POST",
        success:function(data)
        {
          console.log(data);
        }
      })
    })
    $(document).on('change','.sudahpengajuan',function()
    {
      if (this.checked)
      {
        $('.dis').removeAttr('disabled');
      }else{
        $('.dis').attr('disabled','disabled');
      }
    })
  })
  function getFileData(myFile){
   var file = myFile.files[0];  
   var filename = file.name;
   $('.labelnya').text(filename);
   // console.log(filename);
  }
</script>