<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Eo extends CI_Controller {

 public function __construct(){
  parent::__construct();
  $this->load->model('Eo_model', 'Meo');
  $this->load->model('Invoice_model', 'MInvoice');
  $this->load->model('Master_model', 'Mmaster');


  if(empty($_SESSION['nama']) ) {
   $this->session->set_flashdata('flash_data', 'You don\'t have access!');
   return redirect('login');
 }
}


public function index()
{

  $data = array(
   'page' => 'eo/dashboard',
   'event' => $this->db->where('id_eo', $_SESSION['id_eo'])->get('tbl_event')->num_rows(),
   'invoice_approve' =>$this->Meo->invoice($_SESSION['id_eo']),
   'invoice_approve_not' =>$this->Meo->invoice_not($_SESSION['id_eo']),
   'club' =>$this->Meo->get_club($_SESSION['id_eo']),


 );

  $this->load->view('master_template', $data);

}

public function profil()
{
  $data = array(
   'page' => 'eo/profil',
   'data' => $this->Meo->get_profil($_SESSION['email']),
   'js' => 'eo/profil_script',
 );
  $this->load->view('master_template', $data);

}


public function event()
{

  $data = array(
   'page' => 'eo/event',
   'data' => $this->Meo->get_data($_SESSION['id_eo']),
 );

  $this->load->view('master_template', $data);
}

public function events($id) {
  $data = array(
   'page' => 'eo/event',
   'data' => $this->Meo->get_data($_SESSION['id_eo']),
 );
  $this->load->view('master_template', $data);
}

public function create_event()
{
  $id_eo = $_SESSION['id_eo'];
  $data = array(
   'page' => 'eo/event_form_v2',
   'template' => $this->Template_model->get_templates($id_eo),
   'js' => 'eo/event_form_v2_js',
 );

  $this->load->view('master_template', $data);
}

public function insert_event()
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

 if(empty($errors)==true){
   $data = array(
    'img' => 'assets/image/'.$_FILES['img_file']['name'],
    'name' => $_POST['name'],
    'start_reg' => $_POST['start_reg'],
    'end_reg' => $_POST['end_reg'],
    'address' => $_POST['address'],
    'id_eo' =>$_SESSION['id_eo'],
    'no_tlp' =>$_POST['no_tlp'],
  );

   $this->Meo->insert_event($data);


   move_uploaded_file($file_tmp,"assets/image/".$file_name);
         // echo "Success";
   $this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <strong>Success!</strong> Event has been created.
    </div>
    ');
   redirect('/eo/event', 'refresh');
 }else{
   print_r($errors);
 }

}

public function form_event()
{
  $data = array(
   'page' => 'eo/event_form',
 );

  $this->load->view('master_template', $data);
}



public function invoice($id_invoice = null)
{
 

  $data = array(
   'page' => 'eo/invoice',
   'data' => $this->MInvoice->invoice_eo($id_invoice),
   'js' =>'eo/invoice_js',
 );

  $this->load->view('master_template', $data);
}

public function form_invoice($id_invoice = null)
{

  $data = array(
   'page' => 'eo/form_invoice',
   'data' => $this->MInvoice->get_one_invoice($id_invoice),
   'data_athlete' => $this->MInvoice->detail($id_invoice),
   'race' => $this->Race_model->race_to_invoice($id_invoice),
   'data_invoice' => $this->MInvoice->data_invoices($id_invoice),
   // team athlete
   'mku_team' => $this->Template_model->get_name_team($id_invoice),
   'get_sub_athlete' => $this->Template_model->get_subname_team($id_invoice),
   //
   'js' =>'eo/form_invoice_js',
 );

  $this->load->view('master_template', $data);
}


public function update()
{

 unset($_SESSION['nama']);
 $_SESSION['nama'] = $_POST['name_eo'];
 $_SESSION['name_start'] = $_POST['name_eo'];

//  print_r($_SESSION);
//  exit;
  $errors= array();
  $file_name = $_FILES['img_file']['name'];
  $file_size =$_FILES['img_file']['size'];
  $file_tmp =$_FILES['img_file']['tmp_name'];
  $file_type=$_FILES['img_file']['type'];
  $expensions= array("jpeg","jpg","png");
  if($file_size > 2097152){
   $errors[]='File size must be excately 2 MB';
 }

 if(empty($errors)==true && empty($file_size)==false){
   $data = array(
    'img' => 'assets/image/'.$_FILES['img_file']['name'],
    'name' => $_POST['name_eo'],
    'no_tlp' => $_POST['no_tlp'],
    'address' => $_POST['address']
  );
   $_SESSION['logo'] = 'assets/image/'.$_FILES['img_file']['name'];
   $this->Meo->update($_SESSION['email'], 	$data);
   $this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <strong>Success!</strong> EO data has been updated
    </div>
    ');
   move_uploaded_file($file_tmp,"assets/image/".$file_name);
         // echo "Success";
   redirect('/eo/profil', 'refresh');
 }else if(empty($errors)==true && empty($file_size)==true){
  $data = array(
          // 'img' => 'assets/image/'.$_FILES['img_file']['name'],
    'name' => $_POST['name_eo'],
    'no_tlp' => $_POST['no_tlp'],
    'address' => $_POST['address']
  );
        // $_SESSION['logo'] = 'assets/image/'.$_FILES['img_file']['name'];
  $this->Meo->update($_SESSION['email'],   $data);
  $this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <strong>Success!</strong> EO data has been updated
    </div>
    ');
         // echo "Success";

  redirect('/eo/profil', 'refresh');
}else{
 print_r($errors);
}



}

