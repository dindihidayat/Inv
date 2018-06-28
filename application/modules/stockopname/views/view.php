<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>Stockopname <a href="<?php echo base_url('index.php/stockopname/tambah') ?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Tambah Data Stockopname</a></h3>
		</div>
	</div>
	<div class="row">
		<div class="card">
			
		<div class="col-md-12">
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>Tanggal Stockopname</th>
						<th>Jumlah(Barang yang di Stockopname Pertanggal)</th>
						<th>Penganggung Jawab</th>
						<th>Act</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($opname->num_rows() > 0): ?>
						<?php foreach ($opname->result() as $key): ?>
							<tr>
								<td><?php echo mediumdate_indo($key->tglopname) ?></td>
								<td><?php echo $key->count ?></td>
								<td><?php echo $key->pic ?></td>
								<td>
								<div class="item-action dropdown">
		                      <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
		                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(15px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
		                        <a href="<?php echo base_url('index.php/stockopname/info/') ?>" class="dropdown-item btn btn-sm btn-info"><i class="dropdown-icon fe fe-info"></i> Info </a>
		                        <a href="<?php echo base_url('index.php/stockopname/edit/') ?>" class="dropdown-item text-warning"><i class="dropdown-icon fe fe-edit-2 text-warning"></i> Edit </a>
		                        <a href="javascript:;" data-id="<?php echo $key->tglopname ?>" class="dropdown-item text-danger hapus"><i class="dropdown-icon fe fe-trash text-danger"></i> Hapus</a>
		                      </div>
			                  </div>
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(function()
	{
		$(document).on('click','.hapus',function()
		{
			var kode = $(this).data('id');
			swal({
			  title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					url:"<?php echo base_url('index.php/stockopname/hapus/') ?>",
					data:{kode:kode},
					method:"POST",
					dataType:"JSON",
					success:function(data)
					{
						if (data.status == true) {
							swal({
								type:"success",
								title:"Berhasil Hapus Data",
								 showConfirmButton:false,
								timer:1500
							});
							location.href = "<?php echo base_url('index.php/stockopname') ?>";
						}else{
							swal({
								type:"error",
								title:"Gagal Menghapus Data",
								 showConfirmButton:false,
								timer:1500
							});
						}
					}
				});
			  }
			})
		})
	})
</script>