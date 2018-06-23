<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata_model extends CI_Model {


	function data($number,$offset,$cari = '',$lokasi = '',$sumber_dana = ''){
		if (!empty($cari) || !empty($lokasi) || !empty($sumber_dana)) {
			$this->db->like('nama', $cari, 'BOTH');
			$this->db->like('sumber_dana', $sumber_dana, 'BOTH');
			$this->db->like('id_lokasi', $lokasi, 'BOTH');
			$query = $this->db->get('mst_barang',$number,$offset);
			// echo $this->db->last_query();
			return $query;		
		}else{
			$query = $this->db->get('mst_barang',$number,$offset);
			// echo $this->db->last_query();		
			return $query;
		}
	}
	function jumlah_data($cari,$lokasi,$sumber_dana){
		if (!empty($cari) || !empty($lokasi) || !empty($sumber_dana)) {
			$this->db->like('nama', $cari, 'BOTH');
			$this->db->like('sumber_dana', $sumber_dana, 'BOTH');
			$this->db->like('id_lokasi', $lokasi, 'BOTH');
			return $this->db->get('mst_barang')->num_rows();
		}else{
			return $this->db->get('mst_barang')->num_rows();
		}
	}
	function getlokasi()
	{
		return $this->db->get('lokasi');
	}
	function getsumberdana()
	{
		$this->db->group_by('sumber_dana');
		return $this->db->get('mst_barang');
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

	function insert($barang)
	{
		$this->db->trans_begin();
		$this->db->insert('mst_barang',$barang);
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

}

/* End of file Pengajuan_model.php */
/* Location: ./application/modules/pengajuan/models/Pengajuan_model.php */