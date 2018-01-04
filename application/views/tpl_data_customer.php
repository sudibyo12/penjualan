<?php 
//menampilkan data barang ?>
<div class="container">
<title>Customer</title>
<center><h1><?php print $judul; ?></h1></center>
<hr>
<table class="table table-striped" border="1" align="center" style="background-color: yellow">
	<thead><!--table head-->
		<tr>
			<th>No</th><th>ID Customer</th><th>Nama Customer</th><th>Alamat</th><th>Telp</th><th>Foto</th><th>Hutang</th><th>Aksi</th>
		</tr>
	</thead>
	<tbody><!-- table body -->
		<?php 
		//masukan/cetak data ke browser sesuai dengan nama tabel di db
			$nourut=0;
			foreach ($customer as $brs) {//setiap baris dari tabel dimasukan ke dalam brs
				?>
				<tr>
					<td><?php print ++$nourut; ?></td>
					<td><?php print $brs->idcust; ?></td>
					<td><?php print $brs->nmcust; ?></td>
					<td><?php print $brs->alamat; ?></td>
					<td><?php print $brs->telp; ?></td>
					<td><?php print $brs->foto; ?></td>
					<td><?php print number_format($brs->hutang); ?></td>
					<td>EDIT | HAPUS</td>
				</tr>

				<?php } ?>
		
	</tbody>
</table>
</div>