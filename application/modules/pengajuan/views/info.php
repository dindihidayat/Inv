<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-condensed" style="background: white">
				<thead>
					<tr>
						<th class="text-center">Tanggal Pengajuan</th>
						<th class="text-center">Kegiatan</th>
						<th class="text-center">Program kerja</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center"><?php echo longdate_indo(substr($data->row()->tgl_pengajuan, 0,10)) ?></td>
						<td class="text-center"><?php echo $data->row()->kegiatan ?></td>
						<td class="text-center"><?php echo $data->row()->prog_kerja ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php if ($data->num_rows() > 0): ?>
			<?php foreach ($data->result() as $key): ?>
			<div class="col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $key->nama ?></h3>
                    <div class="card-options">
                      <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                      <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                  </div>
                  <div class="card-body">
	                   <ul class="nav nav-tabs" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link" href="#profile<?php echo $key->id_barang ?>" role="tab" data-toggle="tab">Detail Barang</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="#buzz<?php echo $key->id_barang ?>" role="tab" data-toggle="tab">Spesifikasi</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="#references<?php echo $key->id_barang ?>" role="tab" data-toggle="tab">Gambar</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="#lokasi<?php echo $key->id_barang ?>" role="tab" data-toggle="tab">Lokasi</a>
						  </li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
						  <div role="tabpanel" class="tab-pane fade active" id="profile<?php echo $key->id_barang ?>">
						  	<div class="table-responsive">
						  	<table class="table table-condensed table-striped">
						  		<thead>
						  			<tr>
						  				<th>Kode</th>
						  				<th>Barang</th>
						  				<th>Satuan</th>
						  				<th>Sumber Dana</th>
						  				<th>Volume</th>
						  				<th>Harga</th>
						  			</tr>
						  		</thead>
						  		<tbody>
						  			<tr>
						  				<td><?php echo $key->kodebarang ?></td>
						  				<td><?php echo $key->nama ?></td>
						  				<td><?php echo $key->satuan ?></td>
						  				<td><?php echo $key->sumber_dana?></td>
						  				<td><?php echo $key->qty_sum?></td>
						  				<td><?php echo $key->harga?></td>
						  			</tr>
						  		</tbody>
						  	</table>
						  	</div>
						  </div>
						  <div role="tabpanel" class="tab-pane fade" id="buzz<?php echo $key->id_barang ?>"><?php echo $key->spesifikasi ?></div>
						  <div role="tabpanel" class="tab-pane fade" id="references<?php echo $key->id_barang ?>"><img src="<?php echo base_url('upload/gambar/'.$key->gambar) ?>" alt="Gambar"></div>
						  <div role="tabpanel" class="tab-pane fade" id="lokasi<?php echo $key->id_barang ?>">
						  	Lokasi : <span class="text-info"><strong>Gudang DSTI</strong></span>	
						  </div>
						</div>
                  </div>
                  <div class="card-footer">
                    Penanggung Jawab Barang : <span class="text-info"><strong><?php echo $key->pengajuan ?></strong></span>
                  </div>
                </div>
              </div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>