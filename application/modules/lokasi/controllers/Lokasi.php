<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('lokasi_model');
	}
	public function index()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }

	    $lokasi = $this->input->get('lokasi');
	    $page = '';
	    $page = $this->input->get('page');
	    $config['base_url'] = site_url('index.php').'/lokasi?lokasi='.$lokasi;
	    $config['per_page'] = 10;
	    $from = $page;
        if (!empty($lokasi)) {
            $datanya = $this->lokasi_model->data($config['per_page'],$from,$lokasi);
            $jumlah_data = $this->lokasi_model->jumlah($lokasi);
        }else{
            $datanya = $this->lokasi_model->data($config['per_page'],$from);
            $jumlah_data = $this->lokasi_model->jumlah();
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
		$this->load->view('template/template', ['template'=>'view','data'=>$datanya]);
	}
	function detail($id)
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect(base_url('index.php/auth'));
		}

		$g = $this->lokasi_model->detail($id);
		$this->load->view('template/template', ['template'=>'detail','data'=>$g]);
	}
	function insert()
	{
		$name = $this->input->post('name');
		$this->db->where('kode', $name['kode']);
		$f = $this->db->get('lokasi');
		if ($f->num_rows() > 0) {
			echo json_encode(array('status'=>false,'pesan'=>'kode Sudah Ada'));
		}else{
		$g = $this->lokasi_model->insert('lokasi',$name);
			if ($g) {
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false,'pesan'=>'kode Sudah Ada'));
			}
			
		}
	}
}

/* End of file Lokasi.php */
/* Location: ./application/modules/lokasi/controllers/Lokasi.php */