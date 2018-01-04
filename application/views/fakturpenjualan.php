<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<tr><th>No Faktur</th><td><?php print $fjual->nofakturjual; ?></td>
					<th>Tanggal Faktur</th><td><?php print $fjual->tgljual; ?></td>
				</tr>
				<tr><th>Customer</th><th>Alamat</th><th>Telp</th><th>Hutang</th></tr>
				<tr><td><?php print $cust->nmcust; ?></td><td><?php print $cust->alamat; ?></td><td><?php print $cust->telp; ?></td><td><?php print number_format($cust->hutang); ?></td></tr>
			</table>
		</div>
	</div>
	<div class="">
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>No</td>
						<td>Id Barang</td>
						<td>Nama Barang</td>
						<td>Kategori</td>
						<td>Harga</td>
						<td>Qty</td>
						<td>Satuan</td>
						<td>Jumlah</td>
					</tr>
				</thead>
				<tbody>
					<?php $nom=0;
					foreach ($jdetil as $row) { ?>
						<tr><td><?php print ++$nom; ?></td>
							<td><?php print $row->idbrg; ?></td>
							<td><?php print $row->nmbrg; ?></td>
							<td><?php print $row->kategori; ?></td>
							<td><?php print number_format($row->harga); ?></td>
							<td><?php print $row->qty; ?></td>
							<td><?php print $row->satuan; ?></td>
							<td><?php print number_format($row->qty*$row->harga); ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
