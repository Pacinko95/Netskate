<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club extends CI_Controller {


	public function __construct(){

		parent::__construct();

		$this->load->model('Club_model', 'Mclub');
		$this->load->model('Master_model', 'MMaster');
		$this->load->model('Eo_model', 'Meo');
		$this->load->model('Athlete_Model', 'MAtlet');
		$this->load->library('form_validation');

		if(empty($_SESSION['nama']) ) {
			$this->session->set_flashdata('flash_data', 'You don\'t have access!');
			return redirect('login');
		}

	}

	public function index()
	{
		$sexs = $this->MAtlet->count_by('sex', $_SESSION['id_club']);
		$mkus = $this->MAtlet->count_by_mku($_SESSION['id_club']);
		$resSex = array();
		$titlesMku = array();
		$resMku = array();
		foreach($sexs as $bysex) {
			if($bysex->sex == null) {
				$res['name'] = "N/A";
			} else {
				$res['name'] = $bysex->sex;
			}
			$res['y'] = $bysex->total;
			array_push($resSex, $res);
		}

		foreach($mkus as $bymku) {
			array_push($titlesMku, $bymku->name);
			array_push($resMku, $bymku->total);
		}

		$data = array(
			'page' => 'club/dashboard',
			'js' => 'club/dashboard_js',
			'bysexs' => json_encode($resSex, JSON_NUMERIC_CHECK),
			'bymkus' => json_encode($resMku, JSON_NUMERIC_CHECK),
			'bymkustitle' => json_encode($titlesMku),
			'beginner' => $this->db->where('idclass',1)->where('idclub', $_SESSION['id_club'])->get('tbl_atlet')->num_rows(),
			'standard' => $this->db->where('idclass',2)->where('idclub', $_SESSION['id_club'])->get('tbl_atlet')->num_rows(),
			'speed' => $this->db->where('idclass',3)->where('idclub', $_SESSION['id_club'])->get('tbl_atlet')->num_rows(),
			'skatecross' => $this->db->where('idclass',4)->where('idclub', $_SESSION['id_club'])->get('tbl_atlet')->num_rows(),
		);

		$this->load->view('master_template', $data);
	}

	public function profil()
	{

		$data = array(
			'page' => 'club/profil',
			'js' => 'club/profil_js',
			'data' => $this->Mclub->get_profil($_SESSION['id_club']),
		);


		$this->load->view('master_template', $data);
	}

	public function profil_create()
	{

		$data_update = array('email' => $_POST['email'], );
		$where = array('email' => $_SESSION['email'], );
		$this->MMaster->update_data('tbl_users', $data_update, $where);
		$_SESSION['email'] = $_POST['email'];
		// echo rand();
		$errors= array();
		$file_name = 'CL-'.$_FILES['img_file']['name'];
		$file_size =$_FILES['img_file']['size'];
		$file_tmp =$_FILES['img_file']['tmp_name'];
		$file_type=$_FILES['img_file']['type'];
		$expensions= array("jpeg","jpg","png");


		if($file_size > 2097152){
			$errors[]='File size must be excately 2 MB';
		}

		if(empty($errors)==true && empty($file_size)==false){

			$data = array(
				'img' => 'assets/image/'.$file_name,
				'name_club' => $_POST['name_club'],
				'address' => $_POST['address'],
				'no_tlp' => $_POST['no_tlp'],
				'email' => $_POST['email'],
				'coach' => $_POST['coach'],
				'official' => $_POST['official'],

			);
			$_SESSION['logo'] = 'assets/image/'.$file_name;
			$_SESSION['name_start'] = $_POST['name_club'];
			$this->Mclub->update_profil($data);
			move_uploaded_file($file_tmp,"assets/image/".$file_name);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				<strong>Success!</strong> Club has been updated
				</div>
				');
			redirect('/club/profil', 'refresh');

		}else if(empty($errors)==true && empty($file_size)==true){
			$data = array(
				'name_club' => $_POST['name_club'],
				'address' => $_POST['address'],
				'no_tlp' => $_POST['no_tlp'],
				'email' => $_POST['email'],
				'coach' => $_POST['coach'],
				'official' => $_POST['official'],

			);
			$_SESSION['name'] = $_POST['name_club'];
			$_SESSION['name_start'] = $_POST['name_club'];
			$this->Mclub->update_profil($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
				<strong>Success!</strong> Club has been updated
				</div>
				');
			redirect('/club/profil', 'refresh');
		}
		else{
			print_r($errors);
		}
	}

	public function athlete()
	{
		$data = array(
			'page' => 'club/athlete',
			'data'	=> $this->Mclub->getall($_SESSION['id_club']),
		);

		$this->load->view('master_template', $data);
	}

	public function form_athlete($id = null)
	{

		$data = array(
			'data' => $this->Mclub->get_one_atlete($id),
			'page' => 'club/form_athlete',
			'dcp' => $this->Mclub->get_dcp(),
			'class' => $this->Mclub->get_class(),
			'data_provinsi' => $this->MMaster->get_provinsi(),
			'tshirt'=> $this->MMaster->get_tshirt(),
			'shoes'=> $this->MMaster->get_shoes(),
			'js' =>'club/athlete_js',
		);

		$this->load->view('master_template', $data);
	}


	public function training()
	{

		$data = array(
			'page' => 'club/training',
		);

		$this->load->view('master_template', $data);
	}

	public function iuran()
	{
		$data = array(
			'page' => 'club/iuran',
		);

		$this->load->view('master_template', $data);
	}

	public function invoice()
	{
		$data = array(
			'page' => 'club/invoice',
		);

		$this->load->view('master_template', $data);


	}

	public function event()
	{

		$data = array(
			'page' => 'club/event',
			'data'=> $this->Mclub->get_event(),
		);

		$this->load->view('master_template', $data);


	}

	// public function eventreg($id_event = null)
	// {


	// 	if($_SESSION['type'] == 2){
	// 		$type = $_SESSION['id_club'];
	// 		// die($type);
	// 		$data = array(
	// 			'page' => 'club/event_registrasi',
	// 			'js' => 'club/event_registrasi_js',
	// 			'data'	=> $this->Mclub->getall_event($type, $id_event),
	// 			'get_race' => $this->Meo->get_race(),
	// 			// 'id_athlete' => $this->Mclub->get_athlete($type),

	// 		);
	// 	}elseif($_SESSION['type'] == 3){
	// 		$type = $_SESSION['id_alete'];
	// 		$data = array(
	// 			'page' => 'athlete/event_registrasi',
	// 			'js' => 'athlete/event_registrasi_js',
	// 			'data'	=> $this->Mclub->getall($type, $id_event),
	// 			'get_race' => $this->Meo->get_race(),
	// 			// 'id_athlete' => $this->Mclub->get_athlete($type),

	// 		);
	// 	}
	// 	$this->load->view('master_template', $data);
	// }

	public function eventreg($id_event = null)
	{

		$_SESSION['no_invoice'] = '';


		if($_SESSION['type'] == 2){
			$type = $_SESSION['id_club'];
			//  die($type);
			$data = array(
				'page' => 'club/event_registrasi',
				'js' => 'club/event_registrasi_js',
				'data'	=> $this->Mclub->getall_event($type, $id_event),
				'get_race' => $this->Race_model->all_race($id_event),
				'race' => $this->Race_model->all_race($id_event),
				'mku' => $this->Template_model->get_mku($id_event),
				'select' => $this->Mclub->all_mku_by_event($id_event),

			);
		}elseif($_SESSION['type'] == 3){
			$type = $_SESSION['id_alete'];
			$data = array(
				'page' => 'athlete/event_registrasi',
				'js' => 'athlete/event_registrasi_js',
				'data'	=> $this->Mclub->getall($type, $id_event),
				'get_race' => $this->Race_model->all_race($id_event),
				// 'id_athlete' => $this->Mclub->get_athlete($type),
				'race' => $this->Template_model->get_race($id_event),
				'mku' => $this->Template_model->get_mku($id_event),
			);
		}
		// echo json_encode($data['select']);
		// exit;
		$this->load->view('master_template', $data);
	}

	public function form_athlete_insert($id_athlete = null)
	{


		$errors= array();
		$file_name = 'ACL-'.$_FILES['img_file']['name'];
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
		$this->form_validation->set_rules('no_tlp','Phone Number','required');
		$this->form_validation->set_rules('idclass','Class','required|callback_checkclass');
		$this->form_validation->set_rules('id_dicipline','Discipline','required|callback_checkdicipline');

		if($this->form_validation->run() != false){
			if(empty($errors)==true && empty($file_size)==false){

				$data = array(
					'img' => 'assets/image/'.$file_name,
					'name' => $_POST['name'],
					'dob' => $_POST['dob'],
					'idclass' => $_POST['idclass'],
					'no_tlp' => $_POST['no_tlp'],
					'email' => $_POST['email'],
					'idprovinsi' => $_POST['idprovinsi'],
					'idkabupaten' => $_POST['idkabupaten'],
					'idkecamatan' => $_POST['idkecamatan'],
					'idkelurahan' => $_POST['idkelurahan'],
					'address' => $_POST['address'],
					'idclub' => $_SESSION['id_club'],
					'iddicipline' => $_POST['id_dicipline'],
					'sex' => $_POST['sex'],
					'id_tshirt' => $_POST['id_tshirt'],
					'id_shoes' => $_POST['id_shoes'],
				);


				if(empty($id_athlete)){
					$this->Mclub->save_athlete($data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">
						<strong>Success!</strong> Athlete has been added
						</div>
						');
				}else{
					$this->Mclub->update_athlete( $id_athlete, $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">
						<strong>Success!</strong> Athlete has been updated
						</div>
						');
				}

				move_uploaded_file($file_tmp,"assets/image/".$file_name);
				redirect('/club/athlete', 'refresh');

			}else if(empty($errors)==true && empty($file_size)==true){
				$data = array(
					'name' => $_POST['name'],
					'dob' => $_POST['dob'],
					'idclass' => $_POST['idclass'],
					'no_tlp' => $_POST['no_tlp'],
					'email' => $_POST['email'],
					'idprovinsi' => $_POST['idprovinsi'],
					'idkabupaten' => $_POST['idkabupaten'],
					'idkecamatan' => $_POST['idkecamatan'],
					'idkelurahan' => $_POST['idkelurahan'],
					'address' => $_POST['address'],
					'idclub' => $_SESSION['id_club'],
					'iddicipline' => $_POST['id_dicipline'],
					'sex' => $_POST['sex'],
					'id_tshirt' => $_POST['id_tshirt'],
					'id_shoes' => $_POST['id_shoes'],
				);

				if(empty($id_athlete)){

					$this->Mclub->save_athlete($data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					<strong>Success!</strong> Athlete has been added.
					</div>
					');
				}else{
					$this->Mclub->update_athlete( $id_athlete, $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					<strong>Success!</strong> Athlete has been updated.
					</div>
					');
				}



				redirect('/club/athlete', 'refresh');
			} else {
				print_r($errors);
			}
		}else{
			$this->form_athlete(null);
		}

	}

	public function temp_event()
	{
	// $data = array('id_club' => $_POST[''], );
		echo json_encode($_POST);
	}
	public function create_event()
	{
		print_r($_POST);


	// foreach($_POST['select'] as $d){
	// 	// foreach($_POST['select'] as $r){
	// 	// 	echo	$d.$r.'<br>';
	// 	// }

	// echo	$d.'='.'<br>';
	// }
	}

	public function reload_race_template($id_mku) {
	// $id_mku = $_POST['id_mku'];
		$data = $this->MMaster->get_race_template($id_mku);
		echo json_encode($data);
	}

	public function data_picchart()
	{
		$id_club = $_SESSION['id_club'];
		$data = $this->db->query("select sex  as name, count(*)  as y
			from tbl_atlet
			where idclub = '$id_club'
			GROUP BY sex")->result();
		echo json_encode($data);
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
			$this->form_validation->set_message('checkdicipline', 'Please choose your Dicipline.');
			return FALSE;
		}else{
			return TRUE;

		}
	}

	public function checkDateFormat() {
		if ($this->input->post('dob') === '')  {
			$this->form_validation->set_message('checkDateFormat', 'Please choose your Birth Of Date.');
			return FALSE;
		}else{
			return TRUE;

		}
	}

	public function delete_athlete($id_athlete = null)
	{
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
					<strong>Success!</strong> Athlete has been deleted
					</div>
					');

		$this->db->delete('tbl_atlet', array('id' => $id_athlete));
		$this->athlete();
	}
}
