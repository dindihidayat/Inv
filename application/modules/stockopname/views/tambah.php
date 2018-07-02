<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<h3>Tambah Data Stockopname</h3>
		</div>
	</div>

	<div class="card">
		
		<div class="card-body">
			<form action="<?php echo base_url('index.php/stockopname/tambah') ?>" method="get" accept-charset="utf-8">
			<div class="row" style="border:1px solid #b2bec3">
			<div class="col-md-6">
				<div class="form-group">
					<label>Filter</label>
					<select class="form-control" name="lokasi">
						<option value="">Lokasi</option>
						<?php if ($lokasi->num_rows() > 0): ?>
							<?php foreach ($lokasi->result() as $lok): ?>
								<option value="<?php echo $lok->id ?>" <?php if($id_lokasi == $lok->id){echo "selected";} ?>><?php echo $lok->lokasi ?></option>
							<?php endforeach ?>
							<?php else: ?>
								<option value="">Belum Ada lokasi</option>
						<?php endif ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>&nbsp;</label>
					<div class="input-group">
					<select class="form-control" name="sumber_dana">
						<option value="">Sumber Dana</option>
						<?php if ($sumber_dana->num_rows() > 0): ?>
							<?php foreach ($sumber_dana->result() as $value): ?>
								<option value="<?php echo $value->sumber_dana ?>" <?php if($sumberdana == $value->sumber_dana){echo "selected";} ?>><?php echo $value->sumber_dana ?></option>
							<?php endforeach ?>
							<?php else: ?>
								<option value="">Belum ada sumber dana</option>
						<?php endif ?>
					</select>
					<div class="input-group-btn">
						<button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
					</div>
					</div>
				</div>
			</div>
			</div>
			<div class="clearfix">
				<hr>
			</div>
			</form>
			<form id="simpan_opname" action="" method="post" >
			<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Tanggal</label>
					<input type="text" name="tglopname" class="form-control datepicker tgl_opname" placeholder="Tanggal Stockopname">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>No Stockopname</label>
					<input type="text" name="no_opname" class="form-control no_opname" placeholder="Nomor Stockopname">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Penanggung Jawab</label>
					<input type="text" name="pic" class="form-control pic" placeholder="Penanggun Jawab Stockopname">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group pull-right">
					<label>&nbsp;</label>
					<div class="input-group">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</div>
				</div>
			</div>
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-bordered">
						<thead>
							<tr>
								<th>Kodebarang</th>
								<th>Barang</th>
								<th>Quantity Program</th>
								<th>Quantity Rill</th>
								<th>Ket</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($barang->num_rows() > 0): ?>
								<?php foreach ($barang->result() as $key): ?>
									<tr>
										<td><input type="hidden" name="kodebarang[]" value="<?php echo $key->kodebarang ?>"><?php echo $key->kodebarang ?></td>
										<td><input type="hidden" name="barang[]" value="<?php echo $key->nama ?>"><?php echo $key->nama ?></td>
										<td><input type="hidden" name="qty[]" value="<?php if($key->qty_datang){echo $key->qty_datang;}else{echo 'Barang ini masih dalah proses pengajuan';}?>"><?php if($key->qty_datang){echo $key->qty_datang;}else{echo 'Barang ini masih dalah proses pengajuan';}?></td>
										<td><input type="number" name="qty_rill[]" class="form-control" placeholder="Quantity Rill"></td>
										<td>
											<div class="form-group">
										    <input type="text" class="form-control" name="ket[]" placeholder="Keterangan">
										    <small class="form-text text-muted">Kosongkan jika tidak ada keterangan</small>
										  </div>
										</td>
									</tr>
									<?php $g = $this->stockopname_model->checkopname($key->kodebarang) ?>
									<?php if ($g->row()->opnamemax): ?>
										<tr>
											<td colspan="5" style="background: #dfe6e9"><i class="fa fa-hand-pointer-o" style="color:white;font-weight: bold;"></i> Sudah di Stockopname (Terakhir Stockopname <strong><?php echo $g->row()->opnamemax ?></strong>)</td>
										</tr>
									<?php endif ?>
								<?php endforeach ?>
							<?php else: ?>
								<tr>
									<td colspan="5">Tidak ada data</td>
								</tr>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
			</form>
			<div class="row">
				<?php echo $page ?>
			</div>
		</div>
		<div class="col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-status bg-warning"></div>
                  <div class="card-header">
                    <h3 class="card-title">Info</h3>
                    <div class="card-options">
                      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
                    Quantity yang diinputkan harus yang benar benar sudah di cek pada saat pengecekan stock fisik !
                  </div>
                </div>
        </div>
	</div>

</div>
<script>
	$(function()
	{
		$('.datepicker').datepicker({format:"yyyy-mm-dd"});
		$('#simpan_opname').on('submit',function(e)
		{
			e.preventDefault();
			var tanggal = $('.tgl_opname').val();
			var pic = $('.pic').val();
			var no_opname = $('.no_opname').val();
			if (tanggal == '' || pic == '' || no_opname == ''){
				gagal();
			}else{	
				$.ajax({
					url:"<?php echo base_url('index.php/stockopname/save_opname') ?>",
					data: new FormData(this), 
					method:"POST",
					dataType:"JSON",
					contentType: false,
					cache: false,
					processData:false,
					success:function(data)
					{
						if (data.status == true)
						{
							launch_toast();
							location.href = "<?php echo base_url('index.php/stockopname/tambah') ?>"
						}else{
							failed();
						}
					}
				})
			}
		})
	})
	function launch_toast() {
	   swal({
		  type: 'success',
		  title: 'Berhasil Menyimpan Data Stockopname',
		  showConfirmButton: false,
		  timer: 1500
		})
	}
	function gagal() {
	   swal({
		  // position: 'center',
		  type: 'warning',
		  title: 'Field Tanggal,Pic, Nomor Stockopname tidak boleh kosong',
		  showConfirmButton: false,
		  timer: 3000
		})
	}
	function failed() {
	   swal({
		  // position: 'center',
		  type: 'warning',
		  title: 'Gagal Menambahkan data',
		  showConfirmButton: false,
		  timer: 3000
		})
	}
</script>