<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends MX_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengajuan_model');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
	public function index()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
            $tahun = 0;
            $tahun = $this->input->get('tahun');
            $jumlah_data = $this->pengajuan_model->jumlah_data();
            $config['base_url'] = site_url('index.php').'/pengajuan/index/';
            $config['total_rows'] = $jumlah_data;
            $config['per_page'] = 10;
            $from = $this->uri->segment(4);
            if (!empty($tahun)) {
                $datanya = $this->pengajuan_model->data($config['per_page'],$from,$tahun);
            }else{
                $datanya = $this->pengajuan_model->data($config['per_page'],$from);
            }

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = '<i class="fa fa-caret-left"></i>';
            $config['last_link'] = '<i class="fa fa-caret-right"></i>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);

		$this->load->view('template/template',array('template'=>'view','data' => $datanya));
	}
	public function tambah()
	{
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $kodebarang = $this->input->get('kodebarang');
        $tglpengajuan = $this->input->get('tglpengajuan');
        $barang = '';
        if (!empty($kodebarang) || !empty($tglpengajuan))
        {
            $barang = $this->pengajuan_model->getbarangada($kodebarang,$tglpengajuan);
        }
        $tgl_pengajuan = $this->pengajuan_model->gettanggalpengajuan();
		$this->load->view('template/template',array('template'=>'tambah','lokasi'=>$this->pengajuan_model->getlokasi(),'barang'=>$barang,'kodebarang'=>$this->pengajuan_model->getkodebarang(),'tglpengajuanada'=>$tgl_pengajuan,'satuan'=>$this->pengajuan_model->getSatuan()));
	}
    public function cari_sispran()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $barang = '';
        $jml = 0;
        $tanggal = $this->input->get('tanggal');
        $barang_cari = $this->input->get('barang');
        $page = $this->input->get('page');
        $offset = 0;
        if (!empty($page)) {
            $offset = $page;
        }else{
            $offset = 0;
        }
        $config['base_url'] = site_url('index.php').'/pengajuan/cari_sispran?barang='.$barang.'&tanggal='.$tanggal;
        $config['per_page'] = 10;
        $from = $page;
        if (!empty($tanggal) || !empty($barang_cari)) {
            $barang = $this->pengajuan_model->sispran($tanggal,$barang_cari,$config['per_page'],$offset);
            $jml = $this->pengajuan_model->jml_sispran($tanggal,$barang_cari);
        }

        $config['total_rows'] = $jml;
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
        // print_r($jml);
        // print_r($barang);
        $this->load->view('template/template',['template'=>'cari_sispran','dari_sispran'=>$barang]);
    }
    function ajaxget()
    {
        $kode = $this->input->get('kode');
        $g = $this->pengajuan_model->ajaxget($kode);
        echo json_encode($g);
    }
    function save_data_sispran_new()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $g = '';
        $count = $this->input->post('hidden');
        $tgl_pengajuan = $this->input->post('tgl_pengajuan');
        $kegiatan = $this->input->post('kegiatan');
        $prog_kerja = $this->input->post('prog_kerja');
        $unit = $this->input->post('unit');

        // upload imagenya
        $config['upload_path'] = 'upload/gambar/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|doc|docx|pdf|xlsx|xls|psd|cdr';
        $this->load->library('upload', $config);

        $res = array();
        foreach ($count as $key => $value) {
            if ($_POST['cekdatanya'][$key] == 1) {
                if ($this->upload->do_upload('gambar'.$key)) {
                    $data = $this->upload->data();
                    $res[] = array(
                        'kodebarang'=>$_POST['kode_modal'][$key],
                        'nama' => $_POST['nama'][$key],
                        'satuan' => $_POST['satuan'][$key],
                        'id_lokasi'=>1,
                        'sumber_dana'=>'RKA',
                        'pengajuan'=>'1',
                        'gambar'=>$data['file_name'],
                        'quantity' => $_POST['volume'][$key],
                        'spesifikasi' => $_POST['spesifikasi'][$key],
                        'harga' => $_POST['harga'][$key]
                    );
                }else{
                    $res[] = array(
                        'kodebarang'=>$_POST['kode_modal'][$key],
                        'nama' => $_POST['nama'][$key],
                        'satuan' => $_POST['satuan'][$key],
                        'id_lokasi'=>1,
                        'sumber_dana'=>'RKA',
                        'pengajuan'=>'1',
                        'quantity' => $_POST['volume'][$key],
                        'spesifikasi' => $_POST['spesifikasi'][$key],
                        'harga' => $_POST['harga'][$key]
                    );
                }
            }
        }
        $obj = array('tgl_pengajuan'=>$tgl_pengajuan,'kegiatan'=>$kegiatan,'prog_kerja'=>$prog_kerja,'pengajuan'=>$unit);
        $g = $this->pengajuan_model->insert_sispran_to_masterdata('mst_barang',$res,$obj);
        echo json_encode($res);


    }

    function uploadexcel()
    {
        $config['upload_path'] = 'upload/file';
        $config['allowed_types'] = 'gif|jpg|png|xls|xlsx|jpeg|';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            echo json_encode($data);
        }
    }
    function save_data_sispran_edit()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $g = '';
        $count = $this->input->post('hidden');
        $tgl_pengajuan = $this->input->post('tgl_pengajuan');
        $kegiatan = $this->input->post('kegiatan');
        $prog_kerja = $this->input->post('prog_kerja');
        $unit = $this->input->post('unit');

        $obj = array();
        foreach ($count as $key => $value) {
            if ($_POST['cekdatanya'][$key] == 1) {
                $obj[]= array('tgl_pengajuan'=>$tgl_pengajuan,'kegiatan'=>$kegiatan,'prog_kerja'=>$prog_kerja,'pengajuan'=>$unit,'id_barang'=>$_POST['hidden'][$key]);
            }
        }
        $g = $this->pengajuan_model->insert_sispran_to_masterdata_edit('tb_pengajuan',$obj,$tgl_pengajuan);
        if ($g) {
            echo json_encode(array('status'=>true));
        }else{
            echo json_encode(array('status'=>false));
        }

    }
    function save_tgl_invalid()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $tanggal = $this->input->post('tanggal');
        $tgl_asli = $this->input->post('tgl_asli');
        $this->db->where('DATE(tgl_pengajuan)', $tgl_asli);
        $g = $this->db->update('tb_pengajuan', array('tgl_pengajuan'=>$tanggal));
        if ($g) {
            echo json_encode(array('status'=>true));
        }else{
            echo json_encode(array('status'=>false));
        }
    }
    function caridisispran()
    {   
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $barang = '';
        $tanggal = $this->input->post('tanggal');
        $datasispran = $this->pengajuan_model->sispran($tanggal);
        echo json_encode($datasispran->result());

    }
    public function edit()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect(base_url('index.php/auth'));
        }
        $barang = '';
        $tanggal = $this->input->get('tanggal');
        $barang_cari = $this->input->get('barang');
        if (!empty($tanggal) || !empty($barang_cari)) {
            $barang = $this->pengajuan_model->sispran($tanggal,$barang_cari);
        }
        $tgl = $this->input->get('tgl');
        $g = $this->pengajuan_model->info($tgl);
        $this->load->view('template/template', ['template'=>'edit','dari_sispran'=>$g,'tanggal'=>$tgl,'sispran'=>$barang]);
    }
    public function info($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $data = $this->pengajuan_model->info($id);
        $this->load->view('template/template', ['template'=>'info','data'=>$data]);
    }
    function getdarisispran()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $tanggal = $this->input->post('tanggal');
        $data = $this->pengajuan_model->getdarisispran($tanggal);
        if ($data) {
            echo json_encode($data->result());
        }else{
            echo json_encode(array('status'=>'Data Kosong'));
        }
    }
    function action()
    {

        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
            $this->validation();
            if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/template',array('template'=>'tambah'));
            } else {
            $config['file_name'] = $this->pengajuan_model->kode().'-'.$this->input->post('nama_barang');
            $config['upload_path'] = 'upload/gambar/';
            $config['allowed_types'] = 'jpeg|jpg|png|doc|docx';
            $config['max_size']  = '5024';
            $gambar = '';
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
            }
            else{
                    $data = array('upload_data' => $this->upload->data());
                    $gambar = $data['upload_data']['file_name'] ;
                    // print_r($data);
            }
            // exit();
            $name = $this->input->post('name');
            $unit = $this->input->post('unit');
            $barang = ['kodebarang'=>$this->pengajuan_model->kode(),
                       'nama'=>$this->input->post('nama_barang'),
                       'satuan'=>$this->input->post('satuan'),
                       'id_lokasi'=>$this->input->post('lokasi'),
                       'gambar'=>$gambar,
                       'pengajuan'=>1,
                       'sumber_dana'=>$this->input->post('sumber_dana'),
                       'quantity'=>$this->input->post('quantity'),
                       'harga'=>$this->input->post('harga_realisasi'),
                       'spesifikasi'=>$this->input->post('spesifikasi'),
                       'status_barang'=>0,
                       'ket'=>'belum_datang' 
                      ];
                $g = $this->pengajuan_model->insert($name,$barang,$unit);
                // print_r($g);
                if ($g) {
                        $this->session->flashdata('status',true);
                        redirect(base_url('index.php/pengajuan'));
                }else{
                        $this->session->flashdata('status',false);
                        redirect(base_url('index.php/pengajuan/tambah'));
                }
            }
        }

    function generatepdf($tanggal)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
        $this->load->library('pdfgenerator');
        $data = $this->pengajuan_model->info($tanggal);
        // $this->load->view('pdf/generate_pdf', ['data'=>$data]);
        $html = $this->load->view('pdf/generate_pdf', ['data'=>$data],TRUE);
        $filename = "pengajuan-".$tanggal;
        $this->pdfgenerator->generate($html, $filename, true, 'legal', 'portrait');
    }
    function hapus()
    {
        $tanggal = $this->input->post('tanggal');
        $g = $this->pengajuan_model->hapus('tb_pengajuan',$tanggal);
        if ($g) {
            echo json_encode(array('status'=>true));
        }
    }
    function validation()
    {
        $this->form_validation->set_rules('name[tgl_pengajuan]', 'Tanggal Pengajuan', 'required');
        $this->form_validation->set_rules('name[prog_kerja]', 'Program Kerja', 'required');
        $this->form_validation->set_rules('name[kegiatan]', 'Kegiatan', 'required');
        $this->form_validation->set_rules('name[pengajuan]', 'Field Pengajuan', 'required');
    }
    function up()
    {
        $this->load->view('uploader');
    }
    function uploader()
    {
        $config['upload_path'] = 'upload/file';
        $config['allowed_types'] = '*';
        $config['max_size']  = '5000';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors(),'message'=>"Error");
            print_r($error);
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            // print_r($data['upload_data']['file_ext']);
            // exit();
            $inputFileName = 'upload/file/'.$data['upload_data']['file_name'];
            if ($data['upload_data']['file_ext'] == '.xls' || $data['upload_data']['file_ext'] == '.xlsx') {

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
            // $sheet = $objPHPExcel->getSheetByName('002');
            // $highestRow = $sheet->getHighestRow();
            // $highestColumn = $sheet->getHighestColumn();
            // $g = array();
            // for ($i=11; $i <=$highestRow ; $i++) { 
            //     $a = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getValue();
            //     $b = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getValue();
            //     $c = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
            //     $g[] = array('A'=>$a,'B'=>$b,'C'=>$c);
            // }
            $countnya = array();


            foreach ($objPHPExcel->getAllSheets() as $sheet) {
            $sheets[$sheet->getTitle()] = $sheet->toArray();
            }
            for ($i=1; $i <=sizeof($sheets) ; $i++) {
                echo "<pre>";
                if ($i >=10) {
                    $countnya[] = count($sheets['0'.$i]) - 10;
                }else{
                    $countnya[] = count($sheets['00'.$i]) - 10;
                }
            }

            print_r($countnya);
            // print_r(array_sum($countnya) - 30);

            }else{
                echo "Data yang diupload harus file excel";
                unlink($inputFileName);
            }

        }
    }
}
