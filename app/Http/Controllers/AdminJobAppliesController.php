<?php namespace App\Http\Controllers;

use App\Repositories\CmsUsers;
use App\Repositories\Companies;
use App\Repositories\JobApplies;
use App\Repositories\Jobs;
use App\Repositories\Students;
use crocodicstudio\crudbooster\helpers\CRUDBooster as HelpersCRUDBooster;
use Session;
	use Request;
	use DB;
	use CRUDBooster;
use Illuminate\Support\Facades\DB as FacadesDB;

	class AdminJobAppliesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = false;
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "job_applies";
			$me = HelpersCRUDBooster::me();
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Perusahaan","name"=>"company_id","join"=>"companies,name"];
			$this->col[] = ["label"=>"Pekerjaan","name"=>"job_id","join"=>"jobs,title"];
			$this->col[] = ["label"=>"Mahasiswa","name"=>"student_id","join"=>"students,name"];
			$this->col[] = ["label"=>"Berkas","name"=>"resume_file","download"=>true];
			$this->col[] = ["label"=>"Alur","name"=>"state", 'callback_php' => '$row->state == "waiting_verification" ? "Menunggu Verifikasi" : ($row->state == "interview" ? "Proses/Jadwal Wawancara" : "Selesai") '];
			$this->col[] = ["label"=>"Tanggal Interview","name"=>"interview_date", 'callback_php' => '$row->state == "interview" | $row->state == "finish" ? date("d M Y", strtotime($row->interview_date)) : " - Menunggu Alur"'];
			$this->col[] = ["label"=>"Status","name"=>"status", 'callback_php' => '$row->status == "pending" ? " - Menunggu Alur" : ($row->status == "approved" ? "Lamaran Diterima" : "Lamaran Ditolak") '];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Perusahaan','name'=>'company_id','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'companies,name'];
			$this->form[] = ['label'=>'Pekerjaan','name'=>'job_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'jobs,title'];
			$this->form[] = ['label'=>'Mahasiswa','name'=>'student_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'students,name'];
			$this->form[] = ['label'=>'Berkas','name'=>'resume_file','type'=>'upload','validation'=>'required','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Alur','name'=>'state','type'=>'select','dataenum'=>'waiting_verification|Menunggu Verifikasi;interview|Wawancara;finish|Selesai','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tanggal Interview','name'=>'interview_date','type'=>'datetime','validation'=>'','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'select','dataenum'=>'pending|Menunggu;rejected|Ditolak;approved|Diterima','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Company Id","name"=>"company_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"company,id"];
			//$this->form[] = ["label"=>"Student Id","name"=>"student_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"student,id"];
			//$this->form[] = ["label"=>"Resume File","name"=>"resume_file","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"State","name"=>"state","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Interview Date","name"=>"interview_date","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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

			if($me->type == 'company' || HelpersCRUDBooster::isSuperadmin()) {
				$this->addaction[] = ['label'=>'Set Interview','url'=>HelpersCRUDBooster::mainpath('set-state/interview/[id]'),'icon'=>'fa fa-check','color'=>'success','showIf'=>"[state] == 'waiting_verification'"];
				$this->addaction[] = ['label'=>'Set Selesai Interview','url'=>HelpersCRUDBooster::mainpath('set-state/finish/[id]'),'icon'=>'fa fa-check','color'=>'success','showIf'=>"[state] == 'interview'"];
				$this->addaction[] = ['label'=>'Set Diterima','url'=>HelpersCRUDBooster::mainpath('set-status/approved/[id]'),'icon'=>'fa fa-check','color'=>'success','showIf'=>"[state] == 'finish' && [status] == 'pending'"];
				$this->addaction[] = ['label'=>'Set Ditolak','url'=>HelpersCRUDBooster::mainpath('set-status/rejected/[id]'),'icon'=>'fa fa-check','color'=>'danger','showIf'=>"[state] == 'finish' && [status] == 'pending'"];

			}

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
			// $this->button_selected[] = ['label'=>'Set Active','icon'=>'fa fa-check','name'=>'set_active'];
	                
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
	        $this->script_js = "
				$(document).ready(function() {
					$('a[title=\"Set Interview\"]').on('click', function(e) {
						var el = e.currentTarget;
						e.preventDefault();
						
						$('#form-set-interview').attr('action', el.href);
						$('#modal-set-interview').modal('show'); 
					});

					$('#datepicker').datetimepicker()
				});
			";


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
	        $this->post_index_html = '
				<div class="modal fade" id="modal-set-interview">
					<div class="modal-dialog">
						<div class="modal-content">
							<form id="form-set-interview">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Set Interview</h4>
								</div>
								<div class="modal-body">
										<div class="form-group">
											<label>Tanggal Interview:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" id="datepicker" class="form-control" name="interview_date" data-inputmask="\'alias\': \'dd/mm/yyyy H:i\'" data-mask required>
											</div>
										</div>
									
									</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
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
			$this->load_js[] = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js";
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = "";
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        $this->load_css[] = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css";
	        
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
			// $this->arr[$name] = CRUDBooster::uploadFile($name, $ro['encrypt'] || $ro['upload_encrypt'], $ro['resize_width'], $ro['resize_height'], CB::myId());
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
			$me = HelpersCRUDBooster::me();
			if($me->type == 'student') {
				$query->where('job_applies.student_id', $me->student_id);
			} else if($me->type == 'company') {
				$query->where('job_applies.company_id', $me->company_id);
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
			$job = Jobs::findById($postdata['job_id']);
			$postdata['company_id'] = $job->company_id;
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
			$job = Jobs::findById($postdata['job_id']);
			$postdata['company_id'] = $job->company_id;
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
		public function getSetState($state,$id) {
			$apply = JobApplies::findById($id);
			$apply->state = $state;
			if($state == 'interview') {
				$apply->interview_date = g('interview_date');
			}
			$apply->save();
			
			// SEND NOTIF
			$student_user = CmsUsers::where('student_id', '=',$apply->student_id)->first();

			if($student_user) {
				$content = "";
				if($state == 'interview') {
					$company = Companies::findById($apply->company_id);
					$date = date("d M Y", strtotime($apply->interview_date));
					$content = "Selamat, anda diundang interview oleh $company->name pada $date.";
				} else if($state == 'finish') {
					$content = "Alur lamaran anda telah selesai, silahkan menunggu informasi keterangan lebih lanjut dari perusahaan.";
				}
				HelpersCRUDBooster::sendNotification([
					'id_cms_users' => [$student_user->id], // USER
					'to' => HelpersCRUDBooster::mainpath('detail/'.$id), // URL DIRECT
					'content' => $content,
				]);
			}

			//This will redirect back and gives a message
			HelpersCRUDBooster::redirectBack("Berhasil", 'success');
		}
		public function getSetStatus($status,$id) {
			FacadesDB::beginTransaction();

			$apply = JobApplies::findById($id);
			$apply->status = $status;
			$apply->save();

			$student = Students::findById($apply->student_id);
			$student->approved_job_apply_id = $apply->id;
			$student->save();

			// SEND NOTIF
			$student_user = CmsUsers::where('student_id', '=',$apply->student_id)->first();

			if($student_user) {
				$content = "";

				$company = Companies::findById($apply->company_id);
				if($status == 'rejected') {
					$content = "Mohon maaf, lamaran anda pada $company->name tidak disetujui. Silahkan mencari postingan lowongan lain yang terdapat diwebsite.";
				} else if($status == 'approved') {
					$job = Jobs::findById($apply->job_id);
					$content = "Selamat, anda telah diterima pada $company->name sebagai $job->title.";
				}
				HelpersCRUDBooster::sendNotification([
					'id_cms_users' => [$student_user->id], // USER
					'to' => HelpersCRUDBooster::mainpath('detail/'.$id), // URL DIRECT
					'content' => $content,
				]);
			}

			FacadesDB::commit();
			
			//This will redirect back and gives a message
			HelpersCRUDBooster::redirectBack("Berhasil", 'success');
		}

	}