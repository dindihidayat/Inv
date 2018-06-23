<div class="container-fluid">
	<div class="row">
		<div class="con-md-12">
			<h3>Detail</h3>
		</div>
	</div>
	<div class="row">
		<div class="card">
			<div class="col-md-12">
				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th>#</th>
							<th>Kodebarang</th>
							<th>Barang</th>
							<th>Satuan</th>
							<th>Sumber Dana</th>
							<th>Harga</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($data->num_rows() > 0): ?>
							<?php $no = 1;foreach ($data->result() as $key): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $key->kodebarang ?></td>
									<td><?php echo $key->nama ?></td>
									<td><?php echo $key->satuan ?></td>
									<td><?php echo $key->sumber_dana ?></td>
									<td><?php echo $key->harga ?></td>
									<td>
										<button type="button" class="btn btn-success btn-sm" data-target="#modal<?php echo $key->id_barang ?>" data-toggle="modal">Lihat</button>
										<div class="modal fade" id="modal<?php echo $key->id_barang ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Detail</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
													</div>
													<div class="modal-body">
														<table class="table table-condensed table-striped">
															<thead>
																<tr>
																	<th>Pengajuan</th>
																	<th>Datang</th>
																</tr>
															</thead>
															<tbody>
																<?php $g = $this->lokasi_model->checkpengDat($key->id_barang); ?>
																<!-- <?php print_r($g) ?> -->
																<?php if (sizeof($g) > 0): ?>
																	<tr>
																		<td>
																			<?php if (count($g['pengajuan']) > 0): ?>
																				<?php echo mediumdate_indo(substr($g['pengajuan']->tgl_pengajuan, 0,10)) ?>
																			<?php else: ?>
																				Bukan Barang Pengajuan
																			<?php endif ?>
																		</td>
																		<td>
																			<?php if (count($g['datang']) > 0): ?>
																				<?php echo mediumdate_indo(substr($g['datang']->tgl_datang, 0,10)) ?>
																			<?php else: ?>
																				<?php if (count($g['pengajuan']) > 0): ?>
																					Barang Belum Datang
																				<?php else: ?>
																					Bukan Dari barang pengajuan
																				<?php endif ?>
																			<?php endif ?>
																			
																		</td>
																	</tr>
																<?php endif ?>
															</tbody>
														</table>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td colspan="7" class="text-center">Tidak Ada barang</td>
							</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>