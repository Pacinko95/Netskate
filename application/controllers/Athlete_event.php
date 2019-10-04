<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Athlete_event extends CI_Controller {

	
	public function __construct(){

		parent::__construct();

		$this->load->model('Club_model', 'Mclub');
		$this->load->model('Master_model', 'MMaster');
		$this->load->model('Eo_model', 'Meo');
		$this->load->model('Invoice_model','Minvoice');
		
		if(empty($_SESSION['nama']) ) {
			$this->session->set_flashdata('flash_data', 'You don\'t have access!');
			return redirect('login');
		}

	}

	public function create_event($id_event = null)
	{

		if($_SESSION['type'] == 2){
			$type = $_SESSION['id_club'];
		}elseif($_SESSION['type'] == 3){
			$type = $_SESSION['id_alete'];    
		}

		// $no_invoice = $this->MMaster->no_invoice();


		  $no_invoice = $this->MMaster->no_invoice();

		  if(@$no_invoice->noinvoice == ''){
		  $no=  date('dmy').'1001';
		  }else{
		  $no = $no_invoice->noinvoice;
		  }
 
	
		if(!empty($_POST['race'])){
			$invoice  = array('code_invoice' => $no,
				'create_date' => date('Y-m-d'),
				'create_by' => $_SESSION['nama'],
				'id_event' => $id_event,
				'id_athlete'=> $type,
				'status'=> '1' );
			$this->Minvoice->insert('tbl_invoice', $invoice);
 	// print_r($invoice);
			foreach($_POST['race'] as $p){
				$n = explode(",", $p);
				$invoice_list = array('id_race' => $n['0'],
					'id_athlete' => $n['1'],
					'id_mku' =>$n['2'],
					'code_invoice' => $no,
				);
				 $this->Minvoice->insert('tbl_invoice_detail', $invoice_list);
				 // 	print_r($invoice_list);
			}
		
			redirect('invoice','refresh');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">
				<strong>Error!</strong> Please choose the categories you want to register.
				</div>
				');
			redirect('athlete/eventreg/'.$id_event,'refresh');
		}

	}

}
