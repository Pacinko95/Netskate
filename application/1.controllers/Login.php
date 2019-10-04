<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
// session_destroy();
     parent::__construct();

     $this->load->model('Login_model', 'login');

     }


	public function index($data= null)
	{
    	$data['error'] = '';
		$this->load->view('login/main', $data);
	}


	public function cek()
	{

	  $username = $this->input->post('username');
	  $password = $this->input->post('password');
	  $where = array(
	  'username' => $username,
	  'password' => md5($password)
	 );
	 $cek = $this->login->cek($where);
	
	 if(count($cek) > 0){ 
		$data_session = array(
			'id' => $cek->id,
			'nama' => $cek->username,
			'type' => $cek->type,
			'email' => $cek->email


		);

		$log = array(
			'username' => $username,
			'date_start' => date('Y/m/d H:i:s'),
		);
		$this->db->insert('tbl_login_log', $log);
		


	$this->session->set_userdata($data_session);
	if($cek->type == 1){
		$id = $this->login->geteo($_SESSION['email'], $_SESSION['type'] );   
		
		$data = array(
			'id_eo' => $id->id,
			'logo' => $id->img,
			'name_start' => $id->name_eo,
			'nama' => $id->name_eo,
		);
		$this->session->set_userdata($data);
		redirect('eo'); 
	}elseif($cek->type == 2){
		
		$id = $this->login->geteo($_SESSION['email'], $_SESSION['type'] );
		// print_r($id); exit;  
		$data = array(
			'id_club' => $id->id,
			'logo' => $id->img,
			'name_start' => $id->name_club,
		);
		$this->session->set_userdata($data);
		redirect('club');

	}elseif($cek->type == 3){
		$id = $this->login->geteo($_SESSION['email'], $_SESSION['type'] );
		$data = array(
			'id_alete' => $id->id,
			'logo' => $id->img,
			'name_start' => $id->name,
		);
		$this->session->set_userdata($data);
		redirect('athlete');
		
	}else{
		redirect('kantor/Dashboard');
	}
		
	
	

	}else{
	 $data['error'] =  '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Incorrect </strong>Data Enter
                  </div>';
	 $this->load->view('login/main', $data);
	}

		
	}

function logout(){

	$log = array(
		'username' => $_SESSION['nama'],
		'date_close' => date('Y/m/d H:i:s'),
	);
	$this->db->insert('tbl_login_log', $log);
  $this->session->sess_destroy();
  redirect(base_url('login'));
}

public function update_password()
{

	// die(@$_SESSION['id_club']); exit;
	
	$name =  $_SESSION['nama'];
	$pass = $_POST['new_pass'];
$this->db->query("update tbl_users set password=md5('$pass') where username ='$name'");
	if(@$_SESSION['type']  == 1){
		redirect('eo');
	}elseif(@$_SESSION['type']  == 2){
		redirect('club');
	}elseif(@$_SESSION['type']  == 3){
		redirect('athlete');
	}

	
}
}
