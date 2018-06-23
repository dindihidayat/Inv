<?php         header("Content-type: application/pdf");
        header("Content-Disposition: attachment;Filename=bast3.pdf"); ?>
<center><p><strong><u>Berita Acara Serah Terima Barang</u></strong></p></center>
<p>Nomor :<?php echo $barang->row()->no_bast_u ?></p>
<p>Pada hari ini, <?php echo date('Y m d') ?>, kami yang bertanda tangan dibawah ini :</p>
<table width="0">
<tbody>
<tr>
<td rowspan="3" width="24">
<p>I.</p>
</td>
<td width="66">
<p>Nama</p>
</td>
<td width="196">
<p>: </p>
</td>
</tr>
<tr>
<td width="66">
<p>Pangkat</p>
</td>
<td width="196">
<p>: </p>
</td>
</tr>
<tr>
<td width="66">
<p>Jabatan</p>
</td>
<td width="196">
<p>: </p>
</td>
</tr>
</tbody>
</table>
<p>Dalam surat serah terima barang ini bertindah untuk dan atas nama  _________   yang mana selanjutnya disebut PIHAK PERTAMA.</p>
<table width="0">
<tbody>
<tr>
<td rowspan="3" width="29">
<p>II.</p>
</td>
<td width="66">
<p>Nama</p>
</td>
<td width="190">
<p>: </p>
</td>
</tr>
<tr>
<td width="66">
<p>Pangkat</p>
</td>
<td width="190">
<p>: </p>
</td>
</tr>
<tr>
<td width="66">
<p>Jabatan</p>
</td>
<td width="190">
<p>: </p>
</td>
</tr>
</tbody>
</table>
<p>Dalam hal ini bertindak untuk dan atas nama pihak _________ serta pengaturan barang ke luar dan masuk yang mana selanjutnya akan disebut sebagai PIHAK KEDUA.</p>
<p>Saat ini telah melakukan serah terima barang dari PIHAK PERTAMA kepada PIHAK KEDUA. PIHAK KEDUA telah menerima beberapa barang pasanan dari PIHAK PERTAMA sebagai berikut ini :</p>
<table border="1" >
	<thead>
		<tr>
			<th>Kodebarang</th>
			<th>Barang</th>
			<th>Spesifikasi</th>
			<th>Harga</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($barang->result() as $key): ?>
			<tr>
				<td><?php echo $key->kodebarang ?></td>
				<td><?php echo $key->nama ?></td>
				<td><?php echo $key->spesifikasi ?></td>
				<td><?php echo $key->harga ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<p>Demikian surat serah terima barang ini diperbuat oleh kedua belah pihak yang besangkutan, keterangan barang-barang tersebut adalah dalam kondisi baik. Setalah penandatangan surat serah terima barang ini, maka semua barang yang telah tertera diatas akan menjadi tanggung jawab dari PIHAK KEDUA. PIHAK KEDUA yang akan merawat /memelihara barang diatas denga baik serta akan digunakan untuk keperluan sesuai dengan kebutuhan.</p>
<table width="0">
<tbody>
<tr>
<td width="200">
<p>Yang Menyerahkan</p>
</td>
<td width="159">
<p>&nbsp;</p>
</td>
<td width="217">
<p>Yang Menerima</p>
</td>
</tr>
<tr>
<td width="200">
<p>PIHAK PERTAMA</p>
</td>
<td width="159">
<p>&nbsp;</p>
</td>
<td width="217">
<p>PIHAK KEDUA</p>
</td>
</tr>
<tr>
<td width="200">
<p>&nbsp;</p>
</td>
<td width="159">
<p>&nbsp;</p>
</td>
<td width="217">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="200">
<p>Saputro Nurul</p>
</td>
<td width="159">
<p>&nbsp;</p>
</td>
<td width="217">
<p>...</p>
</td>
</tr>
<tr>
<td width="200">
<p>Jabatan : </p>
<p>&nbsp;</p>
</td>
<td width="159">
<p>&nbsp;</p>
</td>
<td width="217">
<p>Jabatan : </p>
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>