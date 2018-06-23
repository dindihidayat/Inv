<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/loading.css')?>">
<div class="container-fluid">
	<div class="col-md-12">
	<h3>Cari Data Dari Sispran</h3>
	<div class="card">
		<div class="col-md-12" style="padding-top:10px">
			<form action="<?php echo base_url('index.php/pengajuan/cari_sispran') ?>" method="get">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="barang" class="form-control">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group">
						<label>Tanggal Pengajuan</label>
						<div class="input-group">
							<input type="text" name="tanggal" class="form-control datepicker">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
			<div class="clearfix">
				<hr>
			</div>
			<form id="form_input" action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Tanggal pengajuan</label>
						<input type="text" name="tgl_pengajuan" class="form-control" readonly="readonly" value="<?php if($dari_sispran){if($dari_sispran->num_rows() > 0){echo substr($dari_sispran->row()->tgl_pengajuan_fra, 0,10);}} ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Kegiatan</label>
						<input type="text" name="kegiatan" class="form-control kegiatan">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Program Kerja</label>
						<input type="text" name="prog_kerja" class="form-control prog_kerja">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Pengajuan Oleh</label>
						<input type="text" name="unit" class="form-control" value="<?php if($dari_sispran){if($dari_sispran->num_rows() > 0){echo $dari_sispran->row()->nama_unit;}} ?>">
					</div>
				</div>
			</div>
			<div class="row">
				<table class="table table-condensed table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th><label class="fa fa-check"></label></th>
							<th>Kodebarang</th>
							<th>Barang</th>
							<th>Satuan</th>
							<th>Quantity</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Sisipkan Gambar</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($dari_sispran): ?>
						<?php if ($dari_sispran->num_rows() > 0): ?>
							<?php $no = 0;foreach ($dari_sispran->result() as $key): ?>
							<?php $g = $this->pengajuan_model->getnama($key->kode_modal); ?>
								<tr>
									<td><input type="hidden" name="hidden[]" value="<?php echo $no ?>"><?php echo $no+1 ?></td>
									<td><input type="checkbox" class="form-check check" data-id="<?php echo $no ?>" value="1" name="check<?php echo $no ?>"><input type="hidden" name="cekdatanya[]" class="di<?php echo $no ?>" value="0"></td>
									<td><input type="hidden" name="kode_modal[]" value="<?php echo $key->kode_modal ?>"><?php echo $key->kode_modal ?>
									<?php $cek = $this->pengajuan_model->check_existing($key->kode_modal) ?>
									<?php if ($cek): ?>
										<span class="form-text text-muted">Data sudah ada di database</span>
									<?php endif ?>
									</td>
									<td><?php if(!empty($g->nama)){echo $g->nama.'<input type="hidden" name="nama[]" value="'.$g->nama.'">';}else{echo '<input type="text" name="nama[]" class="form-control">';} ?></td>
									<td><input type="hidden" name="satuan[]" value="<?php echo $key->satuan ?>"><?php echo $key->satuan ?></td>
									<td><input type="hidden" name="volume[]" value="<?php echo $key->volume ?>"><?php echo $key->volume ?></td>
									<td><input type="hidden" name="spesifikasi[]" value="<?php echo $key->spesifikasi ?>"><input type="hidden" name="harga[]" value="<?php echo $key->harga_satuan ?>"><?php echo $key->harga_satuan ?></td>
									<td><?php echo $key->volume * $key->harga_satuan ?></td>
									<td><div class="custom-file">
						              <input type="file" class="custom-file-input" name="gambar<?php echo $no ?>" onchange="getFileData(this,<?php echo $no ?>);">
						              <label class="custom-file-label labelnya<?php echo $no ?> lab<?php echo $no ?>">Choose file</label>
						            </div></td>
								</tr>
							<?php $no++; endforeach ?>
						<?php else: ?>
							<tr><td colspan="7" class="text-center">Tidak Ada data</td></tr>
						<?php endif ?>
						<?php else: ?>
							<tr><td colspan="7" class="text-center">Belum ada data yang dicari</td></tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
			<div class="row" style="padding-bottom:10px">
				<div class="col-md-12">
					<button type="submit" class="btn btn-success pull-right simpan"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
			</form>
		</div>
	</div>

	</div>
</div>




<!-- loading -->
<div class="container loading">
  <div class="row">
    <div id="loader">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="lading"></div>
    </div>
  </div>
</div>

<!-- end of loading -->
<script>
	$(document).ready(function()
	{
		$('.loading').hide()
	})
	$(function()
	{
		$('.datepicker').datepicker({format:'yyyy-mm-dd'});
		$(document).on('click','.cari',function()
		{
			$.ajax({
				url:"<?php echo base_url('index.php/pengajuan/caridisispran') ?>",
				data:$('#caridisispran').serialize(),
				method:"post",
				dataType:"JSON",
				success:function(data)
				{
					console.log($('#caridisispran').serialize());
				}
			})
		})
		$('.dindi').click(function()
		{
			console.log($(':checkbox:checked').length);
		})
		$("#form_input").on('submit',(function(e) {
			e.preventDefault();
			$('.loading').show();
			if ($(':checkbox:checked').length > 0){
				$.ajax({
					url: "<?php echo base_url('index.php/pengajuan/save_data_sispran_new') ?>",
					type: "POST",
					dataType:"JSON",
					data: new FormData(this), 
					contentType: false,
					cache: false,
					processData:false,
				success: function(data)
				{
					$('.loading').hide();
					berhasil();
					console.log(data);
				}
				});

			}else if($('.kegiatan').val() == '' || $('.prog_kerja').val() == ''){
				$('.loading').hide();
				swal({
					type:"warning",
					title:"Field Kegiatan dan Program Kerja Harus diisi",
					showConfirmButton:false,
					timer:1500
				})				
			}else{
				$('.loading').hide();
				swal({
					type:"warning",
					title:"Tidak ada data yang dipilih",
					showConfirmButton:false,
					timer:1500
				})
			}
		}));

		$('.check').change(function()
		{
			var kode = $(this).data('id');
			if (this.checked)
			{
				$('.di'+kode).val('1');
			}else{
				$('.di'+kode).val('0');
			}
		})
	})
  	function getFileData(myFile,no){
	   var file = myFile.files[0];  
	   var filename = file.name;
	   $('.labelnya'+no).text(filename);
	   console.log(no);
	}
	function berhasil()
	{
		swal({
		  type: 'success',
		  title: 'Data Telah disimpan',
		  showConfirmButton: false,
		  timer: 1500
		})
	}
</script>