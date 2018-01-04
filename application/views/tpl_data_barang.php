
<?php //menampilkan data barang ?>
<div class="container">
<title>Master Barang</title>
<center><h1><?php print $judul; ?></h1></center>
<hr>
<center>
<span style="background-color: lavender ">
	
	<?php print anchor('inventori/addbrg','+Tambah Data'); ?>
</span></center>
<table class="table table-striped" border="1" align="center" style="background-color: powderblue">
	<thead><!--table head-->
		<tr>
			<th>No</th><th>ID Barang</th><th>Nama Barang</th><th>Kategori</th><th>Harga Beli</th><th>Harga Jual</th><th>Stok</th><th>Satuan</th><th>Aksi</th>
		</tr>
	</thead>
	<tbody><!-- table body -->
		<?php 
		//masukan/cetak data ke browser sesuai dengan nama tabel di db
			$nourut=0;
			foreach ($barang as $brs) {//setiap baris dari tabel dimasukan ke dalam brs
				?>
				<tr>
					<td><?php print ++$nourut; ?></td>
					<td><?php print $brs->idbrg; ?></td>
					<td><?php print $brs->nmbrg; ?></td>
					<td><?php print $brs->idkat; ?></td>
					<td align="right"><?php print number_format($brs->hbeli); ?></td>
					<td align="right"><?php print number_format($brs->hjual); ?></td>
					<td align="right"><?php print number_format($brs->stok); ?></td>
					<td><?php print $brs->satuan; ?></td>
					<td>
						<?php print anchor('inventori/editbrg/'. $brs->idbrg,'Edit')?> | 
						<?php print anchor('inventori/hapusbrg/'. $brs->idbrg,'Hapus',
						array('onclick'=>"return confirm('Yaqin ora??')"))?></td><!--cara membuat uri pada tpl_brg-->
				</tr>

				<?php } ?>
		
	</tbody>
</table>
</div>
