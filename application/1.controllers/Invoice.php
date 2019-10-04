<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {


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

public function index()
{
  // die('as');
  if($_SESSION['type'] ==2){
    $id = $_SESSION['id_club'];
  }elseif($_SESSION['type'] ==3){
    $id = $_SESSION['id_alete'];
  }
  $data = array(
    'page' => 'athlete/invoice',
    'data' =>$this->Minvoice->select($id),
  );

  $this->load->view('master_template', $data);
}
 
public function detail($id_invoice = null)
{
  $data = array(
    'page' => 'invoice/invoice_detail',
    'data' =>$this->Minvoice->count_mku_race_price($id_invoice),
    'list' => $this->Minvoice->detaile_price($id_invoice),
    // 'code_payment' => rand(000,999),
    'price_race' => $this->Minvoice->price_race($id_invoice),
    'one' => $this->Minvoice->get_one_price($id_invoice),
    'rek' => $this->Minvoice->rekening($id_invoice),

    // team athlete
    'mku_team' => $this->Template_model->get_name_team($id_invoice),
    'get_sub_athlete' => $this->Template_model->get_subname_team($id_invoice),
    'count_team' =>  $this->Template_model->get_count_team($id_invoice),
    // count team price
    'count_price_team' =>$this->Template_model->count_team_price($id_invoice),
    // price rp
    'price_rp' =>  $this->Template_model->count_rp_price($id_invoice),
    // atlete class
    'count_atlete_class' => $this->Template_model->count_atlete_class($id_invoice),
    // 
    'total' => $this->Minvoice->total_athlete_race_class($id_invoice),



  );

  $this->load->view('master_template', $data);
}

public function price($id_invoice = null)
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

 $history = array('code_invoice' =>$id_invoice ,
   'create_date' => date('Y-m-d'),
   'create_by' =>$_SESSION['nama'],
   'status' => 2 );

 $data =  'assets/invoice/'.$_FILES['img_file']['name'];
 $payment = $_POST['payment'];
 $code_payment = $_POST['code_payment'];
 $datess = date('Y-m-d H:i:s');
 move_uploaded_file($file_tmp,"assets/invoice/".$file_name);
 $this->Minvoice->insert('tbl_invoice_history', $history);
 $this->Minvoice->update($id_invoice, $data, $payment, $code_payment, $datess);
 $this->session->set_flashdata('pesan', '<div class="alert alert-success">
  <strong>Success!</strong> Invoice has been paid, please wait confirmation from the EO
  </div>
  ');
 return redirect('invoice');


}

public function print_invoice($id_invoice = null)
{
 $data = array('invoice' => $this->Minvoice->get_invoice($id_invoice),

   'data_athlete' => $this->Minvoice->count_mku_race_price($id_invoice),
   'race' => $this->Race_model->race_to_invoice($id_invoice),
   'data_invoice' => $this->Minvoice->data_invoices($id_invoice),
   'total' =>$this->Minvoice->detaile_price_print($id_invoice),
    'price_race' => $this->Minvoice->price_race($id_invoice),
    'one' => $this->Minvoice->get_one_price($id_invoice),
    'count_race' => $this->Template_model->count_race($id_invoice),
		// team athlete
		'mku_team' => $this->Template_model->get_name_team_print($id_invoice),
    'get_sub_athlete' => $this->Template_model->get_subname_team($id_invoice),
    'get_one_team' => $this->Template_model->get_one_team($id_invoice),

    'price_rp' =>  $this->Template_model->count_rp_price($id_invoice),

    
 );
// print_r($data['price_race']);
//  exit;
 $this->load->view('print/invoice', $data);
}

public function excel_invoice($id_invoice = null)
{

 $data = array(
    'no' => $id_invoice,
    'data_athlete' => $this->Minvoice->detail($id_invoice),
    'race' => $this->MMaster->get_races(),
    'data_invoice' => $this->Minvoice->data_invoices($id_invoice),
    'total' =>$this->Minvoice->detaile_price($id_invoice),
   
  );
  $this->load->view('excel/invoice',$data);
}

public function excel_invoice_eo($id_event = null)
{

 $data = array(
    'no' => 0,
    'data_athlete' => $this->Minvoice->detail_eo($id_event),
    // 'race' => $this->MMaster->get_races(),
    'race' => $this->Race_model->all_race($id_event),
    'data_invoice' => $this->Minvoice->data_invoices_eo($id_event),
    // 'total' =>$this->Minvoice->detaile_price($id_event),
    'name_event'  => $this->db->where('id', $id_event)->get('tbl_event')->row(),
  );

	// echo  json_encode($data['data_athlete']);
	// exit;
  $this->load->view('excel/invoice',$data);
}

public function delete_invoice($id_invoice = null)
{
   $this->session->set_flashdata('pesan', '<div class="alert alert-success">
  <strong>Success!</strong>delete invoice Success </div>
  ');

 $code_invoice = array('code_invoice' => $id_invoice);

  $delete_invoice = $this->db->delete('tbl_invoice', $code_invoice);
  $delete_invoice_detail = $this->db->delete('tbl_invoice_detail', $code_invoice);

   redirect('Invoice');
}
}
