<center><?php print $judul ?></center>
<hr>
<?php print form_open('inventori/savebrg'); ?>
<table align="center" style="background-color: lavender">
	<tr><td>Id Barang</td>
		<td><?php print form_input('idbrg'); ?></td>

	</tr>
	<tr><td>Nama Barang</td>
		<td><?php print form_input('nmbrg'); ?></td>
	</tr>
	<tr><td>Kategori</td>
		<td><?php print form_dropdown('idkat',$kategori); ?></td></tr>
		<tr><td>Harga Beli</td>
		<td><?php print form_input('hbeli'); ?></td></tr>
		<tr><td>Harga Jual</td>
		<td><?php print form_input('hjual'); ?></td>
		<tr><td>Stok</td>
		<td><?php print form_input('stok'); ?></td></tr>
		<tr><td>Satuan</td>
		<td><?php print form_input('satuan'); ?></td>
	</tr>
	<tr><td clospan="2"><?php print form_submit('simpan','Save') ?>
						<?php print form_submit('reset','Cencel') ?></td></tr>
</table>
</form>