<!DOCTYPE html>
<html>
<head>
	<title><?php print $judul; ?></title>
	<!-- link ke bootstrap CSS -->
	<link rel="stylesheet" 
	href="<?php print base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url() ?>assets/font-awesome/css/font-awesome.min.css">
	
	<!-- Panggil JQUERY -->
	<script type="text/javascript" src="<?php print base_url() ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php print base_url() ?>assets/js/bootstrap.min.js"></script>	
	
	<!-- date picker -->
	<script type="text/javascript" src="<?php print base_url() ?>assets/datepicker/jquery-ui.js"></script>
	<link rel="stylesheet" href="<?php print base_url() ?>assets/datepicker/jquery-ui.css"/>

	<script>
		$(document).ready(function(){			
			$("#tglFak").datepicker({
				dateFormat:'dd-mm-yyyy'
			});
		});
	</script>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-3" style="background-color: lavender;">
					<img src="<?php print base_url() ?>assets/logo1.jpg" width="276px" height="75px">
				</div>
				<div class="col-md-6" style="background-color: lavender;text-align:center;
				font-size:38px;padding:10px">Sistem Informasi Inventori
			</div>	
			<div class="col-md-3" style="background-color: lavender;padding-left:0px">
				<img src="<?php print base_url() ?>assets/logo3.jpg" width="292px" height="75px">
			</div>	
		</div>
	</div>
</header>

