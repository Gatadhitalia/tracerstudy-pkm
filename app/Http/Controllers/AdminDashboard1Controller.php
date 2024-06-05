<?php namespace App\Http\Controllers;

use App\Repositories\Companies;
use App\Repositories\JobApplies;
use App\Repositories\Jobs;
use App\Repositories\Students;
use App\Repositories\TagsJobs;
use App\Repositories\TagsStudents;
use crocodicstudio\crudbooster\helpers\CRUDBooster as HelpersCRUDBooster;
use Session;
	use Request;
	use DB;
	use CRUDBooster;
use Illuminate\Support\Facades\DB as FacadesDB;

	class AdminDashboard1Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "companies";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Logo","name"=>"logo"];
			$this->col[] = ["label"=>"Name","name"=>"name"];
			$this->col[] = ["label"=>"Bussiness Field","name"=>"bussiness_field"];
			$this->col[] = ["label"=>"Location","name"=>"location"];
			$this->col[] = ["label"=>"About","name"=>"about"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Logo','name'=>'logo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'Anda hanya dapat memasukkan huruf saja'];
			$this->form[] = ['label'=>'Bussiness Field','name'=>'bussiness_field','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Location','name'=>'location','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'About','name'=>'about','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Logo","name"=>"logo","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"Anda hanya dapat memasukkan huruf saja"];
			//$this->form[] = ["label"=>"Bussiness Field","name"=>"bussiness_field","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Location","name"=>"location","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"About","name"=>"about","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
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

		public function getIndex() {
			$me = HelpersCRUDBooster::me();
			$data = [];

			$student_tags = [];
			$student_tags_id = TagsStudents::table()->where('students_id', $me->student_id)->pluck('tags_id')->toArray();
			$student_tags_id_implode = implode(", ", $student_tags_id);

			// STUDENT
			if($me->type == 'student') {
				$data['apply'] = JobApplies::where('student_id', '=', $me->student_id)
					->orderBy('id', 'desc')
					->first();
			}
			if($student_tags_id) {
				$data['jobs_suitable'] = Jobs::table()
		
					->join("job_categories", "job_categories.id", "=", "job_category_id")
					->join("program_studies", "program_studies.id", "=", "program_study_id")
					->join("companies", "companies.id", "=", "company_id")
		
					->whereRaw("exists (
						select 
							tags_id 
						from tags_jobs 
						where tags_jobs.jobs_id = jobs.id 
							and tags_jobs.tags_id in ($student_tags_id_implode))
					")
		
					->select('jobs.*')
					->addSelectTable('job_categories', 'category', ['id', 'created_at', 'updated_at'])
					->addSelectTable('program_studies', 'program_study', ['id', 'created_at', 'updated_at'])
					->addSelectTable('companies', 'company', ['id', 'created_at', 'updated_at'])
		
					->limit(4)
					->orderByDesc('jobs.id')
					->get()
					->map(function($map) {
						$map->tags = TagsJobs::where('jobs_id', '=',$map->id)
							->join("tags","tags.id", "=", "tags_id")
							->select('tags.name')
							->limit(3)
							->get();
						return $map;
					});
			} else {
				$data['jobs_suitable'] = collect([]);
			}

			// COMPANY
			$data['pending_apply_job'] = JobApplies::where('company_id', '=', $me->company_id)->where('status', '=', 'pending')->count();
			$data['jobs'] = Jobs::where('company_id', '=', $me->company_id)->get();
			
			// ADMIN
			$data['student_count'] = Students::table()->count();
			$data['company_count'] = Companies::table()->count();
			$data['job_count'] = Jobs::table()->count();
			$data['apply_count'] = JobApplies::table()->count();

			$total_day_month = date('t');
			$db_raw_day = '';
			for ($i = 1; $i <= $total_day_month; $i++) {
				$db_raw_day .= 'SELECT ' . $i . ' as day UNION ';
			}
			$db_raw_day = rtrim($db_raw_day, 'UNION ');
			$job_applies_per_day = FacadesDB::table(FacadesDB::raw('(' . $db_raw_day . ') as days'))
            ->leftJoin('job_applies', function ($join) {
                $join->on(FacadesDB::raw('DAY(job_applies.created_at)'), '=', 'days.day')
                    ->whereMonth('job_applies.created_at', date('m'))
                    ->whereYear('job_applies.created_at', date('Y'));
            })
            // ->when($university_id, function ($query) use ($university_id) {
            //     return $query->where('job_applies.university_id', $university_id);
            // })
            ->select(FacadesDB::raw('days.day as day'), FacadesDB::raw('CAST(COALESCE(count(job_applies.id), 0) AS UNSIGNED) as total'))
            ->groupBy('days.day')
            ->get();
			$data['stats_per_day'] = app()->chartjs
            ->name('statsLineChart')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels($job_applies_per_day->pluck('day')->toArray())
            ->datasets([
                [
                    "label" => "Jumlah Lamaran Masuk Bulan Ini",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $job_applies_per_day->pluck('total')->toArray(),
                ]
            ])
            ->options([]);
			

			if($me->type == 'student') {
				return view('dashboard.student', $data);
			}

			if($me->type == 'company') {
				return view('dashboard.company', $data);
			}
			
			return view('dashboard.admin', $data);
		}
	}