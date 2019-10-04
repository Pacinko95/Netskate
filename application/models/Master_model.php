<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Master_model extends CI_Model {

 private $_mongoDb;
 var $table = 'tbl_atlet';
 function __construct() {

    parent::__construct();

    $this->load->database();

}

public function get_class()
{
    return $this->db->where('flag',1)->get('tbl_class')->result();
}

public function get_mku()
{
    return $this->db->where('flag',1)->get('tbl_mku')->result();
}

public function get_race()
{
    return $this->db->get('tbl_mku')->result();
}

public function get_club()
{
    return $this->db->get('tbl_club')->result();
}

public function get_provinsi()
{
    return $this->db->get('tbl_provinsi')->result();
}

public function get_kabupaten($id)
{
    return $this->db->where('idprovinsi', $id)->get('tbl_kabupaten')->result();
}

public function get_kecamatan($id)
{
    return $this->db->where('idkabupaten',$id)->get('tbl_kecamatan')->result();
}

public function get_kelurahan($id)
{
    return $this->db->where('idkecamatan',$id)->get('tbl_kelurahan')->result();
}

public function event()
{
   return $this->db->where('end_reg >','(now() + INTERVAL 1 DAY')->get('tbl_event')->row();
}

// public function get_race_template($id_mku)
// {
//     return $this->db->where(array('id_mku'=>$id_mku))->get('tbl_race_template')->result();
// }

public function get_dcp()
{
    return $this->db->get('tbl_dicipline')->result();
}

public function no_invoice()
{
    $data ="SELECT 
    CASE
    WHEN id < 9 THEN CONCAT(DATE_FORMAT(now(),'%d%m%y'),'100',id+1)
    WHEN id <99 THEN CONCAT(DATE_FORMAT(now(),'%d%m%y'),'10',id+1)
    WHEN id <999 THEN CONCAT(DATE_FORMAT(now(),'%d%m%y'),'1',id+1)
    WHEN id <9999 THEN CONCAT(DATE_FORMAT(now(),'%d%m%y'),id+1)
    ELSE '0'
    END as noinvoice
    FROM tbl_invoice ORDER BY id DESC limit 1";

    return $this->db->query($data)->row();
}

public function get_races()
{
    return $this->db->where('flag' , 1)->get('tbl_race')->result();
}

// public function get_nomor($code_invoice = null)
// {
//     return $this->db->query("SELECT  a.bib ,( a.bib + 1) as  no_bib
//         FROM tbl_invoice_detail a
//         LEFT JOIN tbl_invoice b ON a.code_invoice = a.code_invoice
//         where b.code_invoice ='$code_invoice'  group by a.id_athlete 
//         ORDER BY a.bib DESC  limit 1")->row();
// }

public function get_nomor($code_invoice = null)
{
    $get = $this->db->where('code_invoice', $code_invoice)->get('tbl_invoice')->row();

    $id_event =  $get->id_event;

   if($id_event > 1){
   $sql = $this->db->query("SELECT  b.bib, FLOOR(b.bib +1) as  no_bib FROM tbl_invoice a
                            LEFT JOIN tbl_invoice_detail b ON a.code_invoice = b.code_invoice
                            WHERE a.id_event ='$id_event'   ORDER BY b.bib DESC Limit 1")->row();
   }else{
    return $this->db->query("SELECT  a.bib ,( a.bib + 1) as  no_bib
    FROM tbl_invoice_detail a
    LEFT JOIN tbl_invoice b ON a.code_invoice = a.code_invoice
    where b.code_invoice ='$code_invoice'  group by a.id_athlete 
    ORDER BY a.bib DESC  limit 1")->row();
   }


    return $sql;


}

public function get_athlete_detail($code_invoice = null)
{
    return $this->db->query("SELECT id_athlete  FROM tbl_invoice_detail WHERE code_invoice ='$code_invoice' GROUP BY id_athlete")->result();
}

public function save_bib($id_athlete, $no)
{
    $this->db->query("UPDATE tbl_invoice_detail SET bib ='$no' WHERE id_athlete='$id_athlete'");
}

public function update_data($tabel, $data, $where)
{
   $this->db->update($tabel, $data, $where);
}
public function get_tshirt()
{
    return $this->db->where('flag','1')->get('tbl_tshirt')->result();
}

public function get_shoes()
{
    return $this->db->where('flag','1')->get('tbl_tshoes')->result();
}

public function insert($table, $data)
{
    $this->db->insert($table, $data);
}
}