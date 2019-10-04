<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function index()
    {
        $data = array(
            'page' => 'front/page/contact'
        );
		$this->load->view('front/index', $data);
    }
}