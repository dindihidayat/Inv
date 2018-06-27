<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
	public function index()
	{
	    if (!$this->ion_auth->logged_in())
        {
            redirect(base_url('index.php/auth'));
        }
		$this->load->view('template/template', ['template'=>"view"]);
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
        }else{
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

	            $pengajuan = array();
	            $master_barang = array();
	            $check = '';
	            foreach ($objPHPExcel->getAllSheets() as $sheet) {
	            $sheets[$sheet->getTitle()] = $sheet->toArray();
	            }
	            for ($i=1; $i <=sizeof($sheets) ; $i++) {
                    $countnya[] = $sheets['Sheet'.$i];
	                // if ($i >=10) {
	                //     $countnya[] = $sheets['Sheet'.$i];
	                // }
	                // else{
	                //     $countnya[] = $sheets['Sheet'.$i];
	                // }
	            }

	            for ($i=0; $i <sizeof($countnya) ; $i++) { 
	            	for ($d=3; $d <sizeof($countnya[$i]) ; $d++) {
	            		if ($countnya[$i][0][1] == "Pengajuan Barang") {
	            			$check = $countnya[$i][0][1];
			            	$pengajuan[] = array('tgl_pengajuan'=>$countnya[$i][$d][1],'prog_kerja'=>$countnya[$i][$d][2],'kegiatan'=>$countnya[$i][$d][3],'pengajuan'=>$countnya[$i][$d][4],'id_barang'=>$countnya[$i][$d][5]);
	            		}else{
	            			$check = $countnya[$i][0][1];
	            			$master_barang[] = array('id_barang'=>$countnya[$i][$d][0],
	            									'nama'=>$countnya[$i][$d][1],
	            									'satuan'=>$countnya[$i][$d][2],
	            									'spesifikasi'=>$countnya[$i][$d][3],
	            									'id_lokasi'=>1,
	            									'sumber_dana'=>$countnya[$i][$d][5],
	            									'quantity'=>$countnya[$i][$d][6],
	            									'harga'=>$countnya[$i][$d][7],
	            									'kodebarang'=>$countnya[$i][$d][8]);
	            		}
	            	}
	            }

	            if ($check == "Pengajuan Barang") {
		            $ins = $this->upload_model->insert('tb_pengajuan',$pengajuan);
	            }else if($check =="Master barang"){
		            $ins = $this->upload_model->insert('mst_barang',$master_barang);
	            }else{
	            	echo json_encode(array('status'=>false,'pesan'=>"Terjadi Kesalahan"));
	            }
	            if ($ins) {
	            	echo json_encode(array('status'=>true,'pesan'=>"Berhasil Menyimpan Data"));
	            }else{
	            	echo json_encode(array('status'=>false,'pesan'=>"Gagal Menyimpan Data"));
	                unlink($inputFileName);
	            }

            }else{
            	echo json_encode(array('status'=>false,'pesan'=> "File Harus Excel"));
                unlink($inputFileName);
            }

        }
	}

	function while_do()
	{
		$i = 1;
		while ($i <= 10) {
			echo $i++;
		}
	}
}

/* End of file upload.php */
/* Location: ./application/modules/upload/controllers/upload.php */