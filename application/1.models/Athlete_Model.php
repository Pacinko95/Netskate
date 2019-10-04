<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Athlete_Model extends CI_Model {

     private $_mongoDb;
     function __construct() {

        parent::__construct();

        $this->load->database();

    }
	
	public function count_by($field, $id_club) {
		$query = "SELECT a.".$field.", COUNT(*) as total FROM tbl_atlet a WHERE a.idclub=".$id_club." GROUP BY a.".$field;
		return $this->db->query($query)->result();
	}
	
	public function count_by_mku($id_club) {
		$query = "SELECT d.name, COUNT(*) as total FROM tbl_atlet a LEFT JOIN tbl_mku d on a.idclass = d.id_class AND  (YEAR(now())- YEAR(a.dob) ) 
		BETWEEN d.age_start AND d.age_end WHERE idclub=".$id_club." GROUP BY d.name ORDER BY d.id_class ASC";
		return $this->db->query($query)->result();
	}

    public function getall($id_club = null )
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
                            WHERE idclub='$id_club'");
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
                            WHERE a.id='$id_club'");   
        }


    
    

return $query->result();
}
	
public function get_data($data)
{
    return $this->db->where('email',$data)->get('tbl_atlet')->result();
}


public function get_profil($nama){
	return $this->db->where('email',$nama)->get('tbl_atlet')->row();
}

public function update($email, $data)
{
	return $this->db->where('email', $email)->update('tbl_atlet', $data);
}	

public function get_dcp()
{
    return $this->db->get('tbl_dicipline')->result();
}
}

