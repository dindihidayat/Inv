<div class="container-fluid">
	<form class="card" action="<?php echo base_url('index.php/master_data/action'); ?>" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <h3 class="card-title">Tambah Data Master Barang</h3>
      <div class="row">
        <div class="col-md-12">
         <label class="custom-checkbox">
           <input type="checkbox" id="cek" class="cek" name="cek" value="1"><strong>Barang Pengadaan ?</strong>
         </label>
        </div>
        <div class="clearfix">
          <hr>
        </div>
        <div class="col-sm-12 col-md-12 tgl_pengajuan">
          <div class="form-group">
            <span class="form-control-label">Tanggal Pengajuan</span>
            <input type="text" name="tgl_pengajuan" class="form-control">
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Nama Barang</label>
            <input type="text" class="form-control" placeholder="Nama Barang" name="nama">
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="form-group">
            <label class="form-label">Satuan</label>
            <select class="form-control" name="satuan">
              <option>Satuan</option>
              <option value="1">Pcs</option>
              <option value="2">Pack</option>
              <option value="3">Box</option>
            	<option value="4">Box</option>
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="form-label">Lokasi</label>
           <select class="form-control" name="lokasi">
            <option>Lokasi</option>
            <?php if ($lokasi->num_rows() > 0): ?>
              <?php foreach ($lokasi->result() as $key): ?>
                <option value="<?php echo $key->id ?>"><?php echo $key->lokasi ?></option>
              <?php endforeach ?>
            <?php endif ?>
           </select>
          </div>
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="form-group">
            <label class="form-label">Sumber Dana</label>
            <input type="text" class="form-control" placeholder="Sumber Dana" name="sumber_dana">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" placeholder="Quantity" name="quantity">
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group">
            <label class="form-label">Harga Realisasi</label>
            <input type="number" class="form-control" placeholder="Harga Realisasi" name="harga_realisasi">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label class="form-label">Gambar</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="gambar">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group mb-0">
            <label class="form-label">Spesifikasi</label>
            <!-- <textarea rows="5" class="form-control" placeholder="Spesifikasi"></textarea> -->
             <textarea id="editor1" name="spesifikasi" rows="10" cols="80">
                Spesifikasi :
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
<script type="text/javascript">
  $(document).ready(function()
  {
    $('.tgl_pengajuan').hide();
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
        $(document).on('click','.kembali',function()
        {
          location.href = "<?php echo base_url('index.php/master_barang'); ?>";
        })
        $(document).on('change','.cek',function()
        {
         if (this.checked)
         {
          $('.tgl_pengajuan').show();
         }else{
          $('.tgl_pengajuan').hide();
         }
        })
  })
</script>