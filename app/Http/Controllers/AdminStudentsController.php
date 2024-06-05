<?php namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Models\User;
use App\Repositories\CmsPrivileges;
use App\Repositories\CmsUsers;
use App\Repositories\Students;
use crocodicstudio\crudbooster\helpers\CRUDBooster as HelpersCRUDBooster;
use Session;
	use Request;
	use DB;
	use CRUDBooster;
use Doctrine\DBAL\Driver\IBMDB2\DB2Driver;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

	class AdminStudentsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = true;
			$this->button_export = false;
			$this->table = "students";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Universitas","name"=>"university_id","join"=>"universities,name"];
			$this->col[] = ["label"=>"Program Pendidikan","name"=>"program_study_id","join"=>"program_studies,name"];
			$this->col[] = ["label"=>"Jenjang Pendidikan","name"=>"level_study_id","join"=>"level_studies,name"];
			$this->col[] = ["label"=>"Nim","name"=>"nim"];
			$this->col[] = ["label"=>"Nama","name"=>"name"];
			$this->col[] = ["label"=>"IPK","name"=>"ipk"];
			$this->col[] = ["label"=>"Whatsapp","name"=>"phone"];
			$this->col[] = ["label"=>"Email Mahasiswa","name"=>"student_email"];
			$this->col[] = ["label"=>"Email Pribadi","name"=>"personal_email"];
			$this->col[] = ["label"=>"Diterima di","name"=>"approved_job_apply_id", "callback_php" => '$row->approved_job_apply_id ? "$row->company_name pada ".date("d M Y", strtotime($row->approved_at)) : "-"'];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$ip = "1.1;1.11;1.12;1.13;1.14;1.15;1.16;1.17;1.18;1.19;1.2;1.21;1.22;1.23;1.24;1.25;1.26;1.27;1.28;1.29;1.3;1.31;1.32;1.33;1.34;1.35;1.36;1.37;1.38;1.39;1.4;1.41;1.42;1.43;1.44;1.45;1.46;1.47;1.48;1.49;1.5;1.51;1.52;1.53;1.54;1.55;1.56;1.57;1.58;1.59;1.6;1.61;1.62;1.63;1.64;1.65;1.66;1.67;1.68;1.69;1.7;1.71;1.72;1.73;1.74;1.75;1.76;1.77;1.78;1.79;1.8;1.81;1.82;1.83;1.84;1.85;1.86;1.87;1.88;1.89;1.9;1.91;1.92;1.93;1.94;1.95;1.96;1.97;1.98;1.99;2;2.01;2.02;2.03;2.04;2.05;2.06;2.07;2.08;2.09;2.1;2.11;2.12;2.13;2.14;2.15;2.16;2.17;2.18;2.19;2.2;2.21;2.22;2.23;2.24;2.25;2.26;2.27;2.28;2.29;2.3;2.31;2.32;2.33;2.34;2.35;2.36;2.37;2.38;2.39;2.4;2.41;2.42;2.43;2.44;2.45;2.46;2.47;2.48;2.49;2.5;2.51;2.52;2.53;2.54;2.55;2.56;2.57;2.58;2.59;2.6;2.61;2.62;2.63;2.64;2.65;2.66;2.67;2.68;2.69;2.7;2.71;2.72;2.73;2.74;2.75;2.76;2.77;2.78;2.79;2.8;2.81;2.82;2.83;2.84;2.85;2.86;2.87;2.88;2.89;2.9;2.91;2.92;2.93;2.94;2.95;2.96;2.97;2.98;2.99;3;3.01;3.02;3.03;3.04;3.05;3.06;3.07;3.08;3.09;3.1;3.11;3.12;3.13;3.14;3.15;3.16;3.17;3.18;3.19;3.2;3.21;3.22;3.23;3.24;3.25;3.26;3.27;3.28;3.29;3.3;3.31;3.32;3.33;3.34;3.35;3.36;3.37;3.38;3.39;3.4;3.41;3.42;3.43;3.44;3.45;3.46;3.47;3.48;3.49;3.5;3.51;3.52;3.53;3.54;3.55;3.56;3.57;3.58;3.59;3.6;3.61;3.62;3.63;3.64;3.65;3.66;3.67;3.68;3.69;3.7;3.71;3.72;3.73;3.74;3.75;3.76;3.77;3.78;3.79;3.8;3.81;3.82;3.83;3.84;3.85;3.86;3.87;3.88;3.89;3.9;3.91;3.92;3.93;3.94;3.95;3.96;3.97;3.98;3.99;4";
			$this->form = [];
			$this->form[] = ['label'=>'Universitas','name'=>'university_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'universities,name'];
			$this->form[] = ['label'=>'Program Pendidikan','name'=>'program_study_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'program_studies,name'];
			$this->form[] = ['label'=>'Jenjang Pendidikan','name'=>'level_study_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'level_studies,name'];
			$this->form[] = ['label'=>'Nim','name'=>'nim','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nama','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>''];
			$this->form[] = ['label' => 'IPK', 'name' => 'ipk', 'type' => 'select2', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10', 'dataenum' => $ip];
			// $this->form[] = ['label'=>'IPK','name'=>'ipk','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'IPK','name'=>'ipk','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Whatsapp','name'=>'phone','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10', "help"=>"Nomor akan digunakan untuk menerima notifikasi ketika ada pekerjaan baru yang sesuai."];
			$this->form[] = ['label'=>'Email Mahasiswa','name'=>'student_email','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10', "help"=>"Email akan digunakan untuk login."];
			$this->form[] = ['label'=>'Email Personal','name'=>'personal_email','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'TAG','name'=>'tag','type'=>'checkbox','datatable'=>'tags,name','relationship_table'=>'tags_students'];

			$this->form[] = array("label"=>"Kata Sandi","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
			// $this->form[] = array("label"=>"Konfirmasi Kata Sandi","name"=>"password_confirmation","type"=>"password","help"=>"Please leave empty if not change");
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Program Study Id","name"=>"program_study_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"program_studies,name"];
			//$this->form[] = ["label"=>"Level Study Id","name"=>"level_study_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"level_studies,name"];
			//$this->form[] = ["label"=>"Nim","name"=>"nim","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"You can only enter the letter only"];
			//$this->form[] = ["label"=>"Ipk","name"=>"ipk","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Student Email","name"=>"student_email","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Personal Email","name"=>"personal_email","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();
			$this->sub_module[] = ['label'=>'TAG','path'=>'tags_students','parent_columns'=>'name','foreign_key'=>'students_id','button_color'=>'success','button_icon'=>'fa fa-bars'];

	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();
			$this->addaction[] = ['label'=>'Telah berhenti berkerja','url'=>HelpersCRUDBooster::mainpath('set-release-job/[id]'),'icon'=>'fa fa-check','color'=>'danger','showIf'=>"[approved_job_apply_id]", 'confirmation'=> true];

	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
			$example_excel_url = asset('example-student-excel.xlsx');
			// $import_url = Route::name()
			$import_url = HelpersCRUDBooster::mainpath().'/import';
			$csrf_field = csrf_field();
	        $this->post_index_html = '
				<div class="modal fade" id="modal-default">
					<div class="modal-dialog">
						<div class="modal-content">
							<form method="post" action="'.$import_url.'" enctype="multipart/form-data">
								'.$csrf_field.'
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Import Data Mahasiswa</h4>
								</div>
								<div class="modal-body">
									
										<div class="form-group">
											<label for="file" class="label">File Excel</label>
											<input type="file" class="" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
											<p class="help-block">Download template excel <a href="'.$example_excel_url.'">disini</a></p>
										</div>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Upload Dokumen</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			';
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
			$this->load_js[] = asset('js/import-student.js');
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	        $query->leftJoin('job_applies', 'job_applies.id', '=', 'students.approved_job_apply_id', 'left');
			$query->leftJoin('companies', 'job_applies.company_id', '=', 'companies.id', 'left');
			$query->addSelect('companies.name as company_name', 'job_applies.updated_at as approved_at');

			$me = HelpersCRUDBooster::me();
			if($me->type == 'university') {
				$query->where('students.university_id', $me->university_id);
			}
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here
			FacadesDB::beginTransaction();
			$previllege = CmsPrivileges::where('name', '=', 'Mahasiswa')->first();
			// dd($postdata, $previllege);
			if(!$previllege) {
				HelpersCRUDBooster::redirectBack('Previllege was not set! contact your developer', 'danger');
			}

			$user = new CmsUsers();
			$user->name = $postdata['name'];
			$user->email = $postdata['student_email'];
			$user->password = $postdata['password'];
			$user->id_cms_privileges = $previllege->id;
			$user->type = 'student';
			// $user->student_id = $postdata['student_id'];
			$user->save();

			unset($postdata['password']);
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here
			FacadesDB::commit();

			$user = CmsUsers::findById(CmsUsers::lastId());
			$user->student_id = $id;
			$user->save();
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

			if(isset($postdata['password']) && !is_null($postdata['password'])) {
				CmsUsers::where('student_id', '=', $id)
					->update([
						'email' => $postdata['student_email'],
						'password' => $postdata['password']
					]);
				unset($postdata['password']);
			}
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 
		public function getSetReleaseJob($id) {
			$student = Students::findById($id);
			DB::table('students')->where('id', $id)
				->update([
					'approved_job_apply_id' => NULL
				]);

			// SEND NOTIF
			$student_user = CmsUsers::where('student_id', '=', $id)->first();

			if($student_user) {
				$content = "Anda telah diberhentikan dari pekerjaan, sekarang anda dapat mengirimkan lamaran pada postingan yang tersedia.";

				HelpersCRUDBooster::sendNotification([
					'id_cms_users' => [$student_user->id], // USER
					'to' => asset('/'), // URL DIRECT
					'content' => $content,
				]);
			}

			HelpersCRUDBooster::redirectBack("{$student->name} telah diberhentikan berkerja, sekarang dia dapat melamar kembali!", 'success');
		}

		public function postImport() {
			$file = request()->file('file');
			$filename = time().'-'.$file->getClientOriginalName();
			$file->storeAs('temp', $filename);
			
			Excel::import(new StudentImport, "temp/$filename");

			HelpersCRUDBooster::redirectBack("Import mahasiswa telah berhasil!", 'success');
			dd($file);
		}
	}