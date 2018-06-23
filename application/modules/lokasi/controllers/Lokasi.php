<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
		$this->load->view('template/template', ['template'=>'view']);
	}

}

/* End of file Lokasi.php */
/* Location: ./application/modules/lokasi/controllers/Lokasi.php */