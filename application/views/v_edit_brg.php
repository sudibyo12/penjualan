<center><?php print $judul ?></center>
<hr>
<?php print form_open('inventori/updatebrg'); ?>
<table align="center" style="background-color: lavender">
	<tr><td>Id Barang</td>
		<td><?php print form_input('idbrg',$dtbrg->idbrg,'readonly'); ?></td>

	</tr>
	<tr><td>Nama Barang</td>
		<td><?php print form_input('nmbrg',$dtbrg->nmbrg); ?></td>
	</tr>
	<tr><td>Kategori</td>
		<td><?php print form_dropdown('idkat',$kategori,$dtbrg->idkat); ?></td></tr>
		<tr><td>Harga Beli</td>
		<td><?php print form_input('hbeli',$dtbrg->hbeli); ?></td></tr>
		<tr><td>Harga Jual</td>
		<td><?php print form_input('hjual',$dtbrg->hjual); ?></td>
		<tr><td>Stok</td>
		<td><?php print form_input('stok',$dtbrg->stok); ?></td></tr>
		<tr><td>Satuan</td>
		<td><?php print form_input('satuan',$dtbrg->satuan); ?></td>
	</tr>
	<tr><td clospan="2"><?php print form_submit('update','Update') ?>
						<?php print form_submit('reset','Cencel') ?></td></tr>
</table>
</form>