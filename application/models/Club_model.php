<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Club_model extends CI_Model {

 private $_mongoDb;
 var $table_club = 'tbl_club';
 var $table_login = 'tbl_login';
 var $table_athlete = 'tbl_atlet';

 function __construct() {

    parent::__construct();

    $this->load->database();

}

public function insert($tables, $data)
{
    $this->db->insert($tables, $data);
}

public function getall($id_club = null , $id_event = null)
{
    if($_SESSION['type'] == 2){
      $query =   $this->db->query("SELECT a.id, a.name, DATE_FORMAT(a.dob, '%d/%m/%Y') as dob,
        (YEAR(now())- YEAR(dob) ) as mku ,
        d.name as mkuname,
        b.name as idclass,

        d.id_class,
        d.id as id_mku ,
        c.name as id_dicipline , a.sex
        FROM tbl_atlet a
        LEFT JOIN tbl_class b on a.idclass  = b.id
        LEFT JOIN tbl_dicipline c on a.iddicipline = c.id
        LEFT JOIN tbl_mku d on a.idclass = d.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
        WHERE idclub='$id_club' group BY a.id");
  }elseif($_SESSION['type'] == 3){
   $query =   $this->db->query("SELECT a.id, a.name, DATE_FORMAT(a.dob, '%d/%m/%Y') as dob,
    (YEAR(now())- YEAR(dob) ) as mku ,
    d.name as mkuname,
    b.name as idclass,

    d.id_class,
    d.id as id_mku ,
    c.name as id_dicipline , a.sex
    FROM tbl_atlet a
    LEFT JOIN tbl_class b on a.idclass  = b.id
    LEFT JOIN tbl_dicipline c on a.iddicipline = c.id
    LEFT JOIN tbl_mku d on a.idclass = d.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
    WHERE a.id='$id_club' AND  a.id NOT IN(select aa.id_athlete from tbl_invoice_detail aa LEFT JOIN tbl_invoice bb ON aa.code_invoice = bb.code_invoice WHERE bb.id_event='$id_event') GROUP BY a.id");
}




 // AND a.id NOT IN(select id_athlete from tbl_invoice_detail )



return $query->result();
}


// public function getall_event($id_club = null )
// {
//     if($_SESSION['type'] == 2){
//       $query =   $this->db->query("SELECT a.id, a.name, DATE_FORMAT(a.dob, '%d/%m/%Y') as dob,
//         (YEAR(now())- YEAR(dob) ) as mku , concat('Rp ', format( b.price, 0)) as price,
//         d.name as mkuname,
//         b.name as idclass,

//         d.id_class,
//         d.id as id_mku ,
//         c.name as id_dicipline , a.sex ,
//         CASE
//         WHEN a.id IN ( SELECT id_athlete FROM tbl_invoice_detail ) THEN
//         1 ELSE 0
//         END AS id_athlete
//         FROM tbl_atlet a
//         LEFT JOIN tbl_class b on a.idclass  = b.id
//         LEFT JOIN tbl_dicipline c on a.iddicipline = c.id
//         LEFT JOIN tbl_mku d on a.idclass = d.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
//         WHERE idclub='$id_club'");
//        // AND a.id NOT IN(select id_athlete from tbl_invoice_detail )
//   }elseif($_SESSION['type'] == 3){
//    $query =   $this->db->query("SELECT a.id, a.name, DATE_FORMAT(a.dob, '%d/%m/%Y') as dob,
//     (YEAR(now())- YEAR(dob) ) as mku ,  concat('Rp ', format( b.price, 0)) as price,
//     d.name as mkuname,
//     b.name as idclass,

//     d.id_class,
//     d.id as id_mku ,
//     c.name as id_dicipline , a.sex
//     FROM tbl_atlet a
//     LEFT JOIN tbl_class b on a.idclass  = b.id
//     LEFT JOIN tbl_dicipline c on a.iddicipline = c.id
//     LEFT JOIN tbl_mku d on a.idclass = d.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
//     WHERE a.id='$id_club' ");
//      // AND a.id NOT IN(select id_athlete from tbl_invoice_detail )
// }
// return $query->result();
// }


public function getall_event($id_club = null, $id_event = null )
{


    if($_SESSION['type'] == 2){
      $query =   $this->db->query("SELECT a.id, a.name, DATE_FORMAT(a.dob, '%d/%m/%Y') as dob,
        (YEAR(now())- YEAR(dob) ) as mku , concat('Rp ', format( b.price, 0)) as price,
        d.name as mkuname,
        b.name as idclass,
        d.id_mku as id_mku_list,
        d.id_class,
        d.id as id_mku ,
        c.name as id_dicipline , a.sex ,
        CASE
        WHEN a.id IN ( SELECT id_athlete FROM tbl_invoice_detail ) THEN
        1 ELSE 0
        END AS id_athlete , d.id_mku as l_id_mku
        FROM tbl_atlet a
        LEFT JOIN tbl_class b on a.idclass  = b.id
        LEFT JOIN tbl_dicipline c on a.iddicipline = c.id
        LEFT JOIN tbl_mku d on a.idclass = d.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
        WHERE idclub='$id_club' AND d.id_event = '$id_event' AND a.id
        NOT IN(SELECT b.id_athlete FROM tbl_invoice a
        LEFT JOIN tbl_invoice_detail b ON a.code_invoice = b.code_invoice
        WHERE id_event ='$id_event') ");
       // AND a.id NOT IN(select id_athlete from tbl_invoice_detail )
  }elseif($_SESSION['type'] == 3){
   $query =   $this->db->query("SELECT a.id, a.name, DATE_FORMAT(a.dob, '%d/%m/%Y') as dob,
    (YEAR(now())- YEAR(dob) ) as mku ,  concat('Rp ', format( b.price, 0)) as price,
    d.name as mkuname,
    b.name as idclass,

    d.id_class,
    d.id as id_mku ,
    c.name as id_dicipline , a.sex
    FROM tbl_atlet a
    LEFT JOIN tbl_class b on a.idclass  = b.id
    LEFT JOIN tbl_dicipline c on a.iddicipline = c.id
    LEFT JOIN tbl_mku d on a.idclass = d.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
    WHERE a.id='$id_club' AND d.id_event = '$id_event' ");
     // AND a.id NOT IN(select id_athlete from tbl_invoice_detail )
}
return $query->result();
}


public function get_one_atlete($id)
{
    return $this->db->select('*, ( YEAR(CURDATE())  - YEAR(dob)) as age')->where('id', $id)->get('tbl_atlet')->row();
}

public function get_event()
{
    $date =  date('Y-m-d');
    // return $this->db->where('end_reg <=', $date)->get('tbl_event')->result();
    // return $this->db->get('tbl_event')->result();
    return $this->db->query("SELECT * FROM tbl_event WHERE flag='1' order by id DESC")->result();
}

public function get_profil($id_club)
{
   return $this->db->where('id',$id_club)->get($this->table_club)->row();
}

public function update_profil($data)
{
    return $this->db->where('id', $_SESSION['id_club'])->update($this->table_club, $data);
}

public function save_athlete($data)
{
    $this->db->insert($this->table_athlete, $data);
}

public function update_athlete($id_athlete, $data)
{
    return $this->db->where('id', $id_athlete)->update($this->table_athlete, $data);
    // $this->db->insert($this->table_athlete, $data);
}

public function get_dcp()
{
    return $this->db->get('tbl_dicipline')->result();
}
public function get_class()
{
    return $this->db->get('tbl_class')->result();
}
public function all_mku_by_event($id_event = null)
{
    // return $this->db->query("SELECT id_class, name, id_event, id_mku FROM tbl_mku WHERE id_event='$id_event'")->result();
    $sql = $this->db->query("SELECT b.id_class, b.name, b.id_event, b.id_mku,
	(SELECT  GROUP_CONCAT(a.id_mku separator ', ')  FROM tbl_mku a  WHERE a.id_event='$id_event' AND a.id_class = b.id_class AND b.id_mku != a.id_mku GROUP BY a.id_class ) as all_mku
	FROM tbl_mku b WHERE b.id_event='$id_event'");
    return $sql->result();
}
public function group_concat($id_event = null)
{
    return $this->db->query("SELECT a.id_class, a.name ,  GROUP_CONCAT(a.id_mku separator ',') FROM tbl_mku a WHERE a.id_event='$id_event' ")->result();
}



}
