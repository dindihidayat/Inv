<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_model extends CI_Model {

	function data($limit = 10,$offset = 0,$cari = '')
	{
		if (!empty($cari)) {
			$this->db->where('lokasi', $cari);
		}
		return $this->db->get('lokasi', $limit, $offset);
	}
	function jumlah($cari = array()){
		if (!empty($cari)) {
			$this->db->where('lokasi', $cari);
		}
		return $this->db->get('lokasi')->num_rows();
	}
	function detail($id)
	{
		$this->db->select('mst_barang.*,lokasi.lokasi,lokasi.kode');
		$this->db->where('mst_barang.id_lokasi', $id);
		$this->db->join('lokasi', 'lokasi.id = mst_barang.id_barang', 'left');
		return $this->db->get('mst_barang');
	}
	function checkpengDat($id_barang)
	{
		$this->db->where('id_barang', $id_barang);
		$g = $this->db->get('tb_pengajuan')->row();
		$this->db->where('id_barang', $id_barang);
		$f = $this->db->get('tb_datang')->row();

		return array('pengajuan'=>$g,'datang'=>$f);

	}
	function insert($tabel,$data)
	{
		$this->db->trans_start();
		$this->db->insert($tabel, $data);
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}
}

/* End of file lokasi_model.php */
/* Location: ./application/modules/lokasi/models/lokasi_model.php */