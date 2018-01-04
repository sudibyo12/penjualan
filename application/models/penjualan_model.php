<?php
/**
* 
*/
class Penjualan_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

	}
	function get_cust()
	{
		$this->db->select('*');
		$result=array();
		$hasil=$this->db->get('customer');
		foreach ($hasil->result() as $row) {
			$result[0]="-- Pilih Customer --";
			$result[$row->idcust]=$row->nmcust;
		}
		return $result;
	}
	function get_cust_id($id)
	{
		$this->db->select('*');//select all
		$this->db->where('idcust',$id);//dimana idcust = id
		return $this->db->get('customer')->row();
	}
	function get_brg_id($idbrg)
	{
		$this->db->select('*');//select all
		$this->db->where('idbrg',$idbrg);//dimana idcust = id
		return $this->db->get('barang')->row();
	}
	function save_tmp_juald($tmpjuald)
	{
		$this->db->query("CREATE TABLE IF NOT EXISTS tmpjuald(idbrg varchar(5),nmbrg varchar(50),harga double,qty int,satuan varchar(15),jumlah double)");
		$this->db->insert('tmpjuald',$tmpjuald);

	}
	function get_tmp_juald()
	{
		return $this->db->get('tmpjuald')->result();
	}
	function savejual($jualan)
	{
		$this->db->insert('penjualan',$jualan);
		$id=$this->db->insert_id();
		return (isset($id)) ? $id: FALSE;
	}
	function gettmpjual()
	{
		return $this->db->get('tmpjuald')->result();
	}
	function savejualdetil($dtjualdetil)
	{
		$this->db->insert('penjualandetil',$dtjualdetil);
	}
	function deltmpjual()
	{
		$this->db->query('DROP TABLE tmpjuald');
	}
	function dt_faktur_jual($nfaktur)
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->where('penjualan.nofakturjual',$nfaktur);
		return $this->db->get()->row();
	}
	function get_jual_detil($nfaktur)
	{
		$this->db->select('*,nmbrg,kategori');
		$this->db->from('penjualandetil');
		$this->db->join('barang','penjualandetil.idbrg=barang.idbrg');
		$this->db->join('kategori','barang.idkat=kategori.idkat');
		$this->db->where('nofakturjual',$nfaktur);
		return $this->db->get()->result();
	}
}

?>