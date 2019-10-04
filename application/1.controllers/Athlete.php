<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Athlete extends CI_Controller {
	public function __construct(){
		
		parent::__construct();
		
		$this->load->model('Master_model', 'MMaster');
		$this->load->model('Athlete_Model','MAthlete');
		$this->load->model('Club_model', 'Mclub');
		$this->load->model('Eo_model', 'Meo');
		$this->load->library('form_validation');

		if(empty($_SESSION['nama']) ) {
			$this->session->set_flashdata('flash_data', 'You don\'t have access!');
			return redirect('login');
		}
		
	}

	public function index()
	{
		$data = array(
			'page' => 'athlete/dashboard',
		);

		$this->load->view('master_template', $data);
	}
	
	
	public function profil()
	{	
		// print_r( $this->MMaster->get_dcp()); exit;
		$data = array(
			'page' => 'athlete/profil',
			'js' => 'athlete/profil_js',
			'data_class' => $this->MMaster->get_class(),
			'dcp' => $this->MMaster->get_dcp(),
			'data_provinsi' => $this->MMaster->get_provinsi(),
			'data' => $this->MAthlete->get_profil($_SESSION['nama']),
			'data_club' => $this->MMaster->get_club(),
			
		);
		// print_r($data);
		$this->load->view('master_template', $data);
		
	}

	public function reload_profil()
	{	
		// print_r( $this->MMaster->get_dcp()); exit;
		$data = array(
			'page' => 'athlete/profil',
			'js' => 'athlete/profil_js',
			
		);
		// print_r($data);
		$this->load->view('master_template', $data);
		
	}

	public function invoice()
	{
		$data = array(
			'page' => 'athlete/invoice',
		);

		$this->load->view('master_template', $data);

		
	}
	
	public function getKabupaten($id){
		$data=$this->MMaster->get_kabupaten($id);
		echo json_encode($data);
	}

	public function getKecamatan($id){
		$data=$this->MMaster->get_kecamatan($id);
		echo json_encode($data);
	}

	public function getKelurahan($id){
		$data=$this->MMaster->get_kelurahan($id);
		echo json_encode($data);
	}
	public function getClub($id){
		$data=$this->MMaster->get_club($id);
		echo json_encode($data);
	}

	public function getAthlete($email){
		$data=$this->MAthlete->get_data($email);
	}

	public function update()
	{
		$errors= array();
		$file_name = $_FILES['img_file']['name'];
		$file_size =$_FILES['img_file']['size'];
		$file_tmp =$_FILES['img_file']['tmp_name'];
		$file_type=$_FILES['img_file']['type'];
		$expensions= array("jpeg","jpg","png");
		if($file_size > 2097152){
			$errors[]='File size must be excately 2 MB';
		}

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('sex','Sex','required');
		$this->form_validation->set_rules('dob','DOB','callback_checkDateFormat'); 
		$this->form_validation->set_rules('email','Email','required');
		// $this->form_validation->set_rules('address','Address','required');
		// $this->form_validation->set_rules('no_tlp','Phone Number','required');
		$this->form_validation->set_rules('idclass','Class','required|callback_checkclass');
		$this->form_validation->set_rules('id_dicipline','Discipline','required|callback_checkdicipline');
		
		if($this->form_validation->run() != false){
			if(empty($errors)==true && empty($file_size)==false){
				$data = array(
					'img' => 'assets/image/'.$_FILES['img_file']['name'],
					'name' => $_POST['name'],
					'sex' => $_POST['sex'],
					'dob' => $_POST['dob'], 
					'email' =>$_POST['email'],
					'address' => $_POST['address'],
					'no_tlp' => $_POST['no_tlp'],
					'idclass' => $_POST['idclass'],
					'idprovinsi' =>$_POST['idprovinsi'],
					'idkabupaten' =>$_POST['idkabupaten'],
					'idkelurahan' =>$_POST['idkelurahan'],
					'idkecamatan' =>$_POST['idkecamatan'],
					'iddicipline' =>$_POST['id_dicipline'],
				);
				$_SESSION['logo'] = 'assets/image/'.$_FILES['img_file']['name'];
				$this->MAthlete->update($_SESSION['nama'], 	$data);
				
				move_uploaded_file($file_tmp,"assets/image/".$file_name);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				<strong>Success!</strong> Athlete has been updated
				</div>
				');
				redirect('/athlete/profil', 'refresh');

			}else if(empty($errors)==true && empty($file_size)==true){
				$data = array(
					'name' => $_POST['name'],
					'sex' => $_POST['sex'],
					'dob' => $_POST['dob'], 
					'email' =>$_POST['email'],
					'address' => $_POST['address'],
					'no_tlp' => $_POST['no_tlp'],
					'idclass' => $_POST['idclass'],
					'idprovinsi' =>$_POST['idprovinsi'],
					'idkabupaten' =>$_POST['idkabupaten'],
					'idkelurahan' =>$_POST['idkelurahan'],
					'idkecamatan' =>$_POST['idkecamatan'],
					'iddicipline' =>$_POST['id_dicipline'],
				);
				$this->MAthlete->update($_SESSION['nama'], 	$data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				<strong>Success!</strong> Athlete has been updated
				</div>
				');
				redirect('/athlete/profil', 'refresh');
				
			}else{
				print_r($errors);
			}
		}else{
			$this->profil();
		}

		
	}

	

	public function event()
	{
		$data = array(
			'page' => 'athlete/event',
			'data'=> $this->Mclub->get_event(),
		);

		$this->load->view('master_template', $data);

		
	}

	public function eventreg($id_event = null)
	{
		if($_SESSION['type'] == 2){
			$type = $_SESSION['id_club'];
		}elseif($_SESSION['type'] == 3){
			$type = $_SESSION['id_alete'];    
		}
		
                        // echo($type); exit;                

		$data = array(
			'page' => 'athlete/event_registrasi',
			'js' => 'athlete/event_registrasi_js',
			'data'	=> $this->MAthlete->getall($type),
			'get_race' => $this->Meo->get_race(),
			
		);

		$this->load->view('master_template', $data);
	}

	public function checkclass(){
		if ($this->input->post('idclass') === '0')  {
			$this->form_validation->set_message('checkclass', 'Please choose your Classification.');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function checkdicipline(){
		if ($this->input->post('id_dicipline') === '0' || '')  {
			$this->form_validation->set_message('checkdicipline', 'Please choose your Discipline.');
			return FALSE;
		}else{
			return TRUE;

		}
	}

	public function checkDateFormat() {
		if ($this->input->post('dob') === '')  {
			$this->form_validation->set_message('checkDateFormat', 'Please choose your Date of Birth.');
			return FALSE;
		}else{
			return TRUE;

		}
	} 


	// public function validation_form{
	// 	$this->load->helper(array('form', 'url'));
	
	// 					$this->load->library('form_validation');
	
	// 					// $this->form_validation->set_rules('username', 'Username', 'required', alpha_numeric_spaces);
	// 					// $this->form_validation->set_rules('password', 'Password', 'required',
	// 					// array('required'=>'You Must Provide a %s.'));
	// 					// $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
	// 					// $this->form_validation->set_rules('email', 'Email', 'required');
	
	// 					$config = array(
	// 						array(
	// 							'field' => 'name',
	// 							'label' => 'Name',
	// 							'rules' => 'required'
	// 						),
	// 						array(
	// 							'field' => 'password',
	// 							'label' => 'Password',
	// 							'rules' => 'required',
	// 							'errors' => array(
	// 								'required' => 'Your Password Must Provide %s.', 
	// 							),
	// 						),
	// 						array(
	// 							'field' => 'passconf',
	// 							'label' => 'Password Confirmation',
	// 							'rules' => 'required'
	// 						),
	// 						array(
	// 							'field' => 'email',
	// 							'label' => 'Email',
	// 							'rules' => 'required'
	// 						)
	// 					);
	// 					$this->form_validation->set_rules($config);
	
	// 					if ($this->form_validation->run() == FALSE)
	// 					{
	// 							$this->load->view('myform');
	// 					}
	// 					else
	// 					{
	// 							$this->load->view('success');
	// 					}
	// }



}
