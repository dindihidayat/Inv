<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

	function insert($tabel,$data)
	{
		$this->db->trans_start();
		$this->db->insert_batch($tabel, $data);
		if ($this->db->trans_status()) {
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
			return false;
		}
	}

}

/* End of file upload_model.php */
/* Location: ./application/modules/upload/models/upload_model.php */