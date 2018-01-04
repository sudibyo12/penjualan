
<table class="table table-striped table-bordered">
	<tr><th>Nama Barang</th>
		<th width="25%">Harga</th>
		<th width="15%">Satuan</th>
		<th width="15%">QTY</th>
		<th width="15%">Aksi</th>
	</tr>
	<?php if (isset($brg)){ ?>
	<tr><td><?php print $brg->nmbrg  ?></td>
		<td><?php print number_format($brg->hjual) ?></td>
		<td><?php print $brg->satuan  ?></td>
		<td><input type="text" id="qty" name="" placeholder="Quantity" maxlength="5" size="6"></td>
		<td><input type="button" id="masuk" value="Masuk"></td></tr>


	</tr>
		<?php } else { ?>
		<tr><td colspan="5" align="center"> Data Tidak Ada</td></tr>
		<?php } ?>
</table>