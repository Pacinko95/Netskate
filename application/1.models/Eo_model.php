<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Eo_model extends CI_Model {

	private $_mongoDb;
	function __construct() {

		parent::__construct();

		$this->load->database();

	}
	
	public function get_data($data)
	{
		return $this->db->query("SELECT * FROM tbl_event WHERE id_eo ='$data' ORDER BY id DESC")->result();
		// $this->db->where('id_eo',$data)->get('tbl_event')->result();
	}


	public function get_profil($nama){
		return $this->db->where('email',$nama)->get('tbl_eo')->row();
	}

	public function update($email, $data)
	{

		return $this->db->where('email', $email)->update('tbl_eo', $data);
	}

	public function insert_event($data)
	{
 
		return $this->db->insert('tbl_event', $data);
	}

	public function get_class()
	{
		return $this->db->query("SELECT a.id,b.name, a.name as mku, a.age_start, a.age_end   FROM tbl_mku a
			LEFT JOIN tbl_class b on a.id_class = b.id
			ORDER BY a.id_class ASC, a.name asc")->result();
	}

	public function get_race()
	{
		return $this->db->where('flag', 1)->get('tbl_race')->result();
	}

	public function save_detail($id_event = null)
	{
		print_r($_POST);
	}

	public function save_rece($data)
	{
		return $this->db->insert('tbl_t_event', $data);
	}

	public function get_race_val($id_event = null)
	{
		$query =  $this->db->query("
			SET @sQuery = NULL;
			SELECT
			GROUP_CONCAT(DISTINCT
			CONCAT(
			'(case when id_race = ''',
			id_race,
			''' then 1 else 0 end) AS ',
			CONCAT(\"'\",id_race,\"'\")
			)
			) INTO @sQuery
			from tbl_t_event;

			SET @sQuery = CONCAT('SELECT e.id_class, ', @sQuery, ' from tbl_t_event e 
			group by e.id_class, e.id_race');

			PREPARE stmt FROM @sQuery;
			EXECUTE stmt;
			DEALLOCATE PREPARE stmt;
			")->result();
		return $query;
	}

	public function get_class_()
	{
		return $this->db->get('tbl_class')->result();
	}
	public function insert($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function get_t_event($id_class, $id_race){
		$array = array('id_class =' => $idclass, 'id_race' => $id_race);
		return $this->db->where($array)->get('tbl_t_event')->result;
	}

	public function get_data_price($id_event = null)
	{

		$query = $this->db->join('tbl_class b','a.id_class = b.id','LEFT')->select('a.id,b.name, a.price')->where('id_event', $id_event)->get('tbl_class_price a')->result();

		return $query;
	}

	public function invoice($id_eo='')
	{
		return $this->db->query("SELECT count(*) as approvelinvoice FROM tbl_event a
			LEFT JOIN tbl_invoice b ON a.id = b.id_event
			WHERE a.id_eo ='$id_eo' and b.`status`='4'")->row();
	}

	public function invoice_not($id_eo='')
	{
		return $this->db->query("SELECT count(*) as approvelinvoice FROM tbl_event a
			LEFT JOIN tbl_invoice b ON a.id = b.id_event
			WHERE a.id_eo ='$id_eo' and b.`status`='2'")->row();
	}
	
	public function get_club($id_eo='')
	{
		return $this->db->query("SELECT count(*) as club FROM tbl_event a
			LEFT JOIN tbl_invoice b ON a.id = b.id_event
			WHERE a.id_eo ='$id_eo' and b.status ='1' ")->row();
	}
}

