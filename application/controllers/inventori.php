<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Inventori extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));//memanggil form dan url, fungsinya untuk mengolah form
		$this->load->model(array('brg_model','penjualan_model'));//membuat model untuk mengolah data barang dari db
		$this->load->model('cus_model');
		$this->load->library('pagination');

	}
	function index()
	{
		$data['judul']="Sistem Informasi Inventori";
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('home',$data);

		//print "<center><h1>SELAMAT DATANG</h1></center>";
		$this->load->view('footer',$data);

	}
	function barang()
	{
		$data['judul']="Master Data Barang";//untuk mengirim data ke view
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$data['barang']=$this->brg_model->getdata();//fungsi di class model(akan diisi dengan data barang oleh model)
		$this->load->view('tpl_data_barang',$data);
		$this->load->view('footer',$data);
	}
	function barangpage()
	{
		//panggil library pagination
		$page=$this->uri->segment(3);
		if (!$page) { $offset=0; }else{
			$offset=$page;}
		$limit=2;
		$data['hal']=$page;
		$config['total_rows']=$this->brg_model->count_brg();//menghitung berapa jumlah dan di buat dalam brg_model
		$config['per_page']=$limit;
		$config['uri_segment']=3;
		$config['base_url']=site_url().'/inventori/barangpage';
		$config['first_page']='Awal';
		$config['last_page']='Akhir';
		$config['next_page']='Maju';
		$config['prev_page']='Mundur';
		
		//$data['page']=$page;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
		$data['judul']="Master Data Barang";//untuk mengirim data ke view
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$data['barang']=$this->brg_model->get_data_brg($offset,$limit)->result();//dimulai dari baris ke berapa sampai berapa
		$this->load->view('tpl_barang_page',$data);
		$this->load->view('footer',$data);
	}
	function customer()
	{
		$data['judul']="Data Customer";//untuk mengirim data ke view
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$data['customer']=$this->cus_model->getdata();//fungsi di class model(akan diisi dengan data barang oleh model)
		$this->load->view('tpl_data_customer',$data);
		$this->load->view('footer',$data);
	}
	function hapusbrg()
	{
		//mengambil data dari uri
		$idbrg=$this->uri->segment(3);//variable idbrg diisi oleh uri segmrnt 3 yaitu b001
		$execute=$this->brg_model->del_brg($idbrg);
		redirect('inventori/barang');
	}
	function editbrg()
	{
		$data['judul']="Edit Data Barang";
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$data['idbrg']=$this->uri->segment(3);
		$data['kategori']=$this->brg_model->get_kategori();
		$data['dtbrg']=$this->brg_model->get_data_id($data['idbrg'])->row();//kalo row ngambil data dapat satu
		$this->load->view('v_edit_brg',$data);
		$this->load->view('footer',$data);

	}
	function updatebrg()
	{
		//menangkap  data - data kiriman dari form
		$idbrg=$this->input->post('idbrg');
		$nmbrg=$this->input->post('nmbrg');
		$idkat=$this->input->post('idkat');
		$hbeli=$this->input->post('hbeli');
		$hjual=$this->input->post('hjual');
		$stok=$this->input->post('stok');
		$satuan=$this->input->post('satuan');
		//masukan data di atas ke dalam array sesuai dengan nama tabel yang tersedia
		$dbarang=array('idbrg'=>$idbrg,'nmbrg'=>$nmbrg,'idkat'=>$idkat,'hbeli'=>$hbeli,'hjual'=>$hjual,
			'stok'=>$stok,'satuan'=>$satuan);
		$id=$this->brg_model->updatebrg($idbrg,$dbarang);//kirim function ke updatebrg berdasarkan data yang dipanggil
		if ($id) {
			$pesan="Data telah diubah";
			redirect('inventori/barang/'.$pesan);
		}else{
			$pesan="Ada kesalahan Update data";
			redirect('inventori/barang/'.$pesan);
		}
	}
	function addbrg()
	{
		$data['judul']="Input Data Barang";
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$data['kategori']=$this->brg_model->get_kategori();
		$this->load->view('input_barang',$data);
		$this->load->view('footer',$data);

	}//end off addbrg
	function savebrg()
	{
		# code...
		$idbrg=$this->input->post('idbrg');
		$nmbrg=$this->input->post('nmbrg');
		$idkat=$this->input->post('idkat');
		$hbeli=$this->input->post('hbeli');
		$hjual=$this->input->post('hjual');
		$stok=$this->input->post('stok');
		$satuan=$this->input->post('satuan');
		//masukan data di atas ke dalam array sesuai dengan nama tabel yang tersedia
		$dbarang=array('idbrg'=>$idbrg,'nmbrg'=>$nmbrg,'idkat'=>$idkat,'hbeli'=>$hbeli,'hjual'=>$hjual,
			'stok'=>$stok,'satuan'=>$satuan);
		$id=$this->brg_model->savebrg($dbarang);
		if ($id) {
			$pesan="Data telah disimpan";

		}else{
			$pesan="Ada kesalahan Proses";

		}//end of if
		redirect('inventori/barang/'.$pesan);
	}//end of savebrg
	function penjualan()
	{
		$data['judul']="Transaksi Penjualan Barang";
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$data['customer']=$this->penjualan_model->get_cust();//butuh data yang ada di DB customer
		$this->load->view('penjualan',$data);//menampilkan data yang dipanggil
		$this->load->view('footer',$data);

	}//end of penjualan
	function infocus()
	{
		$idcust=$this->input->post('idcst');//untuk mengambil data dari form menggunakan input dan menampung
		$data['cst']=$this->penjualan_model->get_cust_id($idcust);//dolar hanya berlaku di tempatnya saja,tidak berlaku di tempat lain
		$this->load->view('infocus',$data);
	}
	function infobrg()
	{
		$idbrg=$this->input->post('idbrg');//untuk mengambil data dari form menggunakan input dan menampung
		$data['brg']=$this->penjualan_model->get_brg_id($idbrg);//dolar hanya berlaku di tempatnya saja,tidak berlaku di tempat lain
		$this->load->view('infobrg',$data);
	}
	function tmpjuald()
	{
		$idbrg=$this->input->post('idbrg');
		$qty=$this->input->post('qty');//qty mengambil dari form yang di ketik
		$juald=$this->penjualan_model->get_brg_id($idbrg);
		$nmbrg=$juald->nmbrg;
		$harga=$juald->hjual;
		$satuan=$juald->satuan;
		$jumlah=$qty*$harga;
		$tmpjuald=array('idbrg'=>$idbrg,'nmbrg'=>$nmbrg,'harga'=>$harga,'satuan'=>$satuan,'qty'=>$qty,'jumlah'=>$jumlah);
		$this->penjualan_model->save_tmp_juald($tmpjuald);
		$data['tmpjuald']=$this->penjualan_model->get_tmp_juald();
		$this->load->view('tmpjuald',$data);
	}
	function savejual()
	{
		//kumpulin data-data dari form
		$nfaktur=$this->input->post('nfaktur');
		$tglfaktur=$this->input->post('tglfaktur');
		$idcust=$this->input->post('idcust');
		$stotal=$this->input->post('stotal');
		$pot=$this->input->post('pot');
		$pajak=$this->input->post('pajak');
		$gtotal=$this->input->post('gtotal');
		$jualan=array('nofakturjual'=>$nfaktur, 'tgljual'=>$tglfaktur, 'idcust'=>$idcust, 'stotal'=>$stotal, 'potongan'=>$pot, 'pajak'=>$pajak, 'gtotal'=>$gtotal);
		$dttmpjual=$this->penjualan_model->gettmpjual();//ambil data
		$id=$this->penjualan_model->savejual($jualan);//menyimpan data
		//if ($id) {
			foreach ($dttmpjual as $brs) {
				$dtjualdetil=array('nofakturjual'=>$nfaktur, 'idbrg'=>$brs->idbrg, 'harga'=>$brs->harga, 'qty'=>$brs->qty);
				$this->penjualan_model->savejualdetil($dtjualdetil);
			}
			$this->penjualan_model->deltmpjual();
			$data['fjual']=$this->penjualan_model->dt_faktur_jual($nfaktur);
			$data['cust']=$this->penjualan_model->get_cust_id($idcust);
			$data['jdetil']=$this->penjualan_model->get_jual_detil($nfaktur);
			$this->load->view('fakturpenjualan',$data);
			//print "testttt";
		//}
	}
}//end of class