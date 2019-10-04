<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atlet extends CI_Controller {

	
	public function __construct(){

     parent::__construct();

     if(empty($_SESSION['nama']) ) {
        $this->session->set_flashdata('flash_data', 'You don\'t have access!');
        return redirect('login');
    }
     }

	public function index()
	{
		$data = array(
            'page' => 'front/page/atlet',
        );

        $this->load->view('front/index', $data);
    }

    public function insertatlet(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $logo = $_POST['logo'];
        $no_tlp = $_POST['no_tlp'];
        // $id_club = $_POST['id_club'];
        $data = array(
            'name' => $name,
            'email' => $email,
            'logo' => $logo,
            'no_tlp' => $no_tlp,
            // 'id_club' => $id_club
        );
        $res = $this->master_model->insertatlet('tbl_atlet',$data);
        if($res>=1){

        }else{

        }

    }

}
