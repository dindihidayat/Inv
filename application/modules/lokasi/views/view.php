<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>Manajemen Lokasi <button type="button" class="btn btn-sm btn-success pull-right" data-target="#modal-1" data-toggle="modal"><i class="fa fa-plus"></i>Tambah Baru</button></h3>
		</div>
	</div>
	<div class="card">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped table-condensed">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Kode</th>
								<th class="text-center">Nama Lokasi</th>
								<th class="text-center">Act</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($data->num_rows() > 0): ?>
								<?php $no = 1;foreach ($data->result() as $key): ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $key->kode ?></td>
										<td><?php echo $key->lokasi ?></td>
										<td class="text-center">
					                    <div class="item-action dropdown">
					                      <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
					                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(15px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
					                        <a href="<?php echo base_url('index.php/pengajuan/info/'.$key->id) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-info"></i> Info </a>
					                        <a href="<?php echo base_url('index.php/pengajuan/edit?tgl='.$key->id) ?>" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Edit </a>
					                        <a href="javascript:;" class="dropdown-item hapus" data-tanggal="<?php echo $key->id ?>"><i class="dropdown-icon fe fe-trash"></i> Hapus</a>
					                        <div class="dropdown-divider">
					                        	
					                        </div>
					                        <a href="<?php echo base_url('index.php/lokasi/detail/'.$key->id) ?>" class="dropdown-item lihat"><i class="dropdown-icon fe fe-grid"></i> Detail</a>
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
			<div class="col-md-12">
				<?php echo $this->pagination->create_links() ?>
			</div>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="sr-only">Close</span>
				</button>
				
			</div>
			<div class="modal-body">
			<form id="form">
				<div class="form-group">
					<label for="varchar">Kode Lokasi</label>
					<input type="text" name="name[kode]" class="form-control">
				</div>
				<div class="form-group">
					<label for="varchar">Nama Lokasi</label>
					<input type="text" name="name[lokasi]" class="form-control">
				</div>
			</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success save">Save</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(function()
	{
		$('.save').click(function()
		{
			$.ajax({
				url:"<?php echo base_url('index.php/lokasi/insert') ?>",
				data:$('#form').serialize(),
				method:"POST",
				dataType:"JSON",
				success:function(data)
				{
					if (data.status == true) {
						location.href="<?php echo base_url('index.php/lokasi') ?>";
					}else{
						swal({
							type:"warning",
							title:"Gagal Menambahkan Data",
							text:data.pesan,
							showConfirmButton:false,
							timer:1500
						})
					}
				}
			})
		})
	})
</script>