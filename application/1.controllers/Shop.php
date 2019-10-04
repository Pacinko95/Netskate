<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	
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
  			'page' => 'shop/shop_main',
  		


  		);

  		$this->load->view('master_template', $data);
	}


		
	
}
