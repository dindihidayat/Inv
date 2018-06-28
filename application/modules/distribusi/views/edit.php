<div class="container-fluid">
	<div class="col-md-12">
		<h3>Tambah Distribusi</h3>
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<form action="<?php echo base_url('index.php/distribusi/edit') ?>" method="get" accept-charset="utf-8">
					<div class="form-group">
                      <label class="form-label">Cari Barang Berdasarkan</label>
                      <div class="input-group">
                        <input type="hidden" class="form-control" name="tanggal" value="<?php echo $tanggal ?>">
                        <input type="text" class="form-control datetime" name="tgl_nya" value="<?php echo $this->input->get('tgl_nya') ?>">
                        <div class="input-group-append">
                        <select name="tgl" class="form-control bg-primary">
                        	<option value="pengajuan" <?php $g = $this->input->get('tgl'); if($g){if($g == 'pengajuan'){echo "selected";}} ?>>Tanggal Pengajuan Barang</option>
                        	<option value="datang" <?php $g = $this->input->get('tgl'); if($g){if($g == 'datang'){echo "selected";}} ?>>Tanggal Datang Barang</option>
                        </select>
                    	<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    	<a href="<?php echo base_url('index.php/distribusi/edit?tanggal='.$tanggal) ?>" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                        </div>
                      </div>
                    </div>
					</form>
				</div>
				<form class="inputnya" action="" method="post">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">Tanggal BAST-U</label>
							<input type="text" class="form-control datetime dontempty_tgl" name="tgl_bast_u" placeholder="Tanggal BAST-U" value="<?php echo $edit->row()->tgl_bast_u ?>">
							<input type="hidden" class="form-control" name="tgl_old" value="<?php echo $edit->row()->tgl_bast_u ?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="form-label">Nomor BAST-U</label>
							<input type="text" class="form-control dontempty_no" name="no_bast_u" placeholder="Nomor BAST-U" value="<?php echo $edit->row()->no_bast_u ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-label">Penerima Barang</label>
							<input type="text" class="form-control dontempty_pic" name="pic" placeholder="Penerima Barang" value="<?php echo $edit->row()->penerima ?>">
						</div>
					</div>
					<div class="col-md-12">
						<hr>
					</div>

					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Barang</h4>
								<table class="table table-condensed table-striped">
									<thead>
										<tr>
											<th></th>
											<th>KodeBarang</th>
											<th>Barang</th>
											<th>Lokasi</th>
											<th>Quantity</th>
											<th>Quantity Yang Akan di Distribusikan</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($barang->num_rows() > 0): ?>
										<?php foreach ($barang->result() as $key): ?>
											<tr>
												<td>
													<?php 
														$g = $this->Dsitribusi_model->checkdistribusi($key->id_barang);
														if ($g->num_rows() > 0) {
															if (($key->quantity - $g->row()->sum_qty) == 0) { ?>
																<input type="checkbox" class="form-check check" value="0" data-id="<?php echo $key->id_barang ?>">
							
															<?php }else{
																echo '<input type="checkbox" class="form-check check" value="1" data-id="'.$key->id_barang.'">';
															}
														}else{
															echo '<input type="checkbox" class="form-check check" value="1" data-id="'.$key->id_barang.'">';
														}
													 ?>

												</td>
												<td><?php echo $key->kodebarang ?></td>
												<td><?php echo $key->nama ?></td>
												<td>Gudang</td>
												<td>
													<?php 
														$g = $this->Dsitribusi_model->checkdistribusi($key->id_barang);
														if ($g->num_rows() > 0) {
															if (($key->quantity - $g->row()->sum_qty) == 0) {
																echo '<span class="text-info" style="font-weight:bold">Barang Sudah didistribusikan Semuanya</span>';
															}else{
																echo "didistribusikan".$g->row()->sum_qty.' dari '.$key->quantity;
															}
														}else{
															echo $key->quantity;
														}
													 ?>
												</td>
												<td><input type="text" name="qty[]" class="form-control <?php echo $key->id_barang ?>" disabled>
													<input type="hidden" name="id_barang[]" value="<?php echo $key->id_barang ?>">
													<input type="hidden" name="count[]" class="id_<?php echo $key->id_barang ?>" value="0">
												</td>
											</tr>
										<?php endforeach ?>
										<?php else: ?>
											<tr>
												<td colspan="6" class="text-center">Tidak Ada Data Barang</td>
											</tr>
										<?php endif ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<button type="button" class="btn btn-success">Kembali</button>
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(function()
	{
		$('.datetime').datepicker({format:"yyyy-mm-dd"});
		$('.inputnya').on('submit',(function(e)
		{
			e.preventDefault();
			if ($(':checkbox:checked').length == 0) {
				swal({
				  type: 'warning',
				  title: 'Tidak ada data yang dipilih',
				  showConfirmButton: false,
				  timer: 1500
				})
			}else if($('.dontempty_tgl').val() == '' || $('.dontempty_no').val() == '' || $('.dontempty_pic').val() == ''){
				swal({
				  type: 'warning',
				  title: 'Tanggal BST, Nomor BST & PIC Jangan dikosongkan',
				  showConfirmButton: false,
				  timer: 1500
				})
			}else{
				$.ajax({
					url:"<?php echo base_url('index.php/distribusi/simpan_edit') ?>",
					method:"post",
					data:new FormData(this),
					dataType:"JSON",
					contentType: false,
					cache: false,
					processData:false,
					success:function(data)
					{
						if (data.status == true)
						{
							console.log(data);
							// location.href ='<?php echo base_url('index.php/distribusi') ?>';
						}else{
							alert('Gagal Menambahkan Data');
						}
					}
				})
			}

		}));
		$(document).on('change','.check',function()
		{
			var id_barang = $(this).data('id');
			if (this.checked) {
				$('.'+id_barang).removeAttr('disabled');
				$('.id_'+id_barang).val('1');
			}else{
				$('.'+id_barang).attr('disabled','disabled');
				$('.id_'+id_barang).val('0');
			}
		})
	})
</script>