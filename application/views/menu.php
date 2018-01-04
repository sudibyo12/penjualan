<?php /*if(isset($_GET['page'])){
	   $page=$_GET['page'];
   }else {
	   $page='home';
   }
   $level=$_SESSION['level'];*/
?>
<div class="container" style="background-color:cyan;" >
  <ul class="nav nav-tabs">
      <li> <!--active menunjukan menu yang sedang aktif -->
	  <a href="<?php print site_url() ?>">Home</a></li>
	  <li class="dropdown">
	  <a class="dropdown-toggle" data-toggle="dropdown"
	  href="#">File Master<span class="caret"></span></a>
	  <ul class="dropdown-menu">
	       <li><a href="#">Kategori</a></li>
		   <li><a href="<?php print site_url() ?>/inventori/barang">Data Barang</a></li><!--untuk menuju halaman data barang -->
		   <li><a href="<?php print site_url() ?>/inventori/barangpage">Barang</a></li><!--hyperlink menggunkan site_url sedangkan kalo src pake base_url-->
		   <li><a href="<?php print site_url() ?>/inventori/customer">Customer</a></li>
		   <li><a href="?page=supplier">Supplier</a></li>
	  </ul>
	  </li>	
	  <li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown"
	  href="#">Transaksi<span class="caret"></span></a>
	      <ul class="dropdown-menu">
		       <li><a href="#">Pembelian</a></li>
			   <li><a href="<?php print site_url() ?>/inventori/penjualan">Penjualan</a></li>
		  </ul>
	  </li>
	  <li><a href="#">Laporan</a></li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
	  href="#">Setting<span class="caret"></span></a>
	      <ul class="dropdown-menu">
		       <li><a href="setting.php">User Manager</a></li>
		   </ul>
		</li>
	  <li><a href="logout.php">Logout</a></li>
  </ul>
</div>