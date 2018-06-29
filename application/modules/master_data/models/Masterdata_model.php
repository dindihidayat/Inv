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
	function getSatuan()
	{
		$this->db->order_by('satuan', 'asc');
		return $this->db->get('satuan');
	}
	function edit($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->get('mst_barang')->row();
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
	function update($id,$barang)
	{
		$this->db->trans_begin();
		$this->db->where('id_barang',$id);
		$this->db->update('mst_barang',$barang);
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

	function info($id)
	{
		$this->db->select('td.no_bst,tgl_bst,no_po,pic,tgl_datang,dis.tgl_bast_u,dis.no_bast_u,qty,dis.qty as qty_distribusi,dis.penerima,lokasi.lokasi,tb.prog_kerja,tb.kegiatan,tb.pengajuan,DATE(tb.tgl_pengajuan) as tgl_pengajuan,nama,gambar,sumber_dana,quantity,harga,kodebarang,qty_datang,td.id_barang');
		$this->db->where('tb.id_barang', $id);
		$this->db->join('tb_datang td', 'td.id_barang = tb.id_barang', 'left');
		$this->db->join('distribusi dis', 'dis.id_barang = tb.id_barang', 'left');
		$this->db->join('mst_barang ms', 'ms.id_barang = tb.id_barang', 'left');
		$this->db->join('lokasi', 'lokasi.id = ms.id_lokasi', 'left');
		return $this->db->get('tb_pengajuan tb');
	}

}

/* End of file Pengajuan_model.php */
/* Location: ./application/modules/pengajuan/models/Pengajuan_model.php */