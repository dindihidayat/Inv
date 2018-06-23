<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {

	function data($number,$offset,$tahun = ''){
		$this->db->select('tb_pengajuan.*,mst_barang.*,count(tb_pengajuan.id_barang) as count');
		$this->db->join('mst_barang', 'mst_barang.id_barang = tb_pengajuan.id_barang');
		if (!empty($tahun)) {
			$this->db->where('YEAR(tgl_pengajuan)', $tahun);
		}
		$this->db->group_by('DATE(tgl_pengajuan)');
		$this->db->order_by('mst_barang.id_barang', 'ASC');
		return $query = $this->db->get('tb_pengajuan',$number,$offset);		
	}
	function jumlah_data(){
		$this->db->join('mst_barang', 'mst_barang.id_barang = tb_pengajuan.id_barang');
		return $this->db->get('tb_pengajuan')->num_rows();
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
	function insert($name,$barang,$unit = '')
	{
		$this->db->trans_begin();
		$this->db->insert('mst_barang', $barang);
		$id  = $this->db->insert_id();
		if ($name['pengajuan'] == 'logistik') {
			$this->db->insert('tb_pengajuan',array('tgl_pengajuan'=>$name['tgl_pengajuan'],'prog_kerja'=>$name['prog_kerja'],'kegiatan'=>$name['kegiatan'],'id_barang'=>$id,'pegnajuan'=>$name['pengajuan']));
			
		}else{
			$this->db->insert('tb_pengajuan',array('tgl_pengajuan'=>$name['tgl_pengajuan'],'prog_kerja'=>$name['prog_kerja'],'kegiatan'=>$name['kegiatan'],'id_barang'=>$id,'pengajuan'=>$unit));
		}
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			$this->db->trans_complete();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}
	function info($nobast)
	{
		$this->db->select('*,sum(quantity) as qty_sum');
		$this->db->where('tgl_pengajuan', $nobast);
		$this->db->join('mst_barang mb', 'mb.id_barang = td.id_barang', 'left');
		$this->db->group_by('kodebarang');
		return $this->db->get('tb_pengajuan td');
	}
	function gettanggalpengajuan()
	{
		$this->db->group_by('DATE(tgl_pengajuan)');
		return $this->db->get('tb_pengajuan');
	}
	function sispran($tanggal = '',$barang = '',$limit = 10,$offset = 0)
	{
		$dbs = $this->load->database('dbs',true);
        $max = $dbs->select("MAX(id_get) as max")->where('DATE(tgl_pengajuan_fra)',$tanggal)->get("buff_ri_modal_v3")->row()->max;
        if (!empty($max)) {
			if (!empty($limit) || !empty($offset)) {
				$g = $dbs->query("SELECT SQL_CALC_FOUND_ROWS * FROM buff_ri_modal_v3 WHERE id_get = $max AND kode_unit = 71 AND DATE(tgl_pengajuan_fra) = '{$tanggal}' GROUP BY kode_modal ORDER BY DATE(tgl_pengajuan_fra) DESC LIMIT $limit OFFSET $offset");
			}else{
				$g = $dbs->query("SELECT SQL_CALC_FOUND_ROWS * FROM buff_ri_modal_v3 WHERE id_get = $max AND kode_unit = 71 AND DATE(tgl_pengajuan_fra) = '{$tanggal}' OR kode_modal LIKE '%$barang'GROUP BY kode_modal ORDER BY DATE(tgl_pengajuan_fra) DESC  LIMIT 10 OFFSET 0");
			}
        }else{
			if (!empty($limit) || !empty($offset)) {
				$g = $dbs->query("SELECT SQL_CALC_FOUND_ROWS * FROM buff_ri_modal_v3 WHERE kode_unit = 71 AND DATE(tgl_pengajuan_fra) = '{$tanggal}' GROUP BY kode_modal ORDER BY DATE(tgl_pengajuan_fra) DESC LIMIT $limit OFFSET $offset");
			}else{
				$g = $dbs->query("SELECT SQL_CALC_FOUND_ROWS * FROM buff_ri_modal_v3 WHERE kode_unit = 71 AND DATE(tgl_pengajuan_fra) = '{$tanggal}' OR kode_modal LIKE '%$barang'GROUP BY kode_modal ORDER BY DATE(tgl_pengajuan_fra) DESC  LIMIT 10 OFFSET 0");
			}
        }

		// $g = $dbs->query("SELECT * FROM buff_ri_barang_v3 WHERE nama_unit LIKE '%direktorat sistem%' AND tgl_pengajuan_fra = '{$tanggal}'");
		return $g;
	}
	function getSatuan()
	{
		$this->db->order_by('satuan', 'asc');
		return $this->db->get('satuan');
	}
	function jml_sispran($tanggal = '',$barang = '')
	{
		$dbs = $this->load->database('dbs',true);
        $max = $dbs->select("MAX(id_get) as max")->where('DATE(tgl_pengajuan_fra)',$tanggal)->get("buff_ri_modal_v3")->row()->max;
        if (!empty($max)) {
			$g = $dbs->query("SELECT SQL_CALC_FOUND_ROWS * FROM buff_ri_modal_v3 WHERE id_get = $max AND kode_unit = 71 AND DATE(tgl_pengajuan_fra) = '{$tanggal}' GROUP BY kode_modal")->num_rows();
        }else{
			$g = $dbs->query("SELECT SQL_CALC_FOUND_ROWS * FROM buff_ri_modal_v3 WHERE kode_unit = 71 AND DATE(tgl_pengajuan_fra) = '{$tanggal}' GROUP BY kode_modal")->num_rows();
        }

		return $g;
	}
	function ajaxget($kode)
	{
		$this->db->where('DATE(tgl_pengajuan)', $kode);
		$this->db->group_by('DATE(tgl_pengajuan)');
		return $this->db->get('tb_pengajuan')->row();
	}
	function getnama($kode_barang)
	{
		$dbs = $this->load->database('dbs',true);
		$query = "select * FROM buff_barang WHERE id_spek = '{$kode_barang}' GROUP BY id_spek";
		$g = $dbs->query($query);
		if ($g->num_rows() > 0) {
			return $g->row();
		}else{
			$query = "select nama_barang as nama FROM buff_pengadaan_barang WHERE kode_barang = $kode_barang GROUP BY kode_barang";
			$g = $dbs->query($query);
			return $g->row();
		}
	}
	function getkodebarang()
	{
		return $this->db->get('mst_barang');
	}
	function hapus($tabel,$tanggal = '')
	{
        $this->db->where('DATE(tgl_pengajuan)', $tanggal);
        return $this->db->delete($tabel);
	}
	function getbarangada($kodebarang = '',$tglpengajuan = '')
	{
		if (!empty($kodebarang) || !empty($tglpengajuan)) {
			$this->db->select('tb.kegiatan,tb.prog_kerja,tb.tgl_pengajuan,tb.pengajuan,mst_barang.*');
			$this->db->like('tb.id_barang', $kodebarang, 'BOTH');
			$this->db->like('DATE(tb.tgl_pengajuan)', $tglpengajuan, 'BOTH');
			$this->db->join('mst_barang', 'mst_barang.id_barang = tb.id_barang', 'left');
			return $this->db->get('tb_pengajuan tb');
		}
	}
	function check_existing($kode_barang)
	{
		$this->db->where('kodebarang', $kode_barang);
		return $this->db->get('mst_barang')->num_rows();
	}
	function insert_sispran_to_masterdata($table,$objek1,$objek2)
	{
		$this->db->trans_begin();
		$this->db->insert_batch($table, $objek1);
		$count = count($objek1);
		$id = $this->db->insert_id();
		$last = $id + ($count - 1);
		$this->db->insert('tb_pengajuan',array('tgl_pengajuan'=>$objek2['tgl_pengajuan'],'kegiatan'=>$objek2['kegiatan'],'prog_kerja'=>$objek2['prog_kerja'],'id_barang'=>$last,'pengajuan'=>$objek2['pengajuan']));
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	function insert_sispran_to_masterdata_edit($tabel,$objeck,$where)
	{
		$this->db->trans_begin();
		$this->db->where('DATE(tgl_pengajuan)', $where);
		$this->db->delete('tb_pengajuan');

		$this->db->insert_batch($tabel, $objeck);
		if ($this->db->trans_status() === false) {
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}

	}
	function getlokasi()
	{
		return $this->db->get('lokasi');
	}
	function getdarisispran($tanggal)
	{
		// $dbs = $this->load->database('dbs',true);
		// $dbs->select('nama_barang');
		// $dbs->join('buff_bst3_barang bff', 'bff.kode_barang = buff_ri.kode_barang');
		// $dbs->where('DATE(buff_ri.tgl_pengajuan_fra)',$tanggal);
		// $dbs->order_by('DATE(buff_ri.tgl_pengajuan_fra)','ASC');
		// return $dbs->get('buff_ri_barang_v3 buff_ri');
	}
}

/* End of file Pengajuan_model.php */
/* Location: ./application/modules/pengajuan/models/Pengajuan_model.php */