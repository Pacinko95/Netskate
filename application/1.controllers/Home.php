<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function __construct(){

     parent::__construct();

     $this->load->model('Home_model', 'Hm');

     
    

     }

	public function index()
	{
        $data = array(
            'page' => 'front/page/home',
            'event' => $this->Hm->get_event(),
        );
		$this->load->view('front/index', $data);
	}

	public function event()
	{
		$data = array(
            'page' => 'front/event',
             'event' => $this->Hm->get_event(),

        );
		$this->load->view('front/index', $data);
	}
}
