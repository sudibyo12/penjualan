<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>No</td>
			<td>Id Barang</td>
			<td>Nama Barang</td>
			<td>Harga</td>
			<td>Qty</td>
			<td>Satuan</td>
			<td>Jumlah</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=0; $stotal=0; $gtotal=0; $pot=0; $pajak=0;
	foreach ($tmpjuald as $row) { ?>
		<tr><td><?php print ++$no ?></td>
			<td><?php print $row->idbrg; ?></td>
			<td><?php print $row->nmbrg; ?></td>
			<td><?php print number_format($row->harga); ?></td>
			<td><?php print $row->qty; ?></td>
			<td><?php print $row->satuan; ?></td>
			<td><?php print number_format($row->jumlah); ?></td>
			<td> Edit | Hapus </td>
		</tr>
	<?php 
		$stotal+=$row->jumlah;

	}//end of foreach
		$pajak=$stotal*0.1;
		$gtotal=$stotal+$pajak-$pot;
	?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="7">Sub Total</td>
			<td><input type="text" name="stotal" id="stotal" value="<?php print number_format($stotal)?>" readonly style="text-align: right"></td>
		</tr>
		<tr>
			<td colspan="7">Potongan</td>
			<td><input type="text" name="pot" id="pot" style="text-align: right"></td>
		</tr>
		<tr>
			<td colspan="7">Pajak</td>
			<td><input type="text" name="pajak" id="pajak" value="<?php print number_format($pajak)?>" style="text-align: right"></td>
		</tr>
		<tr>
			<td colspan="7">Grand Total</td>
			<td><input type="text" name="gtotal" id="gtotal" value="<?php print number_format($gtotal)?>" style="text-align: right"></td>
		</tr>
	</tfoot>
</table>
<script type="text/javascript">
	
	$('#pot').keyup(function () {
		this.value=$this.value.replace(/[^0-9.]/g,'');
		var stotal=$('#stotal').val();
		var pot=$('#pot').val();
		var pajak=0;
		var gtotal=0;
		var sttl=stotal.replace(",","");
			pajak=(sttl)*0.1;
			gtotal=parseInt(sttl)+parseFloat(pajak)-parseFloat(pot);
			$('#pajak').val(pajak);
			$('#gtotal').val(gtotal);


	})
</script>