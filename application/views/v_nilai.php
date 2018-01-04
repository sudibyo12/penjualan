<?php //menampilkan data barang ?>
<div class="container">
<title>Nilai Mahasiswa</title>
<center><h1><?php print $judul; ?></h1></center>
<hr>
<center>
<span style="background-color: lavender ">
	
	<?php print anchor('perkuliahan/addnilai','+Tambah Data'); ?>
</span></center>
<table class="table table-striped" border="1" align="center" style="background-color: powderblue">
	<thead><!--table head-->
		<tr>
			<th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Matakuliah</th><th>Nilai</th><th>Grade</th><th>Aksi</th>
		</tr>
	</thead>
	<tbody><!-- table body -->
		<?php 
		//masukan/cetak data ke browser sesuai dengan nama tabel di db
			$no_urut=0;
			foreach ($nilaidetil as $brs) {//setiap baris dari tabel dimasukan ke dalam brs
				?>
				<tr>
					<td><?php print ++$no_urut; ?></td>
					<td><?php print $brs->nim; ?></td>
					<td><?php print $brs->namamhs; ?></td>
					<td><?php print $brs->matakuliah; ?></td>
					<td><?php print $brs->nilaimhs; ?></td>
					<td><?php print $brs->grade; ?></td>
					<td>
						<?php print anchor('inventori/editbrg/'. $brs->idbrg,'Edit')?> | 
						<?php print anchor('inventori/hapusbrg/'. $brs->idbrg,'Hapus',
						array('onclick'=>"return confirm('Yaqin ora??')"))?></td><!--cara membuat uri pada tpl_brg-->
				</tr>

				<?php } ?>
		
	</tbody>
</table>
</div>
