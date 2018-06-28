<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stockopname extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('stockopname_model');	
	}
	public function index()
	{
		$this->load->view('template/template', ['template'=>'view','opname'=>$this->stockopname_model->dataopname()]);
	}
	public function tambah()
	{
		$this->load->library('pagination');
	    $lokasi = $this->input->get('lokasi');
	    $sumber_dana = $this->input->get('sumber_dana');
	    $page = '';
	    $page = $this->input->get('page');

	    $config['base_url'] = site_url('index.php').'/stockopname/tambah?lokasi='.$lokasi.'&sumber_dana='.$sumber_dana;
	    $config['per_page'] = 3;
	    $from = $page;
	    if (!empty($lokasi) || !empty($sumber_dana)) {
	      $caris = $this->stockopname_model->barang($config['per_page'],$from,$lokasi,$sumber_dana);
	      $jumlah_data = $this->stockopname_model->jumlah_data_barang($lokasi,$sumber_dana);
	    }else{
	       $caris = $this->stockopname_model->barang($config['per_page'],$from,$lokasi,$sumber_dana);
	       $jumlah_data = $this->stockopname_model->jumlah_data_barang($lokasi,$sumber_dana);
	    }
		
	    $config['total_rows'] = $jumlah_data;
	    $config['uri_protocol'] = "QUERY_STRING";
	    $config['enable_query_strings'] = TRUE;
	    $config['page_query_string'] = TRUE;
	    $config['query_string_segment'] = 'page';
	    $config['full_tag_open'] = '<ul class="pagination">';
	    $config['full_tag_close'] = '</ul>';
	    $config['first_link'] = 'First';
	    $config['last_link'] = 'Last';
	    $config['first_tag_open'] = '<li class="page-item">';
	    $config['first_tag_close'] = '</li>';
	    $config['attributes'] = array('class' => 'page-link');
	    $config['prev_link'] = '&laquo';
	    $config['prev_tag_open'] = '<li class="page-item">';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = '&raquo';
	    $config['next_tag_open'] = '<li class="page-item">';
	    $config['next_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li class="page-item">';
	    $config['last_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active page-item"><a href="#" class="page-link">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li class="page-item">';
	    $config['num_tag_close'] = '</li>';
	    $this->pagination->initialize($config);
		$this->load->view('template/template', ['template'=>'tambah','barang'=>$caris,'page'=>$this->pagination->create_links(),'lokasi'=>$this->stockopname_model->getlokasi(),'sumber_dana'=>$this->stockopname_model->getsumberdana(),'id_lokasi'=>$lokasi,'sumberdana'=>$sumber_dana,]);
	}


	function save_opname()
	{
		$barang = $this->input->post('barang');
		$kodebarang = $this->input->post('kodebarang');
		$qty_prog = $this->input->post('qty');
		$qty_rill = $this->input->post('qty_rill');
		$ket = $this->input->post('ket');

		$tgl_opname = $this->input->post('tglopname');
		$no_opname = $this->input->post('no_opname');
		$pic = $this->input->post('pic');

		$count = $this->input->post('barang');
		$ins = array();
		foreach ($count as $key => $value) {
			if ($_POST['qty_rill'][$key] != '') {
				$ins[] =  array('no_opname'=>$no_opname,'kodebarang'=>$_POST['kodebarang'][$key],'namabarang'=>$_POST['barang'][$key],'jmlfisik'=>$_POST['qty_rill'][$key],'tglopname'=>$tgl_opname,'jmlprogram'=>$_POST['qty'][$key],'selisih'=>$_POST['qty'][$key]-$_POST['qty_rill'][$key],'pic'=>$pic);
			}
		}
		// echo json_encode($ins);
		// exit();
		$g = $this->stockopname_model->insert('hasilstokopname',$ins);
		if ($g) {
			echo json_encode(array('status'=>true,'count'=>count($count)));
		}else{
			echo json_encode(array('status'=>false));
		}
	}

	function hapus()
	{
		$id = $this->input->post('kode');
		$g = $this->stockopname_model->hapus($id);
		if ($g) {
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false));
		}
	}
}

/* End of file Stockopname.php */
/* Location: ./application/modules/stockopname/controllers/Stockopname.php */