<div class="container-fluid">
	<div class="col-md-12">
		
		<h3>Distribusi <a href="<?php echo base_url('index.php/distribusi/tambah') ?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Tambah Baru</a></h3>
	<div class="card">

			<table class="table table-hover table-outline table-vcenter text-nowrap card-table">
				<thead>
					<tr>
						<th>Tanggal BAST-U</th>
						<th>No BAST-U</th>
						<th>Penerima Barang</th>
						<th>Act</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($barang->num_rows() > 0): ?>
						<?php foreach ($barang->result() as $key): ?>
							<tr>
								<td><?php echo mediumdate_indo(substr($key->tgl_bast_u, 0,10)) ?></td>
								<td><?php echo $key->no_bast_u ?></td>
								<td><?php echo $key->penerima ?></td>
								<td>
								<div class="item-action dropdown">
			                      <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
			                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(15px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
			                        <a href="<?php echo base_url('index.php/distribusi/info?no_bast_u='.$key->no_bast_u) ?>" class="dropdown-item text-info"><i class="dropdown-icon fe fe-info text-info"></i> Info </a>
			                        <a href="<?php echo base_url('index.php/distribusi/edit?tanggal='.$key->tgl_bast_u) ?>" class="dropdown-item text-warning"><i class="dropdown-icon fe fe-edit-2 text-warning"></i> Edit </a>
			                        <a href="<?php echo base_url('index.php/') ?>" class="dropdown-item text-danger"><i class="dropdown-icon fe fe-trash text-danger"></i> Hapus</a>
			                        <div class="dropdown-divider"></div>
			                        <a href="<?php echo base_url('index.php/distribusi/generate_word?no_bast_u='.$key->no_bast_u) ?>" class="dropdown-item text-primary"><i class="dropdown-icon fa fa-file-word-o text-primary"></i>Doc</a>
			                        <a href="<?php echo base_url('index.php/generate_pdf?no_bast_u='.$key->no_bast_u) ?>" class="dropdown-item text-primary"><i class="dropdown-icon fa fa-file-pdf-o text-primary"></i> Pdf</a>

			                        <!-- <div class="dropdown-divider"></div>
			                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a> -->
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