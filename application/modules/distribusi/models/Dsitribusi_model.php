<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dsitribusi_model extends CI_Model {
	function getdata()
	{
		$this->db->group_by('no_bast_u');
		$this->db->order_by('tgl_bast_u', 'desc');
		return $this->db->get('distribusi');
	}
	function getbarang($tgl_nya = '',$type = '')
	{
		if ($tgl_nya !='' || $type !='') {
			if ($type == 'datang') {
				$this->db->select('mst.*,td.tgl_datang,td.no_bst');
				$this->db->where('DATE(tgl_datang)', $tgl_nya);
				$this->db->join('mst_barang mst', 'mst.id_barang = td.id_barang','right');
				$g = $this->db->get('tb_datang td');
				// echo $this->db->last_query();
				return $g;
			}elseif($type == 'pengajuan'){
				$this->db->select('mst.*,td.tgl_pengajuan,td.prog_kerja,kegiatan');
				$this->db->where('DATE(tgl_pengajuan)', $tgl_nya);
				$this->db->join('mst_barang mst', 'mst.id_barang = td.id_barang','right');
				$g = $this->db->get('tb_pengajuan td');
				// echo $this->db->last_query();
				return $g ;
			}
		}else{

			$g = $this->db->get('mst_barang');
			// echo $this->db->last_query();
			return $g;
		}
	}	
	function checkdistribusi($idbarang)
	{
		$this->db->select('sum(qty) as sum_qty');
		$this->db->where('id_barang', $idbarang);
		$this->db->group_by('id_barang');
		return $this->db->get('distribusi');

	}

	function info($nobast)
	{
		$this->db->where('no_bast_u', $nobast);
		$this->db->join('mst_barang mb', 'mb.id_barang = td.id_barang', 'left');
		return $this->db->get('distribusi td');
	}	

	function getedit($tanggal)
	{
		$this->db->select('ms.*,dis.*,dis.id_barang as idbarang');
		$this->db->where('tgl_bast_u', $tanggal);
		$this->db->join('mst_barang ms', 'ms.id_barang = dis.id_barang', 'left');
		return $this->db->get('distribusi dis');
	}
	function insert($tabel,$obj)
	{
		$this->db->trans_begin();
		$this->db->insert_batch($tabel, $obj);
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

}

/* End of file Dsitribusi_model.php */
/* Location: ./application/modules/distribusi/models/Dsitribusi_model.php */