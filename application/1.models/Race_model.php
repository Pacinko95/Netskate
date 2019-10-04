<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Race_model extends CI_Model {

	private $_mongoDb;
	function __construct() {

		parent::__construct();

		$this->load->database();

	}
	 
	public function all_race($id = null)
	{
		// $sql = $this->db->query("SELECT b.id, b.name from tbl_event a
		// LEFT JOIN tbl_race b ON a.id_eo = b.id_eo AND b.flag = 1
		// where a.id='$id'");

		$sql = $this->db->query("SELECT b.id, b.name, a.id_template from tbl_event a
		LEFT JOIN tbl_mku_template c ON a.id_template = c.id_template
		LEFT JOIN tbl_race b ON b.id = c.id_race
		where a.id='$id' GROUP BY b.id ");
		return $sql->result();
	}

	// public function race_to_invoice($code_invoice = null)
	// {
	// 	$sql = $this->db->query("SELECT b.id, b.name from tbl_event a
	// 	LEFT JOIN tbl_race b ON a.id_eo = b.id_eo AND b.flag = 1
	// 	LEFT JOIN tbl_invoice c ON c.id_event = a.id
	// 	where c.code_invoice ='$code_invoice'");
	// 	return $sql->result();
	// }

	public function race_to_invoice($code_invoice = null)
	{
		$id = $this->db->select('id_event')->where('code_invoice', $code_invoice)->get('tbl_invoice')->row();
		$id_event = $id->id_event;
		
		$this->all_race($id_event);
		// $sql = $this->db->query("SELECT b.id, b.name from tbl_event a
		// LEFT JOIN tbl_race b ON a.id_eo = b.id_eo AND b.flag = 1
		// LEFT JOIN tbl_invoice c ON c.id_event = a.id
		// where c.code_invoice ='$code_invoice'");
		return $this->all_race($id_event);
	}



	public function race_team(){
		$sql = $this->db->query("SELECT a.id, a.last_name ,a.first_name ,b.name  FROM tbl_mku_race a
								LEFT JOIN tbl_class b ON a.class = b.id");
		return $sql->result();
	}


}

