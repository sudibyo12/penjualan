<div id="fakturjual">
<div class="container">
	<div class="row">
		<div class="col-md-12" align="center">
			TRANSAKSI PENJUALAN
		</div>

	</div>
	<form name="fjual" id="fjual">
	<div class="row">
		<div class="col-md-12">
				<table class="table table-striped table-bordered" id="example">
					<tr><td>No Faktur</td>
						<td><input type="text" name="nfaktur" maxlength="10" size="11" id="nfaktur"></td>
						<td>Tanggal</td>
						<td><input type="date" name="tglfaktur" id="tglfaktur" value="<?php print date('d-m-y');?>" ></td>
					</tr>
				</table>
			</div><!--akhir col-md-12 -->
	</div><!--akhir row -->
	<div class="row">
		<div class="col-md-2">
			<table class="table table-striped table-bordered" id="example">
					<tr><td>Customer</td></tr><!-- $customer di dapat dari inventori.php function penjualan-->
					<tr><td><?php print form_dropdown('idcust',$customer,'','id="idcust"') ?></td></tr>	
			</table>
		</div><!--akhir col-md-4 -->
					<div class="col-md-10">
						<div id="cusarea">
							<table class="table table-striped table-bordered">
								<tr><th>Alamat</th><th>Telp</th><th>Hutang</th></tr>
							</table>
						</div><!--akhir custarea -->
					</div><!-- akhir col-md-8 -->
	</div><!--akhir row -->
</form>
<form name="fjuald" id="fjualid">
	<div class="row">
		<div class="col-md-2">
			<table class="table table-striped table-bordered">
				<tr><td>Id Barang</td></tr>
				<tr><td><input type="text" id="idbrg"></td></tr>
			</table>
		</div>
		<div class="col-md-10">
			<div id="dtlbrgarea">
				<table class="table table-striped table-bordered">
					<tr><th>Nama Barang</th>
					<th width="25%">Harga</th>
					<th width="15%">Satuan</th>
					<th width="15%">QTY</th>
					<th width="15%">Aksi</th></tr>
					<tr><td>-</td><td>-</td><td>-</td>
						<td><input type="text" id="qty" name="qty" placeholder="Quantity" maxlength="5" size="6"></td>
						<td><input type="button" id="masuk" value="Masuk"></td>
					</tr>

				</table>
			</div><!-- Akhir dtlbrgarea -->
		</div><!--akhir col-md-8 -->
	</div>
</form>
<div class="row">
	<div class="col-md-12">
		<div id="juald">
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
				<tfoot>
					<tr>
						<td colspan="7">Sub Total</td>
						<td><input type="text" name="stotal" id="stotal"></td>
					</tr>
					<tr>
						<td colspan="7">Potongan</td>
						<td><input type="text" name="pot" id="pot"></td>
					</tr>
					<tr>
						<td colspan="7">Pajak</td>
						<td><input type="text" name="pajak" id="pajak"></td>
					</tr>
					<tr>
						<td colspan="7">Grand Total</td>
						<td><input type="text" name="gtotal" id="gtotal"></td>
					</tr>
				</tfoot>
				
			</table>

		</div><!-- akhir juald -->
		<center><button type="button" id="simpan">Simpan</button></center>
	</div><!-- akhir col -->
</div><!-- akhir row -->
</div><!--akhir container -->
</div><!--batas id fakturpenjualan-->
<!--area javascript -->
		<script type="text/javascript">
			/*Info Customer*/
			$("#idcust").change(function() {//#idcust adalah nama id
				/* Act on the event */
				var idcst={idcst:$("#idcust").val()}
				$.ajax({
					type: "POST",
					url: "<?php print site_url('inventori/infocus')?>",
					data: idcst,//wadah untuk mengirim idcust dari DB
					success: function(msg){
						$('#cusarea').html(msg);//jika berhasil taro di custarea
					}
				});
			});
			//info barang

			/*$('#idbrg').change(function() {
				
				var idbrg={idbrg:$("#idbrg").val()}
					$.ajax({
					type: "POST",
					url: "<?php //print site_url('inventori/infobrg') ?>",
					data: idbrg,
					success: function(msg){
					$('#dtlbrgarea').html(msg);
				}
				});
			});*/
			$('#masuk').click(function () {
				var midbrg=$("#idbrg").val();
				if (midbrg!=""){

				var idbrg={idbrg:$('#idbrg').val(),qty:$('#qty').val()}
				$.ajax({
					type:"POST",
					url:"<?php print site_url('inventori/tmpjuald') ?>",
					data:idbrg,
					success: function(msg){
						$('#juald').html(msg);
					}
				});
			}//end of if
			else{
				alert('Id Barang tidak boleh kosong');
			}
			});
			//button simpan untuk mengumpulkan data dari form untuk disimpan pada tabel penjualan
			$('#simpan').click(function () {
				var data={nfaktur:$('#nfaktur').val(),tglfaktur:$('#tglfaktur').val(),idcust:$('#idcust').val(),stotal:$('#stotal').val(),pot:$('#pot').val(),pajak:$('#pajak').val(),gtotal:$('#gtotal').val()}
				var nfkt=$('#nfaktur').val();
				$.ajax({
				type:"POST",
					url:"<?php print site_url('inventori/savejual') ?>",
					data:data,
					success: function(msg){
						$('#fakturjual').html(msg);
						//alert('Transaksi Sukses');

						//location.reload(true);
						//window.open("<?php print site_url('inventori/penjualan'); ?>");win.focus();
						//$('#juald').html(msg);
					}
				});
				});
		</script>