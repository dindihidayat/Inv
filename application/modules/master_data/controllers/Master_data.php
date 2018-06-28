<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends MX_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Masterdata_model');
	}
	public function index()
	{
    if (!$this->ion_auth->logged_in())
    {
        redirect(base_url('index.php/auth'));
    }
    $cari = $this->input->get('cari');
    $lokasi = $this->input->get('lokasi');
    $sumber_dana = $this->input->get('sumber_dana');
    $page = '';
    $page = $this->input->get('page');

    $config['base_url'] = site_url('index.php').'/master_data?cari='.$cari.'&lokasi='.$lokasi.'&sumber_dana='.$sumber_dana.'&';
    $config['per_page'] = 10;
    $from = $page;
    if (!empty($cari) || !empty($lokasi) || !empty($sumber_dana)) {
      $caris = $this->Masterdata_model->data($config['per_page'],$from,$cari,$lokasi,$sumber_dana);
      $jumlah_data = $this->Masterdata_model->jumlah_data($cari,$lokasi,$sumber_dana);
    }else{
       $caris = $this->Masterdata_model->data($config['per_page'],$from,$cari,$lokasi,$sumber_dana);
       $jumlah_data = $this->Masterdata_model->jumlah_data($cari,$lokasi,$sumber_dana);
    }
    // print_r($caris);
    // exit();
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
		$this->load->view('template/template',array('template'=>'view','data' => $caris,'carikey'=>$cari,'id_lokasi'=>$lokasi,'sumber_dana'=>$sumber_dana,'lokasi'=>$this->Masterdata_model->getlokasi(),'sumberdata'=>$this->Masterdata_model->getsumberdana()));
	}

  public function tambah()
  {
    if (!$this->ion_auth->logged_in())
    {
        redirect(base_url('index.php/auth'));
    }
    $this->load->view('template/template', ['template'=>'tambah','lokasi'=>$this->Masterdata_model->getlokasi(),'satuan'=>$this->Masterdata_model->getSatuan()]);
  }
  function edit($id)
  {
    $g = $this->Masterdata_model->edit($id);
    $this->load->view('template/template', ['template'=>'edit','data'=>$g,'satuan'=>$this->Masterdata_model->getSatuan(),'lokasi'=>$this->Masterdata_model->getlokasi()]);
  }
  function action()
  {
    if (!$this->ion_auth->logged_in())
    {
        redirect(base_url('index.php/auth'));
    }
    $gambar = '';

    $config['file_name'] = $this->Masterdata_model->kode().'-'.$this->input->post('nama');
    $config['upload_path'] = 'upload/gambar';
    $config['allowed_types'] = 'gif|jpg|png';
    // $config['max_size']  = '1500';

    
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
    }
    else{
            $data = array('upload_data' => $this->upload->data());
            $gambar = $data['upload_data']['file_name'];
    }
    $barang = ['kodebarang'=>$this->Masterdata_model->kode(),
       'nama'=>$this->input->post('nama'),
       'satuan'=>$this->input->post('satuan'),
       'id_lokasi'=>$this->input->post('lokasi'),
       'gambar'=>$gambar,
       'sumber_dana'=>$this->input->post('sumber_dana'),
       'quantity'=>$this->input->post('quantity'),
       'harga'=>$this->input->post('harga_realisasi'),
       'spesifikasi'=>$this->input->post('spesifikasi'),
      ];
    $g = $this->Masterdata_model->insert($barang);
    if ($g){
           redirect(base_url('index.php/master_data'),'refresh');
    }else{
      $this->tambah();
    }
  }
  function action_edit()
  {
    if (!$this->ion_auth->logged_in())
    {
        redirect(base_url('index.php/auth'));
    }
    $gambar = '';

    $config['file_name'] = $this->Masterdata_model->kode().'-'.$this->input->post('nama');
    $config['upload_path'] = 'upload/gambar';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';

    
    $this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
<<<<<<< .mine
            // print_r($error);
            // exit();

=======
            // print_r($error);
            // exit();
            $gambar = $this->input->post('gambar_lama');
>>>>>>> .theirs
    }
    else{
            $data = array('upload_data' => $this->upload->data());
            $gambar = $data['upload_data']['file_name'];
<<<<<<< .mine
            // print_r($data);
            // exit();

=======
            // print_r($data);
            // exit();
            unlink('upload/gambar/'.$this->input->post('gambar_lama'));
>>>>>>> .theirs
    }
    $id = $this->input->post('idnya');
    $barang = ['kodebarang'=>$this->Masterdata_model->kode(),
       'nama'=>$this->input->post('nama'),
       'satuan'=>$this->input->post('satuan'),
       'id_lokasi'=>$this->input->post('lokasi'),
       'gambar'=>$gambar,
       'pengajuan'=>$this->input->post('pengajuan'),
       'sumber_dana'=>$this->input->post('sumber_dana'),
       'quantity'=>$this->input->post('quantity'),
       'harga'=>$this->input->post('harga_realisasi'),
       'spesifikasi'=>$this->input->post('spesifikasi'),
      ];
    $g = $this->Masterdata_model->update($id,$barang);
    if ($g){
           redirect(base_url('index.php/master_data'),'refresh');
    }else{
      $this->tambah();
    }
  }
}