public function detail($id_event = null)
{

  // $data = $this->Meo->get_race_val($id_event);
  // echo $data;
  $data = array(
   'page' => 'eo/event_detail',
   'get_class' => $this->Meo->get_class(),
   'get_race' => $this->Meo->get_race(),
            // 'get_race_val' => $this->Meo->get_race_val($id_event),
   'js' => 'eo/event_detail_js',
 );

  $this->load->view('master_template', $data);
}


public function save_detail($id_event = null)
{
  foreach ($_POST['race'] as $key => $value) {
   $ex = explode(',', $value);
   $data = array('id_class' => $ex[0],
    'id_race' => $ex[1],
    'id_event' => $id_event,
  );
   $this->Meo->save_rece($data);
 }

 redirect('/eo/detail/'.$id_event, 'refresh');
}

public function price($id_event = null)
{
  $data = array(
   'page' => 'eo/price',

   'data' => $this->Meo->get_data_price($id_event),
 );

  $this->load->view('master_template', $data);
}

public function form_price($id_event= null)
{

  $data = array(
   'page' => 'eo/price_form',
   'js' => 'eo/price_form_js',
   'class' =>$this->Meo->get_class_(),
   'data' => $this->Meo->get_data_price($id_event),
 );

  $this->load->view('master_template', $data);
}


public function save_price($id_event = null)
{

  $data = array('id_eo' => $_SESSION['id_eo'],
   'id_class' => $_POST['class'],
   'price' => $_POST['price'],
   'id_event' => $id_event,
 );

  $this->Meo->insert('tbl_class_price',$data);
  redirect('/eo/price/'.$id_event, 'refresh');
}

public function upadte_invoice($id_invoice = null)
{

 $athlete =  $this->Mmaster->get_athlete_detail($_POST['code_invoice']);



 if($_POST['status'] == 4){


   foreach ($athlete as $a) {
    $one =  $this->Mmaster->get_nomor($_POST['code_invoice']);
    if($one->bib == ''){
      $no ='101';
    }else{
      $no =$one->no_bib;
    }
    $this->Mmaster->save_bib($a->id_athlete, $no);


  }

}

$where =array('code_invoice' => $_POST['code_invoice'], );
$data = array('remaks' => $_POST['remaks'],
 'status' => $_POST['status'] );

$this->MInvoice->update_set('tbl_invoice', $data, $where);
redirect('/eo/invoice/'.$_POST['id_event'], 'refresh');
}

public function result_main($value = null)
{
  $data = array(
    'page' => 'eo/result_main',
    'data' => $this->db->where("id_event",$value)->get("tbl_result_event")->result(),
  );

  $this->load->view('master_template', $data);
}


public function result_form()
{
  $data = array(
    'page' => 'eo/result_form',
  );

  $this->load->view('master_template', $data);
}

public function result_save($value='')
{
  if($_POST){
      // $ekstensi_diperbolehkan = array('png','jpg');
    $nama = 'result_doc/'.$_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, $nama);
    $data = array('file' => $nama,
      'description' => $_POST['description'],
      'id_event'=>  $value,);
    $this->Mmaster->insert('tbl_result_event', $data);

    redirect('eo/result_main/'.$value);
  }

}

public function price_view($id_event = null){

  $data = array(
    'page' => 'eo/price',
    // 'price_view' => $this->Meo->get_price_view(),
    'js' => 'eo/price_form_js',
  );
 
   $this->load->view('master_template', $data);

}

public function result_all($id_event = null)
{
  $data = array(
    'page' => 'eo/result_main',
    // 'data' => $this->Template_model->get_detail_event_by_invoice($id_event),
      'data' => $this->db->where("id_event",$id_event)->get("tbl_result_event")->result(),
    // 'js' => 'eo/result_all_js',
  );

  $this->load->view('master_template', $data);
}

public function result_data($id_event = null){
    $bib = $_POST['bib'];
    $id_event = $_POST['segment'];

    $responseData = array(
    'data_athlete' => $this->Template_model->get_one_bib($id_event, $bib),
    'all_race' => $this->Template_model->get_one_bib_race($id_event, $bib),
    );
   echo  json_encode($responseData);
}

public function result_save_all($id_event = null){
  $bib = $_POST['bib'];
  $code_invoice = $_POST['code'];
  $data = $this->Template_model->get_one_bib_race($id_event, $bib);
 
  // print_r($data);
  foreach($data as $d){
   
    $arr = array(
      'time' =>  $_POST['time'.$d->id_race],
      'ranking' => $_POST['rang'.$d->id_race],
    );
    $id = array(
      'bib'=> $bib,
      'code_invoice' => $code_invoice,
      'id_race' => $d->id_race,
    );

    // exit;
    $this->db->set($arr)->where($id)->update('tbl_invoice_detail');
   

  }
  redirect('eo/result_all/'.$id_event, 'refresh');

}

public function datatable_all($id_event = null){
 
  $id_event = $_POST['segment'];

  $responseData = array(
  'data_athlete' => $this->Template_model->get_one_bib($id_event),
  'all_race' => $this->Template_model->get_one_bib_race($id_event, $bib),
  );
 echo  json_encode($responseData);
}


}
 