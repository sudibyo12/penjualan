<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Cus_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getdata(){//menggunakan active record untuk mrngambil data yang ada di tabel barang
		
		$this->db->select('*');
		return($this->db->get('customer')->result());//result() dapat di tulis di model, controller, atau tpl
	}
	function getdatacus()
	{
		$this->db->select('*');
		//$this->db->select('idcust,nmcust') untuk menampikan beberP data
		return($this->db->get('customer')->result());
	}
}