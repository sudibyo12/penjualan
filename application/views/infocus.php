<?php 

?>
<table class="table table-striped table-bordered">
	<tr><th>Alamat</th><th>Telp</th><th>Hutang</th></tr>
	<?php if (isset($cst)){ ?>
	<tr><td><?php print $cst->alamat  ?></td>
		<td><?php print $cst->telp  ?></td>
		<td><?php print number_format($cst->hutang)?></td>
	</tr>
	<?php } ?>
</table>