<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	
	public function __construct(){

		parent::__construct();

		$this->load->model('Register_model', 'register');

	}


	public function index()
	{
		$data = '';
		$this->load->view('register/main', $data);
	}

	public function cek()
	{

		
		$this->register->save($_POST);
		
	}

	public function create()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('no_tlp', 'No Hp', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register/main');
		}
		else
		{
			$type = $_POST['optionsRadios'];
			$users = array('username' => $_POST['username'], 
				'email' => $_POST['email'], 
				'password' => md5($_POST['password']),
				'type' =>	$_POST['optionsRadios'], 
				'flag' =>	'1',
			);

			if($type == 2){
				$profil = array('name_club' => $_POST['name'],
				'email' => $_POST['email'],
				'no_tlp' => $_POST['no_tlp'],
			);
			}else{
				$profil = array('name' => $_POST['name'],
				'email' => $_POST['email'],
				'no_tlp' => $_POST['no_tlp'],
			);
			}
			

			$this->register->insert('tbl_users', $users);

			if($type == 1){
				$this->register->insert('tbl_eo', $profil);
			}elseif($type == 2){
				$this->register->insert('tbl_club', $profil);
			}else{
				$this->register->insert('tbl_atlet', $profil);
			}	
			redirect('login');
		}

		
	}
}
