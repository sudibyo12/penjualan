<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
/**
* 
*/
class Nilai_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getnilai()
	{
		$this->db->select('*');
		return($this->db->get('nilaidetil')->result());
	}
	function get_nama()
	{
		$result=array();
		$this->db->select('*');
		$hasil=$this->db->get('mahasiswa');//$hasil isinya data dari db di tampung dulu
		foreach ($hasil->result() as $row) {
			$result[0]='--Pilih Mahasiswa--';//set kolom,apabila result ke 0 maka isinya pilih kategori
			$result[$row->nim]=$row->namamhs;
		}
		return $result;//dikirim ke yang panggil
	}
	function get_matakuliah()
	{
		$result=array();
		$this->db->select('*');
		$hasil=$this->db->get('matkul');//$hasil isinya data dari db di tampung dulu
		foreach ($hasil->result() as $row) {
			$result[0]='--Pilih Matakuliah--';//set kolom,apabila result ke 0 maka isinya pilih kategori
			$result[$row->kd_mk]=$row->matakuliah;
		}
		return $result;//dikirim ke yang panggil
	}
	function savenilai($dnilai)
	{
		$this->db->insert('nilaidetil',$dnilai);
		$id=$this->db->insert_id();
		return (isset($id)) ? $id: FALSE;
	}
}