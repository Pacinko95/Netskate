<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


	public function __construct(){

     parent::__construct();

     $this->load->model('Home_model', 'Hm');
		 $this->load->model('Master_model', 'Mmaster');
     }

		 public function index()
		{
        $data = array(
            'page' => 'front/page/event',
             'event' => $this->Hm->get_event(),
        );
			$this->load->view('front/index', $data);
		}

	public function detail($id_event = null)
	{
		$data = array(
            'page' => 'front/page/detail-event',
            'detail_event' => $this->Hm->get_detail_event($id_event),
            //'sponsor' => $this->Hm->get_sponsor($id_event),
            'countclub' => $this->Hm->get_count_club($id_event),
            'athlete' => $this->Hm->get_count_athlete($id_event),
            'data' => $this->Hm->get_athlete($id_event),
        );
		$this->load->view('front/index', $data);
	}

	public function race($id_event = null)
	{
		$data = array(
			'page' => 'event/race',
			 'race' => $this->db->where('id_eo', $_SESSION['id_eo'])->where('flag',1)->get('tbl_race')->result(),
		  );

		   $this->load->view('master_template', $data);
	}

	public function mku($id_event = null)
	{
		$id_eo = $_SESSION['id_eo'];
		$data = array(
			'page' => 'event/mku',
			'mku' => $this->db->query("SELECT a.id, a.name, a.age_start, a.age_end, b.name as name_class, b.price  FROM tbl_mku_list a
			 LEFT JOIN tbl_class b ON a.id_class = b.id
			 WHERE a.id_eo ='$id_eo' AND a.flag='1'")->result(),

		  );

		   $this->load->view('master_template', $data);
	}

	public function race_create(){
		$data = array(
			'page' => 'event/form_race',
			'js' => 'event/form_race_js'
		  );
		   $this->load->view('master_template', $data);
	}

	public function race_update($id = null){
		$data = array(
			'page' => 'event/form_race_update',
			'data' => $this->db->where('id', $id)->get('tbl_race')->row(),
		  );

		   $this->load->view('master_template', $data);
	}

	public function create_mku(){
		$id_eo = $_SESSION['id_eo'];

		$data = array(
			'page' => 'event/form_mku',
			'class' => $this->db->where('flag', 1)->get('tbl_class')->result(),
		  );

		   $this->load->view('master_template', $data);
	}

	public function mku_update($id = null){
		$id_eo = $_SESSION['id_eo'];
		$data = array(
			'page' => 'event/form_mku_update',
			'class' => $this->db->where('flag', 1)->get('tbl_class')->result(),
			'data' => $this->db->where('id', $id)->get('tbl_mku_list')->row(),
		  );

		   $this->load->view('master_template', $data);
	}

	public function create_class(){
		$data = array(
			'page' => 'event/form_class'
		  );

		   $this->load->view('master_template', $data);
	}

	public function class_update($id = null){
		$data = array(
			'page' => 'event/form_class',
			'data' => $this->db->where('id', $id)->get('tbl_class')->row(),
		  );

		   $this->load->view('master_template', $data);
	}

	public function main_template(){
		$data = array(
			'page' => 'event/template'
		  );

		   $this->load->view('master_template', $data);
	}

	public function create_template(){
		$data = array(
			'page' => 'event/form_template',
		  );

		   $this->load->view('master_template', $data);
	}


	public function save_race($id = null){

		if(empty(isset($_POST['rp']))){
			$rp ='';
		}else{
			$rp =  $_POST['rp'];
		}

		if(empty(isset($_POST['team']))){
			$tm ='';
		}else{
			$tm =  $_POST['team'];
		}

		$data = array(
			'name'=> $_POST['name'],
			'id_eo'=> $_SESSION['id_eo'],
			'rp' => $rp,
			'team' => $tm,
			'flag'=> '1'
		);


		if(empty($id)){
			$this->db->insert('tbl_race', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			<strong>Success!</strong> data has been save
			</div>
			');
		}else{
			$this->db->set($data)->where('id', $id)->update('tbl_race');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			<strong>Success!</strong> data has been updated
			</div>
			');
		}

		redirect('event/race','refresh');
	}

	public function save_class($id = null){
		$data = array(
			'name'=> $_POST['name'],
			'id_eo'=> $_SESSION['id_eo'],
			'flag'=> '1'
		);
		if(empty($id)){
			$this->db->insert('tbl_class', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			<strong>Success!</strong>  data has been save
			</div>
			');
		}else{

			$this->db->set('name', $_POST['name'])->where('id', $id)->update('tbl_class');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			<strong>Success!</strong>  data has been updated
			</div>
			');
		}

		redirect('event/class');
	}

	public function save_mku($id = null){


		$data = array(
			'name'=> $_POST['name'],
			'id_eo'=> $_SESSION['id_eo'],
			'flag'=> '1',
			'age_start'=> $_POST['age_start'],
			'age_end'=> $_POST['age_end'],
			'id_class'=> $_POST['id_class'],
		);

		if(empty($id)){
			$this->db->insert('tbl_mku_list', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			<strong>Success!</strong>  data has been save
			</div>
			');
		}else{
			$this->db->set($data)->where('id', $id)->update('tbl_mku_list');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success">
			<strong>Success!</strong>  data has been updated
			</div>
			');
		}
		 redirect('event/mku');
	}

	public function template(){
		$id_eo = $_SESSION['id_eo'];
		$data = array(
			'page' => 'event/template',
			'data'=> $this->db->query("SELECT * FROM tbl_templates WHERE id_eo ='$id_eo' ORDER BY id DESC")->result(),
		  );

		   $this->load->view('master_template', $data);
	}



	public function template_design($id = null){
		$id_eo = $_SESSION['id_eo'];
		$data = array(
			'page' => 'event/template_design',
		  );

		   $this->load->view('master_template', $data);
	}

	public function template_setting($id = null){
		$id_eo = $_SESSION['id_eo'];
		$data = array(
			'page' => 'event/template_setting',
		  );
	   $this->load->view('master_template', $data);
	}




	public function form_template($id = null){
		$id_eo = $_SESSION['id_eo'];
		$data = array(
			'page' => 'event/template_form',
			'data'=> $this->Template_model->get_list_mku($id_eo),
			'race' => $this->Template_model->get_race_template($id_eo),
			'template' => $this->Template_model->get_template_list($id),
			'detail' => $this->Template_model->template_detail($id),
		  );
		   $this->load->view('master_template', $data);
	}

	public function view_template($id_template = null){
		$id_eo = $_SESSION['id_eo'];
		$data = array(
			'page' => 'event/template_view',
			'data'=> $this->Template_model->get_list_mku($id_eo),
			'race' => $this->Template_model->get_race_template($id_eo),
			'data_race' => $this->Template_model->mku_template($id_template),
			);
		   $this->load->view('master_template', $data);
	}



	public function save_template($id_template = null){
		$id_eo = $_SESSION['id_eo'];

		if($_POST['status'] == 1){
			$public =  date('Y-m-d');
		}else{
			$public = '';
		}

		if(empty($id_template)){
			$temp = array(
				'name' => $_POST['name'],
				'flag' => $_POST['status'],
				'id_eo' => $id_eo,
				'version' => 1,
				'create_date' => date('Y-m-d'),
				'public_date' => date('Y-m-d') ,
			);
			$this->db->insert('tbl_templates',$temp);

			$sql = $this->db->query("SELECT  id FROM tbl_templates ORDER BY id DESC limit 1")->row();
			foreach($_POST['race'] as $data ){
				$d = explode ('-', $data);
				$arr = array(
					'id_template' => $sql->id,
					'id_mku' => $d['0'],
					'id_eo' => $id_eo,
					'id_race' => $d['1'],
				);
				$this->db->insert('tbl_mku_template', $arr);
			}

	}else{
		$txflag  = $_POST['txflag'];
		$version = $_POST['version'];
		$status  = $_POST['status'];
		$p 		 = 1;

		$temp = array(
			'name' => $_POST['name'],
			'flag' => $_POST['status'],
			'id_eo' => $id_eo,
			'version' => 1,
			'public_date' => $public ,
		);


		// update
		$this->db->set($temp)->where('id', $id_template)->update('tbl_templates');
		// end update
		// exit;
		// delete
		$this->db->where('id_template',$id_template)->delete('tbl_mku_template');
		// end delete

		$sql = $this->db->query("SELECT  id FROM tbl_templates where id='$id_template' ")->row();
		foreach($_POST['race'] as $data ){
			$d = explode ('-', $data);
			$arr = array(
				'id_template' => $sql->id,
				'id_mku' => $d['0'],
				'id_eo' => $id_eo,
				'id_race' => $d['1'],
			);
			// flag  1 public 2 draf

				$this->db->insert('tbl_mku_template', $arr);

			}
		}

		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
		<strong>Success!</strong>  data has been updated
		</div>
		');
		redirect('event/template');
	}



public function design()
{
  $id_eo = $_SESSION['id_eo'];
  $data = array(
   'page' => 'event/desing',
   'template' => $this->Template_model->get_templates($id_eo),
   'js' => 'event/desing_js',
 );
  $this->load->view('master_template', $data);
}

public function insert_event($id_event = null){

	$id_eo = $_SESSION['id_eo'];
	$ram = sha1(time());
	// icon
	$icon_name = $_FILES['icon']['name'];
	$icon = explode('.', $icon_name);
	$icon_tmp = $_FILES['icon']['tmp_name'];
	$icon_asset = 'assets/icon/'.$ram.''.$icon_name;
	move_uploaded_file($icon_tmp, './'.$icon_asset);

	// banner
	$banner_name = $_FILES['banner']['name'];
	$banner = explode('.', $banner_name);
	$banner_tmp = $_FILES['banner']['tmp_name'];
	$banner_asset = 'assets/banner/'.$ram.''.$banner_name;
	move_uploaded_file($banner_tmp, './'.$banner_asset);

	// book
	$book_name = $_FILES['book']['name'];
	$book = explode('.', $book_name);
	$book_tmp = $_FILES['book']['tmp_name'];
	$book_asset = 'assets/book/'.$ram.''.$book_name;
	move_uploaded_file($book_tmp, './'.$book_asset);

	$arr = array(
		'name' => $_POST['name'],
		'img' => $icon_asset,
		'img_layer' => $banner_asset,
		'start_reg' => $_POST['start_reg'],
		'end_reg' => $_POST['end_reg'],
		'address' => $_POST['address'],
		'no_tlp' => $_POST['no_tlp'],
		'description' => $_POST['description'],
		'id_template' => $_POST['template'],
		'book' => $book_asset,
		'id_eo' => $id_eo,
		'rek_address' => $_POST['rek_address'],
		'rek_nomor' => $_POST['rek_nomor'],
		'rek_name' => $_POST['rek_name'],
	);

	$this->db->insert('tbl_event',$arr);

	$get_one = $this->Template_model->get_count_event();

	$data_mku_template = $this->Template_model->get_all_mku($_POST['template']);
	foreach($data_mku_template as $dat){
		$arry = array(
			'name' => $dat->name,
			'age_start' => $dat->age_start,
			'age_end' => $dat->age_end,
			'id_class' => $dat->id_class,
			'id_eo' => $id_eo,
			'flag' => 1,
			'id_event' => $get_one->id,
			'id_mku' => $dat->id,
		);
		$this->db->insert('tbl_mku',$arry);
	}
	$this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <strong>Success!</strong>  data has been updated
    </div>
    ');

	redirect('eo/event');

}


public function price($id_event = null, $id_template = null){
	$id_eo = $_SESSION['id_eo'];
	$data = array(
		'page' => 'event/price',
		'price' => $this->Template_model->dropdown_mku($id_template),
		'rp' => $this->Template_model->get_rp($id_template),

	);

	 $this->load->view('master_template', $data);

}

public function publis($id_event = null, $id_template = null){
	$id_eo = $_SESSION['id_eo'];
	$data = $this->Template_model->dropdown_mku($id_template);
	$data_race = $this->Template_model->get_rp($id_template);

// save class price
	foreach($data as $d){
		$pric = $_POST['price'.$d->id_class.'-'.$d->id_mku];
		if($pric != null){
			$data_array = array(
				'id_class' => $d->id_class,
				'id_event' => $id_event,
				'price' => $pric,
				'id_eo' => $id_eo ,

			);
			$this->db->insert('tbl_class_price', $data_array);

		}

	}
// save price race
	foreach($data_race as $dr){
		$price_race = $_POST['price_race'.$dr->id_race.'-'.$dr->id_mku];
		if($price_race != null){
			$data_arrays = array(
				'id_race' => $dr->id_race,
				'id_event' => $id_event,
				'price' => $price_race,
				'id_eo' => $id_eo ,

			);
			$this->db->insert('tbl_race_price', $data_arrays);
		}

	}
// update event
$this->db->set('flag',1)->where('id', $id_event)->update('tbl_event');
$this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <strong>Success!</strong>  publis event
    </div>
    ');
redirect('eo/event');


}


public function class_delete($id = null){
	$id_eo = $_SESSION['id_eo'];
	$this->db->set('flag', 0)->where('id', $id)->update('tbl_class');


	redirect('event/class');
}

public function race_delete($id = null){

	$this->db->set('flag', 0)->where('id', $id)->update('tbl_race');
	$this->session->set_flashdata('pesan', '<div class="alert alert-success">
    <strong>Success!</strong>  data has been delete
    </div>
    ');
	redirect('event/race');
}

public function mku_delete($id = null){
	$this->db->set('flag', 0)->where('id', $id)->update('tbl_mku_list');
	redirect('event/mku');
}

public function red_save_template($id = null){
	$this->db->set('flag', 0)->where('id', $id)->update('tbl_mku_list');
	redirect('event/mku');
}


public function event_update($id = null){

	$id_eo = $_SESSION['id_eo'];
	$data = array(
	 'page' 			=> 'event/form_update_event',
	 'template' 		=> $this->Template_model->get_templates($id_eo),
	 'detail'			=> $this->db->where('id', $id)->get('tbl_event')->row(),
	 'js' 				=> 'event/desing_update_js',
   );

	 $this->load->view('master_template', $data);

}


public function update_event($id = null){
		$id_eo = $_SESSION['id_eo'];
		$ram = sha1(time());

		// // icon
		$icon_name = $_FILES['icon']['name'];
			if(!empty($icon_name)){
				$icon = explode('.', $icon_name);
				$icon_tmp = $_FILES['icon']['tmp_name'];
				$icon_asset = 'assets/icon/'.$ram.''.$icon_name;
				move_uploaded_file($icon_tmp, './'.$icon_asset);
			}else{
				$icon_asset = $_POST['icon_asset'] ;
			}

		// // banner
		$banner_name = $_FILES['banner']['name'];
			if(!empty($banner_name)){
			$banner = explode('.', $banner_name);
			$banner_tmp = $_FILES['banner']['tmp_name'];
			$banner_asset = 'assets/banner/'.$ram.''.$banner_name;
			move_uploaded_file($banner_tmp, './'.$banner_asset);
		}else{
			$banner_asset  =  $_POST['banner_asset'] ;
		}

		// // book
		$book_name = $_FILES['book']['name'];
				if(!empty($book_name)){
				$book = explode('.', $book_name);
				$book_tmp = $_FILES['book']['tmp_name'];
				$book_asset = 'assets/book/'.$ram.''.$book_name;
				move_uploaded_file($book_tmp, './'.$book_asset);
		}else{
				$book_asset = $_POST['book_asset'] ;
		}

		$arr = array(
				'name' => $_POST['name'],
				'img' => $icon_asset,
				'img_layer' => $banner_asset,
				'start_reg' => $_POST['start_reg'],
				'end_reg' => $_POST['end_reg'],
				'address' => $_POST['address'],
				'no_tlp' => $_POST['no_tlp'],
				'description' => $_POST['description'],
				'book' => $book_asset,
				'id_eo' => $id_eo,
		);

		$this->db->where('id', $id)->update('tbl_event',$arr);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
		<strong>Success!</strong>  data has been updated
		</div>
		');

		redirect('eo/event');



}

public function edit_template($id = null){
	$id_eo = $_SESSION['id_eo'];
	$data = array(
		'page' => 'event/template_edit',
		'data'=> $this->Template_model->get_list_mku($id_eo),
		'race' => $this->Template_model->get_race_template($id_eo),
		'template' => $this->Template_model->get_template_list($id),
		'detail' => $this->Template_model->template_detail($id),
	  );

	   $this->load->view('master_template', $data);
}


public function update_template($id_template = null){
	$id_eo = $_SESSION['id_eo'];

	if($_POST['status'] == 1){
		$public =  date('Y-m-d');
	}else{
		$public = '';
	}

	$version = $_POST['version'];
	$p 		 = 1;
	$v = $version + $p;
	$temp = array(
			'name' => $_POST['name'],
			'flag' => $_POST['status'],
			'id_eo' => $id_eo,
			'version' => $v,
			'create_date' => date('Y-m-d'),
			'public_date' => date('Y-m-d') ,
		);
		$this->db->insert('tbl_templates',$temp);
		$sql = $this->db->query("SELECT  id FROM tbl_templates ORDER BY id DESC limit 1")->row();
		foreach($_POST['race'] as $data ){
			$d = explode ('-', $data);
			$arr = array(
				'id_template' => $sql->id,
				'id_mku' => $d['0'],
				'id_eo' => $id_eo,
				'id_race' => $d['1'],
			);

			$this->db->insert('tbl_mku_template', $arr);
		}

	$this->session->set_flashdata('pesan', '<div class="alert alert-success">
	<strong>Success!</strong>  data has been updated
	</div>
	');
	redirect('event/template');
}

public function price_view($id_event = null  , $id_template = null ){
	$data = array(
		'page' => 'event/price_view',
		'v_team' => $this->Template_model->view_team_rp($id_event),
		'v_class' => $this->Template_model->view_class_rp($id_event),

	  );
	  $this->load->view('master_template', $data);
}


public function team_donload($id_event = null ){
	$data = array(
	'no' => 0,
	'data' => $this->Template_model->get_export_data_team($id_event),
  );
  $this->load->view('excel/team',$data);
}

}
