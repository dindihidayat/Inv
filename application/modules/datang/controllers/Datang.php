<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datang extends MX_Controller {
	public function __construct()
	{
	parent::__construct();
        	$this->load->model('Datang_model');
	}
	public function index()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
    	$jumlah_data              = $this->Datang_model->jumlah_data();
        $config['base_url']       = site_url('index.php').'/pengajuan/index/';
        $config['total_rows']     = $jumlah_data;
        $config['per_page']       = 10;
        $from                     = $this->uri->segment(4);
        $config['full_tag_open']  = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link']     = '<i class="fa fa-caret-left"></i>';
        $config['last_link']      = '<i class="fa fa-caret-right"></i>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close']= '</li>';
        $config['prev_link']      = '&laquo';
        $config['prev_tag_open']  = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link']      = '&raquo';
        $config['next_tag_open']  = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open']  = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open']   = '<li class="active"><a href="#">';
        $config['cur_tag_close']  = '</a></li>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $this->pagination->initialize($config);

		$this->load->view('template/template',array('template'=>'view','data' => $this->Datang_model->data($config['per_page'],$from)));
	}

    public function tambah()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $this->load->view('template/template', array('template'=>'tambah','get_mstbarang'=>$this->Datang_model->get_mstbarang()));
    }
    public function edit($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $tanggal = str_replace('_', '-', $id);
        $data = $this->Datang_model->getedit($tanggal);
        $this->load->view('template/template', ['template'=>'edit','data'=>$data,'tanggal_id'=>$tanggal]);
    }
    function info($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $tanggal = str_replace('_', '-', $id);
        $data = $this->Datang_model->info($tanggal);
        $this->load->view('template/template', ['template'=>'info','data'=>$data]);
    }
    function action()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $count = $this->input->post('id_barang');
        $result = array();
        $datang = array();
        foreach ($count as $key => $value) {
            if ($_POST['count'][$key] == 1) {
            $datang[] = array('no_bst'=>$this->input->post('nobast'),
                                'tgl_bst'=>$this->input->post('tgl_datang'),
                                'tgl_datang'=>$this->input->post('tgl_datang'),
                                'no_po'=>$this->input->post('nopo'),
                                'pic'=>$this->input->post('pic'),
                                'id_barang'=>$_POST['id_barang'][$key],
                                'tgl_pengajuan'=>$this->input->post('tgl_pengajuan'));
            $result[] = array('id_barang'=>$_POST['id_barang'][$key],
                            'qty_datang'=>$_POST['qty_datang'][$key]);
            }
        }
        $g = $this->Datang_model->insert($result,$datang);
        if ($g) {
            echo json_encode(array('status'=>true));
        }else{
            echo json_encode(array('status'=>false));
        }
    }
    function action_edit()
    {
            if (!$this->ion_auth->logged_in())
            {
                redirect(base_url('index.php/auth'));
            }
            $tgl_datang      = $this->input->post('tgl_datang');
            $tgl_pengajuan   = $this->input->post('tgl_pengajuan');
            $nobst           = $this->input->post('nobast');
            $nopo            = $this->input->post('nopo');
            $pic             = $this->input->post('pic');
            $checkbarang     = $this->input->post('barang');
            $quantity_datang = $this->input->post('qty_datang');
            $kodebarang      = $this->input->post('kodebarang');
            $tanggal_id      = $this->input->post('tanggal_id');

            $this->db->trans_begin();
            foreach (array_map(null, $checkbarang,$quantity_datang,$kodebarang) as $key) {
                list($cek,$quantity,$kodebarang_data) = $key;
                if ($quantity !='') {
                // echo json_encode(array('cek'=>$cek,'quantity'=>$quantity));
                $this->db->where('tgl_datang', $tanggal_id);
                $this->db->delete('tb_datang');

                // update ke tabel Master Barang
                $this->db->where('kodebarang', $kodebarang_data);
                $this->db->update('mst_barang', array('qty_datang'=>$quantity,'ket'=>'full','status_barang'=>1));
                
                $g = $this->db->insert('tb_datang', array('no_bst'=>$nobst,'tgl_bst'=>$tgl_datang,'pic'=>$pic,'tgl_pengajuan'=>$tgl_pengajuan,'tgl_datang'=>$tgl_datang,'id_barang'=>$cek,'no_po'=>$nopo));
                }

            }
            if ($this->db->trans_status() === FALSE){
             $this->db->trans_rollback();
                echo json_encode(array('status'=>false));
            }else{
             $this->db->trans_commit();
                echo json_encode(array('status'=>true));
            }
    }
    function generatepdf($tgl)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $this->load->library('pdfgenerator');
        $tanggal = str_replace('_', '-', $tgl);
        $data = $this->Datang_model->info($tanggal);
        $html = $this->load->view('pdf/generate_pdf', ['data'=>$data],TRUE);
        $filename = "barang_datang-".$tanggal;
        $this->pdfgenerator->generate($html, $filename, true, 'legal', 'portrait');
    }
    function get_pengajuan()
    {
        $tanggal = $this->input->post('tanggal');
        $data = $this->Datang_model->get_pengajuan($tanggal);
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url('index.php/auth'));
        }
        if ($data) {
            echo json_encode(array('status'=>true,'data'=>$data->result()));
        }else{
            echo json_encode(array('status'=>false));
        }
    }
}

/* End of file Pengajuan.php */
/* Location: ./application/module/pengajuan/controllers/Pengajuan.php */