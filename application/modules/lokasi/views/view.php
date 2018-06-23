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
								<th class="text-center">Kode</th>
								<th class="text-center">Nama Lokasi</th>
								<th class="text-center">Act</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>GDG-01</td>
								<td>Gudang 01</td>
								<td class="text-center">
									<button type="button" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i></button>
									<button type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
									<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah -->
		<div class="modal fade" id="modal-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Modal</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<!-- <span aria-hidden="true">&times;</span> -->
							<span class="sr-only">Close</span>
						</button>
						
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="varchar">Kode Lokasi</label>
							<input type="text" name="name[kode]" class="form-control">
						</div>
						<div class="form-group">
							<label for="varchar">Nama Lokasi</label>
							<input type="text" name="name[name]" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success">Save</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->