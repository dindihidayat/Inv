<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datang_model extends CI_Model {

	function data($number,$offset){
		$this->db->group_by('tgl_datang');
		return $query = $this->db->get('tb_datang',$number,$offset);		
	}
	function jumlah_data(){
		return $this->db->get('tb_datang')->num_rows();
	}
	function get_mstbarang()
	{
		return $this->db->get('mst_barang');
	}
	function get_pengajuan($tanggal)
	{
		$this->db->select('mst_barang.nama,mst_barang.kodebarang,quantity,tb_pengajuan.*');
		$this->db->where('DATE(tgl_pengajuan)', $tanggal);
		$this->db->join('mst_barang', 'mst_barang.id_barang = tb_pengajuan.id_barang', 'right');
		return $this->db->get('tb_pengajuan');
	}

	function info($tanggal)
	{
		$this->db->where('tgl_datang', $tanggal);
		$this->db->join('mst_barang mb', 'mb.id_barang = td.id_barang', 'left');
		$this->db->group_by('mb.id_barang');
		return $this->db->get('tb_datang td');
	}
	function getedit($tanggal)
	{
		$this->db->select('td.*,td.id_barang as barang_id,mb.*');
		$this->db->where('tgl_datang', $tanggal);
		$this->db->join('mst_barang mb', 'mb.id_barang = td.id_barang', 'left');
		return $this->db->get('tb_datang td');
	}
	function insert($update,$insert)
	{
		$this->db->trans_begin();
		$this->db->update_batch('mst_barang', $update,'id_barang');
		$this->db->insert_batch('tb_datang', $insert);
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