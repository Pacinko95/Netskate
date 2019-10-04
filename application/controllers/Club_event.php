<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Club_event extends CI_Controller {


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

// public function create_event($id_event = null)
// {
//   $no_invoice = $this->MMaster->no_invoice();

//   if(@$no_invoice->noinvoice == ''){
//   $no=  date('dmy').'1001';
//   }else{
//   $no = $no_invoice->noinvoice;
//   }


// 	if(!empty($_POST['race'])){
//         $invoice  = array('code_invoice'    => $no,
//                           'create_date'     => date('Y-m-d'),
//                           'create_by'       => $_SESSION['nama'],
//                           'id_event'        => $id_event,
//                           'id_club'         => $_SESSION['id_club'],
//                           'status'          => 1,
//                           'code_payment'    => rand(000,999)
//                         );
//         $this->Minvoice->insert('tbl_invoice', $invoice);

//         foreach($_POST['race'] as $p){
//             $n = explode(",", $p);
//             $invoice_list = array('id_race'     =>  $n['0'],
//                           'id_athlete'          =>  $n['1'],
//                           'id_mku'              =>  $n['2'],
//                           'code_invoice'        =>  $no,
//                           );
//             $this->Minvoice->insert('tbl_invoice_detail', $invoice_list);
//         }
//         redirect('invoice','refles');
//     }else{

//     redirect('club/eventreg/'.$id_event,'refresh');
//     }

// }


// public function create_event($id_event = null)
// {
// //   $no_invoice = $this->MMaster->no_invoice();

// //   if(@$no_invoice->noinvoice == ''){
// //   $no=  date('dmy').'1001';
// //   }else{
// //   $no = $no_invoice->noinvoice;
// //   }


// // 	if(!empty($_POST['race'])){
// //         $invoice  = array('code_invoice'    => $no,
// //                           'create_date'     => date('Y-m-d'),
// //                           'create_by'       => $_SESSION['nama'],
// //                           'id_event'        => $id_event,
// //                           'id_club'         => $_SESSION['id_club'],
// //                           'status'          => 1,
// //                           'code_payment'    => rand(000,999)
// //                         );
// //         $this->Minvoice->insert('tbl_invoice', $invoice);

// //         foreach($_POST['race'] as $p){
// //             $n = explode(",", $p);
// //             $invoice_list = array('id_race'     =>  $n['0'],
// //                           'id_athlete'          =>  $n['1'],
// //                           'id_mku'              =>  $n['2'],
// //                           'code_invoice'        =>  $no,
// //                           );
// //             $this->Minvoice->insert('tbl_invoice_detail', $invoice_list);
// //         }
// //         redirect('invoice','refles');
// //     }else{

// //     // redirect('club/eventreg/'.$id_event,'refresh');
// //     }
// $this->create_team();

// }

public function create_event($id_event = null)
{
  // echo $_SESSION['no_invoice'];
  // exit;
  $no_invoice = $this->MMaster->no_invoice();


  if(@$no_invoice->noinvoice == ''){
  $no=  date('dmy').'1001';
  }else{
  $no = $no_invoice->noinvoice;
  }
 // update step

	if(!empty($_POST['race'])){
        $invoice  = array('code_invoice'    => $no,
                          'create_date'     => date('Y-m-d'),
                          'create_by'       => $_SESSION['nama'],
                          'id_event'        => $id_event,
                          'id_club'         => $_SESSION['id_club'],
                          'status'          => 6,
                          'code_payment'    => rand(000,999),
													'step' 						=> 1,
                        );
        $this->Minvoice->insert('tbl_invoice', $invoice);

        foreach($_POST['race'] as $p){
            $n = explode(",", $p);
            $invoice_list = array('id_race'     =>  $n['0'],
                          'id_athlete'          =>  $n['1'],
                          'id_mku'              =>  $n['2'],
                          'code_invoice'        =>  $no,
                          );
           $this->Minvoice->insert('tbl_invoice_detail', $invoice_list);

        }

        $count_result = $this->Template_model->get_count_tbl_team($no);

       if($count_result->count_invoice < 1){
         // update
        $this->Template_model->update_no_team($no);
        redirect('invoice/detail/'.$no ,'refresh');

       }else{
        redirect('Club_event/create_team/'.$id_event.'/'.$no ,'refresh');
       }

    }else{
    redirect('Club_event/create_team/'.$id_event.'/'.$no ,'refresh');
    }


}

public function create_team($id_event = null , $no_invoice = null){



    $get_event =   $this->Template_model->get_invoice($id_event);
    $no_invoice = $get_event->code_invoice;

    // exit;
		$data = array(
            'page' => 'event/form_team',
            'mku_team' => $this->Race_model->race_team(),
            'athlete' => $this->Template_model->get_athlete($id_event, $no_invoice),
            'athlete_team' => $this->Template_model->get_athlete_team($no_invoice),

		  );
 
		   $this->load->view('master_template', $data);

}

public function team_save($id_event = null){

  $get_event =   $this->Template_model->get_invoice($id_event);
  $no_invoice = $get_event->code_invoice;



  $data = $this->Template_model->get_athlete_team($no_invoice);

  foreach($data as $d){
    $id_atthlete = $_POST['id_athlete'.$d->id_athlete];
    $sex = $_POST['sex'.$d->id_athlete];
    $category = $_POST['category'.$d->id_athlete];
    $team = $_POST['team'.$d->id_athlete];


    $arr = array(
      'no_invoice'  => $no_invoice,
      'id_athlete'  => $id_atthlete,
      'sex'         => $sex,
      'category'    => $category,
      'team'        => $team,


    );
    $this->Template_model->insert_data('tbl_team', $arr);

  }
	// update step
  $this->db->set('step', '2')->where('code_invoice', $no_invoice)->update('tbl_invoice');

  redirect('Club_event/team_name/'.$id_event.'/'.$no_invoice );
}



public function team_name($id_event = null, $no_invoice = null){

  $data = array(
    'page' => 'event/form_team_name',
    'mku_team' => $this->Template_model->get_name_team($no_invoice),
    'get_sub_athlete' => $this->Template_model->get_subname_team($no_invoice),


);


     $this->load->view('master_template', $data);

}


public function  team_name_save($id_event = null, $code_invoice = null ){

  $list = $this->Template_model->get_name_team($code_invoice);
  $this->db->set('step', '3')->where('code_invoice', $code_invoice)->update('tbl_invoice');

  foreach($list as $d){
     $post = $_POST['name'.$code_invoice.''.$d->team];

     $where = array(
      'no_invoice' => $code_invoice,
      'team' => $d->team,
      );

     $arr = array(
      'name_team' => $post,
      );

      $this->db->set($arr)->where($where)->update('tbl_team');
  }
// update status in tabel tbl_invoice
  $this->db->set('status', '1')->where('code_invoice', $code_invoice)->update('tbl_invoice');
   redirect('invoice/detail/'.$code_invoice,'refresh');

}



}
