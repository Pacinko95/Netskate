<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Template_model extends CI_Model {

 private $_mongoDb;
 var $table = 'tbl_templates';
 function __construct() {

    parent::__construct();

    $this->load->database();

}

// public function get_races($id_eo = null)
// {
//     return $this->db->query("SELECT b.id, b.name, a.id_template from tbl_event a
//     LEFT JOIN tbl_mku_template c ON a.id_template = c.id_template
//     LEFT JOIN tbl_race b ON b.id = c.id_race
//     where a.id_eo='$id_eo' GROUP BY b.id")->result();

// }

public function get_races($id_eo = null)
{
    return $this->db->query("SELECT b.id, b.name, a.id_template from tbl_event a
    LEFT JOIN tbl_mku_template c ON a.id_template = c.id_template
    LEFT JOIN tbl_race b ON b.id = c.id_race
    where a.id_eo='$id_eo' AND b.flag='1' GROUP BY b.id")->result();

}

public function get_race_template($id_eo = null)
{
    // return $this->db->query("SELECT b.id, b.name, a.id_template from tbl_event a
    // LEFT JOIN tbl_mku_template c ON a.id_template = c.id_template
    // LEFT JOIN tbl_race b ON b.id = c.id_race
    // where a.id_eo='$id_eo' GROUP BY b.id")->result();

    $sql = $this->db->where('id_eo', $id_eo)->where('flag', 1)->get('tbl_race')->result();
   return $sql;
}

public function get_list_mku($id_eo)
{
    $query  = $this->db->query("SELECT a.id, b.name as name_class, a.name as name_mku FROM tbl_mku_list a
                                LEFT JOIN tbl_class b ON a.id_class = b.id
                                where a.id_eo ='$id_eo' AND a.flag = 1
                                ORDER BY  b.id asc ");
    return $query->result();
}

public function get_templates($id_eo)
{
    return $this->db->where('flag' , 1)->where('id_eo', $id_eo)->get('tbl_templates')->result();
}

public function get_mku_template($id_template){
	$sql = $this->db->query("SELECT b.name, b.age_start, b.age_end, b.id_class, b.id_eo
										FROM tbl_mku_template a
										LEFT JOIN tbl_mku_list b on b.id = a.id_mku
										WHERE a.id_template = '$id_template'
									")->result();
	return $sql;
}

public function get_race($id_event = null){
    $sql = $this->db->query("SELECT c.name FROM tbl_event a
    LEFT JOIN tbl_mku_template b ON a.id_template = b.id_template
    LEFT JOIN tbl_race c on b.id_race = c.id
    WHERE a.id= '$id_event' ORDER BY c.name ASC ")->result();
    return $sql;
}


public function mku_template($id_template = null){
    $sql = $this->db->where('id_template', $id_template)->get('tbl_mku_template')->result();
    return $sql;
}

// public function dropdown_mku($id_template = null)
// {
//     $sql =  $this->db->query("SELECT d.id as id_class, d.name as name_class, c.id as id_mku, c.name as name_mku, b.id_eo, b.id as id_template from tbl_mku_template a
//     LEFT JOIN tbl_templates b ON a.id_template = b.id
//     LEFT JOIN tbl_mku c ON a.id_mku = c.id
//     LEFT JOIN tbl_class d ON c.id_class = d.id
//     WHERE a.id_template = '$id_template' group by d.id ");
//     return $sql->result();
// }

// update

public function dropdown_mku($id_template = null)
{
    $sql =  $this->db->query("SELECT d.id as id_class, d.name as name_class, c.id as id_mku, c.name as name_mku, b.id_eo, b.id as id_template from tbl_mku_template a
    LEFT JOIN tbl_templates b ON a.id_template = b.id
    LEFT JOIN tbl_mku_list c ON a.id_mku = c.id
    LEFT JOIN tbl_class d ON c.id_class = d.id
    WHERE a.id_template = '$id_template' group by d.id ");
    return $sql->result();
}

// public function get_mku($id_event = null){
//     $sql = $this->db->query("SELECT id FROM tbl_mku a WHERE a.id_event ='$id_event'");
//     return $sql->result();
// }

public function get_mku($id_event = null){
    $sql = $this->db->query("SELECT concat(b.id_mku, '-', b.id_race) as strconcat FROM tbl_event a
    LEFT JOIN tbl_mku_template b ON a.id_template = b.id_template
    WHERE a.id='$id_event'");
    return $sql->result();
}


public function get_count_event($id_event = null){
    $sql = $this->db->query("SELECT id, id_template FROM tbl_event ORDER BY id desc limit 1");
    return $sql->row();
}


public function get_all_mku($id_template = null){
    $sql = $this->db->query("SELECT b.* FROM tbl_mku_template a
    LEFT JOIN tbl_mku_list b ON a.id_mku = b.id
    where id_template ='$id_template' group by b.id ");
    return $sql->result();
    // id_template ='$id_template'
}

public function get_template_list($id = null){
    $sql = $this->db->query("SELECT CONCAT(id_mku,'-',id_race) as mr FROM tbl_mku_template  WHERE id_template = '$id'");
    return $sql->result();
}

public function template_detail($id = null){
    $sql = $this->db->query("select * from tbl_templates where id = '$id'");
    return $sql->row();
}

public function get_rp($id_template = null){
    $sql = $this->db->query("SELECT a.id_race, a.id_mku, b.name,  b.rp FROM tbl_mku_template a
    LEFT JOIN tbl_race b ON a.id_race = b.id
    WHERE a.id_template='$id_template' AND b.rp =1
    GROUP BY a.id_race
UNION
SELECT a.id_race, a.id_mku, CONCAT(b.name,' ', '(<b>Team</b>)') as  name ,  b.team as rp FROM tbl_mku_template a
    LEFT JOIN tbl_race b ON a.id_race = b.id
    WHERE a.id_template='$id_template' AND b.team =1
    GROUP BY a.id_race");
    return $sql->result();
}

public function get_athlete($id_event = null, $no_invoice = null){
    $sql = $this->db->query("SELECT a.id_athlete, b.name, b.sex, c.name AS name_class FROM tbl_invoice_detail a
                            LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
                            LEFT JOIN tbl_class c ON b.idclass = c.id
                            WHERE code_invoice='$no_invoice' GROUP BY a.id_athlete ORDER BY b.name ASC");
    //
    // $sql = $this->db->query("SELECT a.id_athlete, b.name, b.sex, c.name AS name_class,  d.name as mkuname FROM tbl_invoice_detail a
    //                         LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
    //                         LEFT JOIN tbl_class c ON b.idclass = c.id
    //                         LEFT JOIN tbl_mku d on b.idclass = d.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN d.age_start AND d.age_end
    //                         WHERE code_invoice='$no_invoice' GROUP BY a.id_athlete ORDER BY b.name ASC");
    return $sql->result();
}


public function get_invoice($id_event = null){

    $sql = $this->db->query("SELECT id, code_invoice FROM tbl_invoice WHERE id_event ='$id_event' GROUP by id  ORDER BY id DESC  limit 1")->row();
    return $sql;
}

public function get_athlete_team($no_invoice = null){
    // $sql = $this->db->query("SELECT a.id_athlete, b.name, b.sex, c.name AS name_class, a.id_race, d.team FROM tbl_invoice_detail a
    // LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
    // LEFT JOIN tbl_class c ON b.idclass = c.id
    // LEFT JOIN tbl_race d ON a.id_race = d.id
    // WHERE code_invoice='$no_invoice' AND d.team ='1' ORDER BY b.name ASC");

    // $sql = $this->db->query("SELECT a.id_athlete, b.name, b.sex, c.name AS name_class, a.id_race, d.team,  e.name as mkuname
    //   FROM tbl_invoice_detail a
    // LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
    // LEFT JOIN tbl_class c ON b.idclass = c.id
    // LEFT JOIN tbl_race d ON a.id_race = d.id
    //      LEFT JOIN tbl_mku e on b.idclass = e.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN e.age_start AND e.age_end
    // WHERE code_invoice='$no_invoice' AND d.team ='1' GROUP BY a.id_athlete ORDER BY b.name ASC");

    $sql = $this->db->query("SELECT a.id_athlete, b.name, b.sex, c.name AS name_class, a.id_race, d.team,  
    (SELECT mm.name FROM tbl_invoice_detail m    LEFT JOIN tbl_mku mm ON m.id_mku = mm.id_mku   WHERE m.code_invoice='$no_invoice' AND m.id_athlete = a.id_athlete GROUP BY m.id_athlete) as mkuname 
    FROM tbl_invoice_detail a
  LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
  LEFT JOIN tbl_class c ON b.idclass = c.id
  LEFT JOIN tbl_race d ON a.id_race = d.id
       LEFT JOIN tbl_mku e on b.idclass = e.id_class AND  (YEAR(now())- YEAR(dob) ) BETWEEN e.age_start AND e.age_end
  WHERE code_invoice='$no_invoice' AND d.team ='1' GROUP BY a.id_athlete ORDER BY b.name ASC");

    return $sql->result();
}


public function insert_data($name_table, $arr){
    $sql = $this->db->insert($name_table, $arr);
    return $sql;
}

// public function get_name_team($no_invoice = null){
//     $sql = $this->db->query("SELECT b.name, b.sex, c.last_name, c.first_name, a.team, d.name as name_class, c.id from tbl_team a
//     LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
//     LEFT JOIN tbl_mku_race c ON a.category = c.id
//     LEFT JOIN tbl_class d ON d.id = c.class
//     where a.no_invoice ='$no_invoice' ORDER BY c.id ASC");
//     return $sql->result();
// }

public function get_name_team($no_invoice = null){
    $sql = $this->db->query("SELECT a.name_team, c.last_name, c.first_name, a.team, d.name as name_class, c.id, count(c.id) as jml
    from tbl_team a
    LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
    LEFT JOIN tbl_mku_race c ON a.category = c.id
    LEFT JOIN tbl_class d ON d.id = c.class
    where a.no_invoice ='$no_invoice'  Group BY c.id HAVING count(c.id) > 1 ORDER BY c.id ASC ");
    return $sql->result();
}

public function get_name_team_print($no_invoice = null){
    $sql = $this->db->query("SELECT a.name_team, c.last_name, c.first_name, a.team, d.name as name_class, c.id, count(c.id) as jml, d.id_eo, e.id_event,
    (SELECT bb.price FROM tbl_race aa LEFT JOIN tbl_race_price bb  ON aa.id = bb.id_race AND aa.team =1 WHERE  bb.id_eo = d.id_eo AND bb.id_event = e.id_event ) as price
        from tbl_team a
        LEFT JOIN tbl_atlet b ON a.id_athlete = b.id
        LEFT JOIN tbl_mku_race c ON a.category = c.id
        LEFT JOIN tbl_class d ON d.id = c.class
        LEFT JOIN tbl_invoice e ON a.no_invoice = e.code_invoice
        where a.no_invoice ='$no_invoice' AND a.name_team !='' Group BY c.id HAVING count(c.id) > 1 ORDER BY c.id ASC");
    return $sql->result();
}

public function get_subname_team($no_invoice = null){
    $sql = $this->db->query("SELECT  bb.name, aa.team
    from tbl_team aa
    LEFT JOIN tbl_atlet bb ON aa.id_athlete = bb.id
    where aa.no_invoice ='$no_invoice'");
    return $sql->result();
}


public function get_count_team($no_invoice = null){
    $sql = $this->db->query("SELECT MAX(team) as max_team FROM tbl_team WHERE no_invoice = '$no_invoice'");
    return $sql->row();
}

public function count_team_price($id_invoice = null){
    $sql = $this->db->query("SELECT
                            FLOOR(
                            (SELECT max(team) from tbl_team WHERE no_invoice='$id_invoice')
                            *
                            (SELECT aa.price FROM tbl_race_price aa LEFT JOIN tbl_race ab ON aa.id_race = ab.id WHERE id_event=a.id_event AND ab.team =1 GROUP BY aa.price)
                            ) as price
                            from tbl_invoice a
                            WHERE a.code_invoice ='$id_invoice'");
    return $sql->row();
}

public function count_race($code_invoice = null ){

$get = $this->db->query("SELECT id_event FROM tbl_invoice WHERE code_invoice	='$code_invoice'")->row();
$id = $get->id_event;

    $sql = $this->db->query("SELECT count( DISTINCT b.id) as count_race, a.img from tbl_event a
                            LEFT JOIN tbl_mku_template c ON a.id_template = c.id_template
                            LEFT JOIN tbl_race b ON b.id = c.id_race
                            where a.id='$id'")->row();
return $sql;
}


public function count_race_print($code_invoice = null ){

$get = $this->db->query("SELECT id_event FROM tbl_invoice WHERE code_invoice	='$code_invoice'")->row();
$id = $get->id_event;

    $sql = $this->db->query("SELECT count( DISTINCT b.id) as count_race, a.img from tbl_event a
                            LEFT JOIN tbl_mku_template c ON a.id_template = c.id_template
                            LEFT JOIN tbl_race b ON b.id = c.id_race
                            where a.id='$id'")->row();
return $sql;
}




public function count_rp_price($code_invoice = null ){


        $sql = $this->db->query("SELECT FLOOR(SUM(b.price)) as count_race FROM tbl_invoice a
        LEFT JOIN tbl_race_price b ON a.id_event = b.id_event
        LEFT JOIN tbl_race c ON b.id_race = c.id
        LEFT JOIN tbl_invoice_detail d ON a.code_invoice = d.code_invoice  AND d.id_race = c.id
        LEFT JOIN tbl_atlet e ON d.id_athlete = e.id
        WHERE a.code_invoice='$code_invoice' AND c.rp =1 ORDER BY c.name ASC")->row();
    return $sql;
    }

    public function count_atlete_class($code_invoice = null ){


        $sql = $this->db->query("SELECT e.name as name_atlete, c.name as name_class, CONCAT('Rp ',b.price) as price FROM tbl_invoice a
                                LEFT JOIN tbl_race_price b ON a.id_event = b.id_event
                                LEFT JOIN tbl_race c ON b.id_race = c.id
                                LEFT JOIN tbl_invoice_detail d ON a.code_invoice = d.code_invoice  AND d.id_race = c.id
                                LEFT JOIN tbl_atlet e ON d.id_athlete = e.id
                                WHERE a.code_invoice='$code_invoice' AND c.rp =1 ORDER BY c.name ASC")->result();
    return $sql;
    }

    public function get_one_team($code_invoice = null ){


        $sql = $this->db->query("SELECT
                                (SELECT aa.price FROM tbl_race_price aa LEFT JOIN tbl_race ab ON aa.id_race = ab.id WHERE id_event=a.id_event AND ab.team =1)
                                as price
                                from tbl_invoice a
                                WHERE a.code_invoice ='$code_invoice'")->row();
    return $sql;
    }

    public function get_count_tbl_team($code_invoice = null ){
        $sql = $this->db->query("SELECT count(*) as count_invoice from tbl_invoice_detail a
        INNER JOIN tbl_race b ON a.id_race = b.id  AND b.team =1
        WHERE a.code_invoice ='$code_invoice'")->row();
    return $sql;
    }

    public function update_no_team($code_invoice = null ){
        $sql = $this->db->query(" UPDATE tbl_invoice SET status ='1', step ='1' WHERE code_invoice='$code_invoice'");
    return $sql;
    }


    public function view_class_rp($id_event = null){
        $sql = $this->db->query("SELECT b.name, floor(a.price) as price  FROM tbl_class_price a
        LEFT JOIN tbl_class b ON a.id_class = b.id
        WHERE id_event ='$id_event'")->result();
        return $sql;
    }

    public function view_team_rp($id_event = null){
        $sql = $this->db->query("SELECT b.id, b.name, a.price, (
            CASE 
                WHEN b.team = '1' THEN 'Team'
                 ELSE ''
            END) AS team FROM tbl_race_price a
        LEFT JOIN tbl_race b ON a.id_race = b.id
        WHERE id_event='$id_event'")->result();
        return $sql;
    }

    public function get_export_data_team($id_event = null){

        $sql = $this->db->query("SELECT aa.no_invoice, aa.name_team, aa.id_athlete, CONCAT(bb.last_name,' ',bb.first_name,' ', cc.name) as category,  dd.name as name_athlete, ee.id_event
        ,(SELECT a.bib FROM tbl_invoice_detail a WHERE a.code_invoice =aa.no_invoice AND a.id_athlete=aa.id_athlete AND a.id_athlete !=''  GROUP BY a.bib) as bib,  ff.name_club as name_club
       FROM tbl_team aa
       LEFT JOIN tbl_mku_race bb ON aa.category = bb.id
       LEFT JOIN tbl_class cc ON cc.id =bb.class 
       LEFT JOIN tbl_atlet dd ON aa.id_athlete = dd.id
       LEFT JOIN tbl_invoice ee ON aa.no_invoice = ee.code_invoice
       LEFT JOIN tbl_club ff ON ee.id_club = ff.id
       WHERE ee.id_event ='$id_event' AND ee.status = '4'");
        return $sql->result();
    }

public function get_one_bib($id_event , $bib )
{
    $sql = $this->db->query("SELECT bib, a.id_athlete, b.id_event, d.name as name_athlete,e.name_club, f.name as name_class, g.name as name_mku, d.sex, a.code_invoice  FROM tbl_invoice_detail a
	LEFT JOIN tbl_invoice b ON b.code_invoice = a.code_invoice 
	LEFT JOIN tbl_race c ON c.id = a.id_race
	LEFT JOIN tbl_atlet d ON a.id_athlete = d.id
	LEFT JOIN tbl_club e ON d.idclub = e.id
	LEFT JOIN tbl_class f ON d.idclass = f.id
	LEFT JOIN tbl_mku g ON a.id_mku = g.id_mku
        WHERE b.id_event = '$id_event' AND a.bib ='$bib' GROUP by a.id_athlete");
    
    return $sql->row();

}

public function get_one_bib_race($id_event , $bib )
{
    $sql = $this->db->query("SELECT bib, a.id_race, c.name, a.id_athlete, a.time, IF(a.ranking IS NULL ,'-',a.ranking) as ranking  FROM tbl_invoice_detail a
    LEFT JOIN tbl_invoice b ON b.code_invoice = a.code_invoice 
    LEFT JOIN tbl_race c ON c.id = a.id_race
    WHERE b.id_event = '$id_event' AND a.bib ='$bib'");
    
    return $sql->result();

}

public function get_detail_event_by_invoice($id_event = null){

    $sql = $this->db->query("SELECT c.id, c.name as name_race , bib, a.id_athlete, b.id_event, d.name as name_athlete,e.name_club, f.name as name_class, g.name as name_mku, d.sex, a.code_invoice  
        FROM tbl_invoice_detail a
        LEFT JOIN tbl_invoice b ON b.code_invoice = a.code_invoice 
        LEFT JOIN tbl_race c ON c.id = a.id_race
        LEFT JOIN tbl_atlet d ON a.id_athlete = d.id
        LEFT JOIN tbl_club e ON d.idclub = e.id
        LEFT JOIN tbl_class f ON d.idclass = f.id
        LEFT JOIN tbl_mku g ON a.id_mku = g.id_mku
        WHERE b.id_event = '$id_event' AND bib !='' GROUP by a.id_athlete");
    return $sql->result();
}

public function get_one_race_event($id_event = null, $id_mku = null){

    $sql = $this->db->query("SELECT b.id_race,c.id_template, d.name from tbl_mku a
    LEFT JOIN tbl_mku_template b ON a.id_mku = b.id_mku
    LEFT JOIN tbl_event c ON c.id = a.id_event 
    LEFT JOIN tbl_race d ON b.id_race = d.id
    WHERE a.id_event='$id_event' AND b.id_mku ='$id_mku' AND c.id_template = b.id_template");
    return $sql->result();
}




}
