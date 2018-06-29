<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<h3>Info</h3>
		</div>
	</div>
<div class="card">
	<div class="col-md-12">
	<div class="row" style="padding:10px 10px 10px 10px">
		<div class="col-md-3 col-xs-12">
			<?php if (sizeof($data->result()) > 0): ?>
			<?php if (!empty($data->row()->gambar)): ?>
				<img src="<?php echo base_url('upload/gambar/'.$data->row()->gambar) ?>" style="width: 50%;height: 100%">
			<?php endif ?>
			<?php else: ?>
				TIdak ada data yang ditampilkan
			<?php endif ?>
		</div>
		<div class="col-md-6 col-xs-12">
			<?php if (sizeof($data->result()) > 0): ?>
			<h3><?php echo $data->row()->nama ?></h3>
			<h5 class="text-info">Sumber Dana(<?php echo $data->row()->sumber_dana ?>), Lokasi(<?php echo $data->row()->lokasi ?>)</h5>
			<h5 class="">Kode Barang <p><?php echo $data->row()->kodebarang ?></p></h5>
			<h5 class="">Harga <p>Rp.<?php echo number_format($data->row()->harga) ?></p></h5>
			<?php $f = array();foreach ($data->result() as $value): ?>
				<?php $f[] = $value->qty_distribusi ?>
			<?php endforeach ?>
			<?php $g = array_sum($f) ?>
			<h5 class="">Quantity <p><strong><?php echo $data->row()->qty_datang-$g ?></strong> dari <strong><?php echo $data->row()->qty_datang ?></strong></p></h5>
			<?php else: ?>
				Tidak Ada data yang ditampilkan
			<?php endif ?>
		</div>
	</div>
	<div class="row" style="padding:10px 10px 10px 10px">
		<div class="col-md-12">
           <ul class="nav nav-tabs" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link" href="#profile<?php if(sizeof($data->result()) > 0){echo $data->row()->id_barang;} ?>" role="tab" data-toggle="tab">Pengajuan</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#buzz<?php if(sizeof($data->result()) > 0){echo $data->row()->id_barang;} ?>" role="tab" data-toggle="tab">Data Datang Barang</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="#references<?php if(sizeof($data->result()) > 0){echo $data->row()->id_barang;} ?>" role="tab" data-toggle="tab">Data Distribusi</a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div role="tabpanel" class="tab-pane fade active" id="profile<?php if(sizeof($data->result()) > 0){echo $data->row()->id_barang;}  ?>">
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
			  			<?php if (sizeof($data->result()) > 0): ?>
			  				
			  			<tr>
			  				<td><?php echo $data->row()->tgl_pengajuan ?></td>
			  				<td><?php echo $data->row()->prog_kerja ?></td>
			  				<td><?php echo $data->row()->kegiatan ?></td>
			  				<td><?php echo $data->row()->pengajuan ?></td>
			  			</tr>
			  			<?php else: ?>
			  				<tr>
			  					<td class="text-center" colspan="4">Tidak ada data yang ditampilkan</td>
			  				</tr>
			  			<?php endif ?>
			  		</tbody>
			  	</table>
			  	</div>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="buzz<?php if(sizeof($data->result()) > 0){echo $data->row()->id_barang;} ?>">
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
						<?php if (sizeof($data->result()) > 0): ?>
							
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
						<?php else: ?>
							<tr>
								<td class="text-center" colspan="6">Tidak Ada data yang ditampilkan</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="references<?php if(sizeof($data->result()) > 0){echo $data->row()->id_barang;} ?>">
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
						<?php if (sizeof($data->result()) > 0): ?>
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
						<?php else: ?>
								<tr>
									<td class="text-center" colspan="4">Barang Belum Di Realisasikan</td>
								</tr>
						<?php endif ?>
					</tbody>
				</table>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="lokasi<?php if(sizeof($data->result()) > 0){echo $data->row()->id_barang;} ?>">
			  	Lokasi : <span class="text-info"><strong>Gudang DSTI</strong></span>	
			  </div>
			</div>
		</div>
	</div> 
	</div>
</div>
</div>