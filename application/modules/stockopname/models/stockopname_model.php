<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockopname_model extends CI_Model {

	function barang($number,$offset,$lokasi = '',$sumber_dana = ''){
		if (!empty($cari) || !empty($lokasi) || !empty($sumber_dana)) {
			$this->db->like('sumber_dana', $sumber_dana, 'BOTH');
			$this->db->like('id_lokasi', $lokasi, 'BOTH');
			$query = $this->db->get('mst_barang',$number,$offset);
			return $query;		
		}else{
			$query = $this->db->get('mst_barang',$number,$offset);		
			return $query;
		}
	}
	function jumlah_data_barang($lokasi,$sumber_dana){
		if (!empty($lokasi) || !empty($sumber_dana)) {
			$this->db->like('sumber_dana', $sumber_dana, 'BOTH');
			$this->db->like('id_lokasi', $lokasi, 'BOTH');
			return $this->db->get('mst_barang')->num_rows();
		}else{
			return $this->db->get('mst_barang')->num_rows();
		}
	}
	function checkopname($kodebarang)
	{
		$this->db->select('max(tglopname) as opnamemax,tglopname');
		$this->db->where('kodebarang', $kodebarang);
		return $this->db->get('hasilstokopname');
	}
	function dataopname()
	{
		$this->db->select('h.*,count(h.tglopname) as count');
		$this->db->group_by('tglopname');
		$this->db->order_by('tglopname', 'desc');
		return $this->db->get('hasilstokopname h');
	}
	function getlokasi()
	{
		return $this->db->get('lokasi');
	}
	function getsumberdana()
	{
		$this->db->select('sumber_dana');
		$this->db->from('mst_barang');
		$this->db->group_by('sumber_dana');
		$this->db->order_by('sumber_dana', 'asc');
		return $this->db->get();
	}
	function kode()   {
		$this->db->select('RIGHT(mst_barang.id_barang,4) as kode', FALSE);
		$this->db->order_by('id_barang','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('mst_barang');    
		if($query->num_rows() <> 0){      
    
		$data = $query->row();      
		$kode = intval($data->kode) + 1;    
		}
		else {      
		$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = mt_rand(10,100).$kodemax; 
		return $kodejadi;  
	}
	function insert($tabel,$object = array())
	{
		$this->db->trans_begin();
		return $this->db->insert_batch($tabel, $object);
		if (!$this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	function hapus($id)
	{
		$this->db->trans_start();
		$this->db->where('tglopname', $id);
		$this->db->delete('hasilstokopname');
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}
}

/* End of file stockopname_model.php */
/* Location: ./application/modules/stockopname/models/stockopname_model.php */