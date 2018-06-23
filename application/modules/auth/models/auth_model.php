<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	function checkdata($username,$password)
	{
		$this->load->library('bcrypt');
		$CI =& get_instance();
		$CI->load->library('ion_auth_model');
		$this->db->where('email', $username);
		$this->db->limit(1);
		$g = $this->db->get('users');
		if ($g->num_rows() === 1) {
			$check_password = $CI->ion_auth_model->hash_password_db($g->row()->id,$password);
			if ($check_password) {
				return $g->row();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

}

/* End of file auth_model.php */
/* Location: ./application/modules/auth/models/auth_model.php */