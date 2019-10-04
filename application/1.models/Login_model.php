<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Login_model extends CI_Model {

     private $_mongoDb;
        var $table_user = 'tbl_users';
      

	function __construct() {

        parent::__construct();

        $this->load->database();

    }
	
public function cek($data)
{
    return $this->db->get_where($this->table_user, $data)->row();
}

public function getclub($email, $type)
{
	
	return $this->db->where('email', $email)->select('id, img, name_club')->get('tbl_club')->row();
}

public function geteo($email, $type)
{

	if($type == 1){
		$query = 	$this->db->where('email ', $email)->select('id, img, name as name_eo')->get('tbl_eo')->row();
	}elseif($type == 2){
		$query = 	$this->db->where('email', $email)->select('id, img, name_club')->get('tbl_club')->row();
	}elseif($type == 3){
		$query = 	$this->db->where('email', $email)->select('id, img, name')->get('tbl_atlet')->row();
	}else{
		// $query = 	$this->db->where('email', $email)->select('id, img')->get('tbl_eo')->row();
	}
	return $query;


}
	
}

