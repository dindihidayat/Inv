<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}
	public function index()
	{
		if (!$this->ion_auth->logged_in()) {
			$this->load->view('auth');
		}else{
			redirect(base_url('index.php/pengajuan'));
		}
	}
	function action()
	{
		$remember = 1;
		if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
		{
			$g = $this->auth_model->checkdata($this->input->post('username'),$this->input->post('password'));
			$array = array(
				'userdata' => $g
			);
			$this->session->set_userdata( $array );
			echo json_encode(array('status'=>true,'message'=>$this->ion_auth->messages(),'data'=>$g));
		}
		else
		{
			echo json_encode(array('status'=>false,'message'=>$this->ion_auth->errors()));
		}
	}
	function logout()
	{
		$this->session->unset_userdata('userdata');
		$this->ion_auth->logout();
		redirect(base_url('index.php/auth'));
	}
	function hash()
	{
		$this->load->model('ion_auth_model');
		$pass = "password";
		$id = 1;
		print_r($this->ion_auth_model->hash_password_db_result($id,$pass,true));
	}

}

/* End of file auth.php */
/* Location: ./application/modules/auth/controllers/auth.php */