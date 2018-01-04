<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/
class Perkuliahan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('nilai_model'));
	}
	function nilai()
	{
		$data['judul']="Nilai Mahasiswa";
		$data['nilai']=$this->nilai_model->getnilai();
		$this->load->view('v_nilai',$data);
	}
	function addnilai()
	{
		$data['judul']="Input Nilai Mahasiswa";
		$data['nama']=$this->nilai_model->get_nama();
		$data['matakuliah']=$this->nilai_model->get_matakuliah();
		$this->load->view('input_nilai',$data);
	}
	function savenilai()
	{
		$nim=$this->input->post('nim');
		$namamhs=$this->input->post('namamhs');
		$matakuliah=$this->input->post('matakuliah');
		$nilaimhs=$this->input->post('nilaimhs');
		$grade=$this->input->post('grade');
		//masukan data di atas ke dalam array sesuai dengan nama tabel yang tersedia
		$dnilai=array('nim'=>$nim,'namamhs'=>$namamhs,'matakuliah'=>$matakuliah,'nilaimhs'=>$nilaimhs,'grade'=>$grade);
		$id=$this->nilai_model->savenilai($dnilai);
		if ($id) {
			$pesan="Data telah disimpan";

		}else{
			$pesan="Ada kesalahan Proses";

		}//end of if
		redirect('perkuliahan/v_nilai/'.$pesan);
	}
}