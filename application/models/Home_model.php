<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Home_model extends CI_Model {

 private $_mongoDb;
 function __construct() {

    parent::__construct();

    $this->load->database();

}

public function get_event()
{
    // return $this->db->where('flag', 1)->get('tbl_event')->result();
    $sql = $this->db->query("SELECT * FROM tbl_event WHERE flag =1 ORDER BY id DESC")->result();
    return $sql;
}

public function get_detail_event($id_event = null)
{
	return $this->db->where('id', $id_event)->get('tbl_event')->row();
}

public function get_sponsor($id_event = null)
{
	return $this->db->where('id_event',$id_event)->get('tbl_sponsor')->result();
}

public function get_count_club($id_event = null){
    return $this->db->query("SELECT count(*) as club FROM tbl_invoice
        where id_event ='$id_event' AND `status`='4' AND id_club is not null
        ")->row();
}

public function get_count_athlete($id_event = null)
{
    return $this->db->query("select   count(DISTINCT a.id_athlete) as athlete FROM tbl_invoice_detail a
        LEFT JOIN tbl_invoice b ON a.code_invoice = b.code_invoice
        WHERE b.id_event ='$id_event' AND `status`='4' 
        ")->row();
}


public function get_athlete($id_event = null)
{
    return $this->db->query("SELECT b.bib, b.id as id_athlete, a.code_invoice, c.name,  DATE_FORMAT(c.dob, '%d/%m/%Y') as dob ,d.name as name_class, e.name as name_diciplin, f.name as mku, c.sex,  CASE 
        WHEN a.id_club is null THEN  '-'  ELSE g.name_club END as name_club
        FROM tbl_invoice a
        LEFT JOIN tbl_invoice_detail b ON a.code_invoice = b.code_invoice
        LEFT JOIN tbl_atlet c ON b.id_athlete = c.id
        LEFT JOIN tbl_class d ON c.idclass = d.id
        LEFT JOIN tbl_dicipline e ON c.iddicipline = e.id
        LEFT JOIN tbl_mku f ON b.id_mku = f.id_mku
        LEFT JOIN tbl_club g ON a.id_club = g.id
        where a.id_event ='$id_event' AND `status`='4' GROUP BY b.id_athlete
        ")->result();
}

} 

