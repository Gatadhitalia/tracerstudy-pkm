<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;
use crocodicstudio\crudbooster\controllers\CBController;

class AdminCmsUsersController extends CBController {


	public function cbInit() {
		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->table               = 'cms_users';
		$this->primary_key         = 'id';
		$this->title_field         = "name";
		$this->button_action_style = 'button_icon';	
		$this->button_import 	   = FALSE;	
		$this->button_export 	   = FALSE;	
		# END CONFIGURATION DO NOT REMOVE THIS LINE
	
		# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = array();
		$this->col[] = array("label"=>"Name","name"=>"name");
		$this->col[] = array("label"=>"Email","name"=>"email");
		$this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
		$this->col[] = array("label"=>"Photo","name"=>"photo","image"=>1);		
		# END COLUMNS DO NOT REMOVE THIS LINE

		# START FORM DO NOT REMOVE THIS LINE
		$this->form = array(); 		
		$this->form[] = array("label"=>"Name","name"=>"name",'required'=>true,'validation'=>'required|alpha_spaces|min:3');
		$this->form[] = array("label"=>"Email","name"=>"email",'required'=>true,'type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId());		
		$this->form[] = array("label"=>"Photo","name"=>"photo","type"=>"upload","help"=>"Recommended resolution is 200x200px",'required'=>true,'validation'=>'required|image|max:1000','resize_width'=>90,'resize_height'=>90);											
		$this->form[] = array("label"=>"Privilege","name"=>"id_cms_privileges","type"=>"select","datatable"=>"cms_privileges,name",'required'=>true);
		$this->form[] = ['label' => 'Tipe Akun', 'name' => 'type', 'type' => 'select', 'validation' => 'max:255', 'dataenum' => 'university|University;company|Company;student|Student'];
		$this->form[] = ['label' => 'Universitas', 'name' => 'university_id', 'type' => 'select2', 'validation' => 'min:1|max:255', 'datatable' => 'universities,name'];
		$this->form[] = ['label' => 'Perusahaan', 'name' => 'company_id', 'type' => 'select2', 'validation' => 'min:1|max:255', 'datatable' => 'companies,name'];
		$this->form[] = ['label' => 'Mahasiswa', 'name' => 'student_id', 'type' => 'select2', 'validation' => 'min:1|max:255', 'datatable' => 'students,name'];
		// $this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
		$this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
		$this->form[] = array("label"=>"Password Confirmation","name"=>"password_confirmation","type"=>"password","help"=>"Please leave empty if not change");
		# END FORM DO NOT REMOVE THIS LINE

		$this->script_js = "
			$(document).ready(function() {
				$('#form-group-university_id').hide();
				// $('#university_id').val('').change();

				$('#form-group-company_id').hide();
				// $('#company_id').val('').change();

				$('#form-group-student_id').hide();
				// $('#student_id').val('').change();

				$('#type').on('change', function() {
					let val = $(this).val();
					console.log(val);

					if(val == 'university') {
						$('#form-group-university_id').show();
						// $('#university_id').val('').change();

						$('#form-group-company_id').hide();
						$('#company_id').val('').change();

						$('#form-group-student_id').hide();
						$('#student_id').val('').change();
					} else if(val == 'company') {
						$('#form-group-university_id').hide();
						$('#university_id').val('').change();

						$('#form-group-company_id').show();
						// $('#company_id').val('').change();

						$('#form-group-student_id').hide();
						$('#student_id').val('').change();
					} else if(val == 'student') {
						$('#form-group-university_id').hide();
						$('#university_id').val('').change();

						$('#form-group-company_id').hide();
						$('#company_id').val('').change();

						$('#form-group-student_id').show();
					}

				});
				$('#type').trigger('change');
			});
		";
				
	}

	public function getProfile() {			

		$this->button_addmore = FALSE;
		$this->button_cancel  = FALSE;
		$this->button_show    = FALSE;			
		$this->button_add     = FALSE;
		$this->button_delete  = FALSE;	
		$this->hide_form 	  = ['id_cms_privileges'];

		$data['page_title'] = cbLang("label_button_profile");
		$data['row']        = CRUDBooster::first('cms_users',CRUDBooster::myId());

        return $this->view('crudbooster::default.form',$data);
	}

	public function hook_before_edit(&$postdata,$id) { 
		$postdata['type'] = strtolower($postdata['type']);

		if($postdata['type'] == 'student') {
			unset($postdata['company_id']);
			unset($postdata['university_id']);

		} else if($postdata['type'] == 'company') {
			unset($postdata['student_id']);
			unset($postdata['university_id']);

		} else if($postdata['type'] == 'university') {
			unset($postdata['student_id']);
			unset($postdata['company_id']);

		}

		unset($postdata['password_confirmation']);
	}

	public function hook_before_add(&$postdata) {      
		$postdata['type'] = strtolower($postdata['type']);

		if($postdata['type'] == 'student') {
			unset($postdata['company_id']);
			unset($postdata['university_id']);

		} else if($postdata['type'] == 'company') {
			unset($postdata['student_id']);
			unset($postdata['university_id']);

		} else if($postdata['type'] == 'university') {
			unset($postdata['student_id']);
			unset($postdata['company_id']);

		}
		
	    unset($postdata['password_confirmation']);
	}
}
