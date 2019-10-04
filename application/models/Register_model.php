<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');



class Register_model extends CI_Model {

     private $_mongoDb;
        var $table_club = 'tbl_club';
        var $table_login = 'tbl_login';

	function __construct() {

        parent::__construct();

        $this->load->database();

    }
	
public function insert($tables, $data)
{
    $this->db->insert($tables, $data);
}


	
}

