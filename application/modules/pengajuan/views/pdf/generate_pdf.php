<style type="text/css" media="screen">
	.header #img {
	  float: left;
	  width: 100px;
	  height: 100px;

	}

	.header h2  {
	  position: relative;

	  left: 100px;

	}
	table{
		border-collapse: collapse;
	}
</style>
<div class="header">
  <img id="img" src="assets/images/itb.png" alt="logo" />
  <h2>INSTITUTE TEKNOLOGI BANDUNG</h2>
  <h3 style="position: relative;left:225px">Pengadaan Barang</h3>
</div>
<hr style="border:1px solid black">
<table style="width: 100%;" border="1" cellpadding="1">
<tbody>
<tr>
	<th>#</th>
	<th>KodeBarang</th>
	<th>Barang</th>
	<th>Satuan</th>
	<th>Lokasi</th>
	<th>Quantity</th>
	<th>Harga Satuan</th>
	<th>Sumber Dana</th>
	<th>Spesifikasi</th>
	<th>Gambar</th>
</tr>
<?php if ($data->num_rows() > 0): ?>
	<?php $no = 1;foreach ($data->result() as $key): ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $key->kodebarang ?></td>
			<td><?php echo $key->nama ?></td>
			<td><?php echo $key->satuan ?></td>
			<td>Gudang</td>
			<td><?php echo $key->harga ?></td>
			<td><?php echo $key->quantity ?></td>
			<td><?php echo $key->sumber_dana ?></td>
			<td><?php echo $key->spesifikasi ?></td>
			<td><img src="upload/gambar/<?php echo $key->gambar ?>" style="width: 50px;height: 50px">
				
			</style></td>
		</tr>
	<?php endforeach ?>
<?php endif ?>
</tbody>
</table>
<!-- DivTable.com -->