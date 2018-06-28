<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dsitribusi_model');
	}
	public function index()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
		$barang = $this->Dsitribusi_model->getdata();
		$this->load->view('template/template', ['template'=>'view','barang'=>$barang]);
	}
	public function tambah()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
		$tgl_nya = $this->input->get('tgl_nya');
		$type = $this->input->get('tgl');
		if ($tgl_nya !='' || $type !='') {
			$barang = $this->Dsitribusi_model->getbarang($tgl_nya,$type);
		}else{
			$barang = $this->Dsitribusi_model->getbarang();
		}
		$this->load->view('template/template', ['template'=>'tambah','barang'=>$barang]);
	}
	function simpan()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $obj = array();
		$count = $this->input->post('count');
		foreach ($count as $key => $value) {
			if ($_POST['count'][$key] == 1) {
				$obj[] = array('tgl_bast_u'=>$this->input->post('tgl_bast_u'),
							'no_bast_u'=>$this->input->post('no_bast_u'),
							'id_barang'=>$_POST['id_barang'][$key],
							'qty'=>$_POST['qty'][$key],
							'penerima'=>$this->input->post('pic')
				);
			}
		}
		$g = $this->Dsitribusi_model->insert('distribusi',$obj,'insert');
		if ($g) {
			echo json_encode(array('status'=>true,'data'=>$obj));
		}else{
			echo json_encode(array('status'=>false,'data'=>$obj));
		}
	}
	function simpan_edit()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $obj = array();
		$count = $this->input->post('count');
		$tgl = $this->input->post('tgl_old');
		foreach ($count as $key => $value) {
			if ($_POST['count'][$key] == 1) {
				$obj[] = array('tgl_bast_u'=>$this->input->post('tgl_bast_u'),
							'no_bast_u'=>$this->input->post('no_bast_u'),
							'id_barang'=>$_POST['id_barang'][$key],
							'qty'=>$_POST['qty'][$key],
							'penerima'=>$this->input->post('pic')
				);
			}
		}
		echo json_encode($obj);
		$g = $this->Dsitribusi_model->insert('distribusi',$obj,'update',$tgl);
		if ($g) {
			echo json_encode(array('status'=>true,'data'=>$obj));
		}else{
			echo json_encode(array('status'=>false,'data'=>$obj));
		}
	}
    function info()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
    	$id = $this->input->get('no_bast_u');
        $data = $this->Dsitribusi_model->info($id);
        $this->load->view('template/template', ['template'=>'info','data'=>$data]);
    }
    function getdatafromotherdatabase()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
    	$dbs = $this->load->database('dbs', TRUE);
    	$dbs->select('kode_barang');
    	$g = $dbs->get('buff_ri_barang_v3',10,10);
    	echo json_encode($g->result());
    }

    function generate_word()
    {
        // header("Content-type: application/vnd.ms-word");

    	$id = $this->input->get('no_bast_u');
        $data = $this->Dsitribusi_model->info($id);
        $this->load->view('views',['barang'=>$data]);
    }

    function edit()
    {
    	$date = $this->input->get('tanggal');
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
		$tgl_nya = $this->input->get('tgl_nya');
		$type = $this->input->get('tgl');
		if ($tgl_nya !='' || $type !='') {
			$barang = $this->Dsitribusi_model->getbarang($tgl_nya,$type);
		}else{
	    	$barang = $this->Dsitribusi_model->getedit($date);
		}
		$g = $this->Dsitribusi_model->getedit($date);
    	$this->load->view('template/template', ['template'=>'edit','tanggal'=>$date,'barang'=>$barang,'edit'=>$g]);
    	// print_r($g->row());
    }
}
