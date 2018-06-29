<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h3>Info</h3>
		</div>
	</div>
<pre>
	<?php print_r($data->result()); ?>
</pre>
<div class="card">
	<div class="col-md-12">
		
	<div class="row" style="padding:10px 10px 10px 10px">
		<div class="col-md-3 col-xs-12">
			<img src="<?php echo base_url('upload/gambar/'.$data->row()->gambar) ?>" style="width: 50%;height: 100%">
		</div>
		<div class="col-md-6 col-xs-12">
			<h3><?php echo $data->row()->nama ?></h3>
			<h5 class="text-info">Sumber Dana(<?php echo $data->row()->sumber_dana ?>), Lokasi <button type="button" class="btn btn-sm btn-info">Lihat lokasi Barang</button></h5>
			<h5 class="text-muted">Kode Barang <p><?php echo $data->row()->kodebarang ?></p></h5>
			<h5 class="text-muted">Harga <p><?php echo $data->row()->harga ?></p></h5>
			<h5 class="text-muted">Quantity <p><?php echo $data->row()->qty_datang ?></p></h5>
		</div>
	</div>
	<div class="row" style="padding:10px 10px 10px 10px">
		<div class="col-md-12">
           <ul class="nav nav-tabs" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link" href="#profile<?php echo $data->row()->id_barang ?>" role="tab" data-toggle="tab">Pengajuan</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#buzz<?php echo $data->row()->id_barang ?>" role="tab" data-toggle="tab">Data Datang Barang</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#references<?php echo $data->row()->id_barang ?>" role="tab" data-toggle="tab">Data Distribusi</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div role="tabpanel" class="tab-pane fade active" id="profile<?php echo $data->row()->id_barang ?>">
			  	<div class="table-responsive">
			  	<table class="table table-condensed table-striped">
			  		<thead>
			  			<tr>
			  				<th>Tanggal Pengajuan</th>
			  				<th>Program Kerja</th>
			  				<th>Kegiatan</th>
			  				<th>Pengajuan</th>
			  			</tr>
			  		</thead>
			  		<tbody>
			  			<tr>
			  				<td><?php echo $data->row()->tgl_pengajuan ?></td>
			  				<td><?php echo $data->row()->prog_kerja ?></td>
			  				<td><?php echo $data->row()->kegiatan ?></td>
			  				<td><?php echo $data->row()->pengajuan ?></td>
			  			</tr>
			  		</tbody>
			  	</table>
			  	</div>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="buzz<?php echo $data->row()->id_barang ?>">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>Tanggal Datang</th>
							<th>Tanggal BST</th>
							<th>Tanggal Pengajuan</th>
							<th>No BST</th>
							<th>No PO</th>
							<th>PIC</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($data->row()->tgl_datang)): ?>
							
						<?php if ($data->num_rows() > 0): ?>
							<?php foreach ($data->result() as $key): ?>
								<tr>
									<td><?php echo $key->tgl_datang ?></td>
									<td><?php echo $key->tgl_bst ?></td>
									<td><?php echo $key->tgl_pengajuan ?></td>
									<td><?php echo $key->no_bst ?></td>
									<td><?php echo $key->no_po ?></td>
									<td><?php echo $key->pic ?></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
						<?php else: ?>
							<tr>
								<td class="text-center" colspan="6">Barang Belum Datang</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="references<?php echo $data->row()->id_barang ?>">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>Tanggal Distribusi</th>
							<th>No BAST</th>
							<th>Quantity yang didistribusikan</th>
							<th>Penerima</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($data->row()->qty_distribusi)): ?>
							<?php if ($data->num_rows() > 0): ?>
								<?php foreach ($data->result() as $key): ?>
									<tr>
										<td><?php echo $key->tgl_bast_u ?></td>
										<td><?php echo $key->no_bast_u ?></td>
										<td><?php echo $key->qty_distribusi ?></td>
										<td><?php echo $key->penerima ?></td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
							<?php else: ?>
								<tr>
									<td class="text-center" colspan="4">Barang Belum Di Realisasikan</td>
								</tr>
						<?php endif ?>
					</tbody>
				</table>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="lokasi<?php echo $data->row()->id_barang ?>">
			  	Lokasi : <span class="text-info"><strong>Gudang DSTI</strong></span>	
			  </div>
			</div>
		</div>
	</div> 
	</div>
</div>
</div>