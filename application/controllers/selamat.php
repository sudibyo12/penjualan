<?php

/**
* 
*/
if(! defined('BASEPATH'))
exit ('No deirect script access allowed');
class Selamat extends CI_Controller{// class controller
	private $nama;
	private $kelas;
	function __construct(){//otomatis pasti mikut ketika function dipanggil
		parent::__construct();//cuma memberi nilai
		$this->nama="Sudibyo";
	}
	function index()//function yang otomatis dipanggil jika tidak ada funtion yang di panggil class
	{
		$this->kelas="PBK Web Dev 5";//cuma memberi nilai
	print "Selamat Datang...I'm Happy kelas : ".$this->kelas." - ".$this->nama; ;//memanggil nilai
	}
	function cek()//manggil harus menggunakan slas/
	{
		print "Hasilnya bagus ".$this->nama." - ".$this->kelas; ;
	}
	function cekview(){
		$this->load->view('cekview');
	}
}