<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/loading.css')?>">
<div class="container-fluid">
	<div class="col-md-12">
	<h3>Edit Data Pengajuan</h3>
	<div class="card">
		<div class="col-md-12" style="padding-top:10px">
			<form action="<?php echo base_url('index.php/pengajuan/edit?tgl='.$tanggal) ?>" method="get">
			<div class="row">
				<div class="col-md-12"  style="border-bottom: 1px solid #b2bec3;">
					<span>Cari Data</span>
				</div>
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
							<input type="text" name="tanggal" class="form-control datepicker" value="<?php echo $tanggal ?>">
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
						<input type="text" name="tgl_pengajuan" class="form-control" value="<?php echo $tanggal ?>" readonly="readonly">
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
						<input type="text" name="unit" class="form-control">
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
							<th>Gambar</th>
							<th>Act</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($dari_sispran): ?>
						<?php if ($dari_sispran->num_rows() > 0): ?>
							<?php $no = 0;foreach ($dari_sispran->result() as $key): ?>
								<tr class="barang<?php echo $key->id_barang ?>">
									<td><input type="hidden" name="hidden[]" value="<?php echo $key->id_barang ?>"><?php echo $no+1 ?></td>
									<td><input type="checkbox" class="form-check check" data-id="<?php echo $no ?>" value="1" name="check<?php echo $no ?>" checked disabled><input type="hidden" name="cekdatanya[]" class="di<?php echo $no ?>" value="1"></td>
									<td><input type="hidden" name="kode_modal[]" value="<?php echo $key->kodebarang ?>"><?php echo $key->kodebarang ?>
									<?php $cek = $this->pengajuan_model->check_existing($key->kodebarang) ?>
									<?php if ($cek): ?>
										<span class="form-text text-muted">Data sudah ada di database</span>
									<?php endif ?>
									</td>
									<td><?php if(!empty($key->nama)){echo $key->nama.'<input type="hidden" name="nama[]" value="'.$key->nama.'">';}else{echo '<input type="text" name="nama[]" class="form-control">';} ?></td>
									<td><input type="hidden" name="satuan[]" value="<?php echo $key->satuan ?>"><?php echo $key->satuan ?></td>
									<td><input type="hidden" name="volume[]" value="<?php echo $key->quantity ?>"><?php echo $key->quantity ?></td>
									<td><input type="hidden" name="spesifikasi[]" value="<?php echo $key->spesifikasi ?>"><input type="hidden" name="harga[]" value="<?php echo $key->harga ?>"><?php echo $key->harga ?></td>
									<td><?php echo $key->quantity * $key->harga ?></td>
									<td><img src="<?php echo base_url('upload/gambar/'.$key->gambar) ?>" style="width: 50px;height: 50px"></td>
									<td><button type="button" class="btn btn-danger btn-sm hapus" data-id="<?php echo $key->id_barang ?>"><i class="fa fa-trash"></i></button></td>
								</tr>
							<?php $no++; endforeach ?>
						<?php else: ?>
							<tr><td colspan="7">Tidak ada data</td></tr>
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
		var saya;
		$('.hapus').click(function()
		{
			saya = $(this);
			$('.barang'+saya.data('id')).remove();
		})
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
					url: "<?php echo base_url('index.php/pengajuan/save_data_sispran_edit') ?>",
					type: "POST",
					dataType:"JSON",
					data: new FormData(this), 
					contentType: false,
					cache: false,
					processData:false,
				success: function(data)
				{
					if (data.status == true) {

					$('.loading').hide();
					berhasil();
					console.log(data);
				}else{
					alert('Error')
				}
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