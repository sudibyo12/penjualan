<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
//khusus model barang, termasuk insert,delete,update
class Brg_model extends CI_Model
{//model mengambil data dari database
	
	function __construct()
	{
		parent::__construct();
	}
	function getdata(){//menggunakan active record untuk mrngambil data yang ada di tabel barang
		
		$this->db->select('*');
		return($this->db->get('barang')->result());//result() dapat di tulis di model, controller, atau tpl
	}
	function getdatabrg()//menggunakan query biasa
	{
		$result=$this->db->query("SELECT * barang");
		return $result;
	}
	function del_brg($idbrg)
	{
		$this->db->where('idbrg',$idbrg);
		$this->db->delete('barang');
	}
	function get_data_id($idbrg)
	{
		$this->db->select('*');
		$this->db->where('idbrg',$idbrg);
		return($this->db->get('barang'));
	}
	//fumhsi untuk mengisi dropdown/combo
	function get_kategori()
	{
		$result=array();
		$this->db->select('*');
		$hasil=$this->db->get('kategori');//$hasil isinya data dari db di tampung dulu
		foreach ($hasil->result() as $row) {
			$result[0]='--Pilih Kategori--';//set kolom,apabila result ke 0 maka isinya pilih kategori
			$result[$row->idkat]=$row->kategori;
		}
		return $result;//dikirim ke yang panggil
	}
	//bikin function update barang
	function updatebrg($idbrg,$dbarang)
	{
		$this->db->where('idbrg',$idbrg);
		$this->db->update('barang',$dbarang);
		return $id=TRUE;
	}
	function savebrg($dbarang)
	{
		$this->db->insert('barang',$dbarang);
		$id=$this->db->insert_id();
		return (isset($id)) ? $id: FALSE;
	}
	function count_brg()
	{
		$this->db->select('*');
		return $this->db->get('barang')->num_rows();
	}
	function get_data_brg($offset,$limit)
	{
		//cara membuat sql dan inner join dalam php/CI
		$hasil=$this->db->query('SELECT * ,kategori FROM barang INNER JOIN kategori 
			ON barang.idkat=kategori.idkat LIMIT '.$limit.' OFFSET '.$offset );//offset data ke berapa?? sedangkan limit batas jumlah
		return $hasil;
	}
	
}