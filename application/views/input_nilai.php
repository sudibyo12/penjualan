<center><?php print $judul ?></center>
<hr>
<?php print form_open('perkuliahan/savenilai'); ?>
<table align="center" style="background-color: lavender">
	<tr><td>Nama Mahasiswa</td>
		<td><?php print form_dropdown('nim',$nama); ?></td>

	</tr>
	<tr><td>Matakuliah</td>
		<td><?php print form_dropdown('kd_mk',$matakuliah); ?></td>
	</tr>
	<tr><td>Nilai</td>
		<td><?php print form_input('nilai'); ?></td>
	</tr>
	<tr><td>Grade</td>
		<td><?php print form_input('grade'); ?></td>
	</tr>
		
	<tr><td clospan="2"><?php print form_submit('simpan','Save') ?>
						<?php print form_submit('reset','Cencel') ?></td></tr>
</table>
</form>