<?php namespace App\Http\Controllers;

use App\Models\WhatsappLog;
use App\Repositories\Jobs;
use App\Repositories\Students;
use App\Repositories\TagsJobs;
use App\Repositories\TagsStudents;
use Carbon\Carbon;
use crocodicstudio\crudbooster\helpers\CRUDBooster as HelpersCRUDBooster;
use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminJobsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "title";
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
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "jobs";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Kategori Pekerjaan","name"=>"job_category_id","join"=>"job_categories,name"];
			$this->col[] = ["label"=>"Perusahaan","name"=>"company_id","join"=>"companies,name"];
			$this->col[] = ["label"=>"Program Pendidikan","name"=>"program_study_id","join"=>"program_studies,name"];
			$this->col[] = ["label"=>"Judul","name"=>"title"];
			$this->col[] = ["label"=>"Pengalaman","name"=>"experience"];
			$this->col[] = ["label"=>"Tipe Pekerjaan","name"=>"job_type"];
			$this->col[] = ["label"=>"Posisi","name"=>"position"];
			$this->col[] = ["label"=>"Penawaran Gaji","name"=>"sallary"];
			$this->col[] = ["label"=>"Penempatan","name"=>"placement"];
			
			$this->col[] = ["label"=>"Deskripsi Pekerjaan","name"=>"description"];
			$this->col[] = ["label"=>"Tanggung Jawab","name"=>"responsibility"];
			# END COLUMNS DO NOT REMOVE THIS LINE
			
			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Kategori Pekerjaan','name'=>'job_category_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'job_categories,name'];
			$this->form[] = ['label'=>'Perusahaan','name'=>'company_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'companies,name'];
			$this->form[] = ['label'=>'Program Pendidikan','name'=>'program_study_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'program_studies,name'];
			$this->form[] = ['label'=>'Judul','name'=>'title','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			$this->form[] = ['label'=>'Pengalaman','name'=>'experience','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10', 'dataenum' => 'Fresh Graduate;Minimal 1 tahun;Minimal 2 tahun;Minimal 3 tahun;Profesional'];
			$this->form[] = ['label'=>'Tipe Pekerjaan','name'=>'job_type','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10', 'dataenum' => 'Part Time;Full Time;Sementara;Kontrak;Magang'];
			$this->form[] = ['label'=>'Posisi','name'=>'position','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Penawaran Gaji','name'=>'sallary','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10', 'dataenum' => '<1;1;1.5;2;2.5;3;3.5;4;4.5;5;5.5;6;6.5;7;7.5;8;8.5;9;9.5;10;>10'];
			$this->form[] = ['label'=>'Penempatan','name'=>'placement','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'TAG','name'=>'tag','type'=>'checkbox','datatable'=>'tags,name','relationship_table'=>'tags_jobs'];
			$this->form[] = ['label'=>'Deskripsi','name'=>'description','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tanggung Jawab','name'=>'responsibility','type'=>'wysiwyg','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Company Id","name"=>"company_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"companies,name"];
			//$this->form[] = ["label"=>"Title","name"=>"title","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"You can only enter the letter only"];
			//$this->form[] = ["label"=>"Experience","name"=>"experience","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Job Type","name"=>"job_type","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Position","name"=>"position","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Sallary","name"=>"sallary","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Placement","name"=>"placement","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Description","name"=>"description","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Responsibility","name"=>"responsibility","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
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
			$this->sub_module[] = ['label'=>'TAG','path'=>'tags_jobs','parent_columns'=>'name','foreign_key'=>'jobs_id','button_color'=>'success','button_icon'=>'fa fa-bars'];

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
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
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
	        $me = HelpersCRUDBooster::me();
			if($me->type == 'company') {
				$query->where('jobs.company_id', $me->company_id);
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
			$job = Jobs::findById($id);

			$tags = TagsJobs::where('jobs_id', '=', $id)->get()->map(function($map) {
				return $map->tags_id;
			});
			
			$student_ids = TagsStudents::whereIn('tags_id', $tags->toArray())->get()->map(function($map) {
				return $map->students_id;
			});

			$students = Students::whereIn('id', $student_ids->toArray())
				->whereNotNull('phone')
				->get();

			$data = [];
			$job_url = route('landing.job.detail', $id);
			$base_url = url('/');
			$time = Carbon::now()->format('d/m/Y H:i:s A');

			foreach ($students as $key => $student) {
				$data[] = [
					'phone_number' => $student->phone,
					'message'=> "📣[INFO LOWONGAN KERJA]📢\nSelamat Pagi Munchaminna,\n\nDibutuhkan $job->title\n\nUntuk Lebih Jelaskan Silahkan langsung Klik Link Pendaftaran dibawah ini\n\n$job_url\n\nBest Regards,\nNURUL ANISA SRI WINARSIH\nPembina Pekan Kreatif Mahasiswa\nUniversitas Dian Nuswantoro\nJl. Imam Bonjol No.207, Pendrikan Kidul\nSemarang - Indonesia\n(WA), +62 811-2611-994\nWeb   : $base_url\nEmail : tracerstudy.dev@gmail.com\n\nWaktu: $time",
				];
			}

			WhatsappLog::insert($data);
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


	}