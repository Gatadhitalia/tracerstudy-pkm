<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\JobsModel;
use App\Models\Schemas;
use App\Models\Student;
use App\Repositories\JobApplies;
use App\Repositories\JobCategories;
use App\Repositories\Jobs;
use App\Repositories\TagsJobs;
use App\Repositories\TagsStudents;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index() 
    {
        $data['jobs_newest'] = Jobs::table()

            ->join("job_categories", "job_categories.id", "=", "job_category_id")
            ->join("program_studies", "program_studies.id", "=", "program_study_id")
            ->join("companies", "companies.id", "=", "company_id")

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
        $jobs_newest_id = $data['jobs_newest']->pluck('id')->toArray();
        // Part Time;Full Time
        $data['jobs_types'] = Jobs::table()

            ->join("job_categories", "job_categories.id", "=", "job_category_id")
            ->join("program_studies", "program_studies.id", "=", "program_study_id")
            ->join("companies", "companies.id", "=", "company_id")

            ->select('jobs.*')
            ->addSelectTable('job_categories', 'category', ['id', 'created_at', 'updated_at'])
            ->addSelectTable('program_studies', 'program_study', ['id', 'created_at', 'updated_at'])
            ->addSelectTable('companies', 'company', ['id', 'created_at', 'updated_at'])

            // ->whereNotIn('jobs.id', $jobs_newest_id)
            ->whereIn('job_type', ['Part Time', 'Full Time'])
            ->limit(8)
            ->orderByDesc('jobs.id')
            ->get()
            ->map(function($map) {
                $map->tags = TagsJobs::where('jobs_id', '=',$map->id)
                    ->join("tags","tags.id", "=", "tags_id")
                    ->select('tags.name')
                    ->limit(3)
                    ->get();
                return $map;
            })
            ->groupBy('job_type');
        
        $me = CRUDBooster::me();
        $student_tags = [];
        $student_tags_id = TagsStudents::table()->where('students_id', ($me->student_id ?? null))->pluck('tags_id')->toArray();
        $student_tags_id_implode = implode(", ", $student_tags_id);

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

        $data['placements'] = Jobs::table()->get()->pluck('placement');
        $data['job_categories'] = DB::select("
            select 
                A.*,
                (select count(jobs.id) from jobs where jobs.job_category_id = A.id) as job_count
            from job_categories A

        ");
        return view('landing.index', $data);
    }

    public function job() {
        $limit = 10;
        $offset = g('page') ? (g('page') * $limit) - $limit : 0;

        $data = [];
        $data['jobs'] = Jobs::table()

            ->join("job_categories", "job_categories.id", "=", "job_category_id")
            ->join("program_studies", "program_studies.id", "=", "program_study_id")
            ->join("companies", "companies.id", "=", "company_id")

            ->select('jobs.*')
            ->addSelectTable('job_categories', 'category', ['id', 'created_at', 'updated_at'])
            ->addSelectTable('program_studies', 'program_study', ['id', 'created_at', 'updated_at'])
            ->addSelectTable('companies', 'company', ['id', 'created_at', 'updated_at'])

            ->when(g('search'), function($q) {
                $q->where('jobs.title', 'like', '%'.g('search').'%')
                    ->orWhere('companies.name', 'like', '%'.g('search').'%');
            })
            ->when(g('placement') && g('placement') !== 'all', function($q) {
                $q->where('placement', '=', g('placement'));
            })
            ->when(g('job_category_id'), function($q) {
                $q->where('job_category_id', '=', g('job_category_id'));
            })
            ->when(g('experience'), function($q) {
                $q->where('experience', '=', g('experience'));
            })
            ->when(g('job_type'), function($q) {
                $q->where('job_type', '=', g('job_type'));
            })

            ->offset($offset)
            ->limit($limit)
            ->get()
            ->map(function($map) {
                $map->tags = TagsJobs::where('jobs_id', '=',$map->id)
                    ->join("tags","tags.id", "=", "tags_id")
                    ->select('tags.name')
                    ->limit(3)
                    ->get();
                return $map;
            });
        $data['job_page_count'] = Jobs::table()
            ->when(g('search'), function($q) {
                $q->where('jobs.title', 'like', '%'.g('search').'%')
                    ->orWhere('companies.name', 'like', '%'.g('search').'%');
            })
            ->when(g('placement') && g('placement') !== 'all', function($q) {
                $q->where('placement', '=', g('placement'));
            })
            ->when(g('job_category_id'), function($q) {
                $q->where('job_category_id', '=', g('job_category_id'));
            })
            ->when(g('experience'), function($q) {
                $q->where('experience', '=', g('experience'));
            })
            ->when(g('job_type'), function($q) {
                $q->where('job_type', '=', g('job_type'));
            })
            ->count() / $limit;
            
        $data['placements'] = Jobs::table()->get()->pluck('placement');
        $data['job_categories'] = DB::select("
            select 
                A.*,
                (select count(jobs.id) from jobs where jobs.job_category_id = A.id) as job_count
            from job_categories A

        ");
        
        

        // dd($data['jobs'][0]);
        return view('landing.job', $data);
    }

    public function jobDetail($id) {
        $data = [];
        $data['job'] = Jobs::table()

        ->join("job_categories", "job_categories.id", "=", "job_category_id")
        ->join("program_studies", "program_studies.id", "=", "program_study_id")
        ->join("companies", "companies.id", "=", "company_id")

        ->select('jobs.*')
        ->addSelectTable('job_categories', 'category', ['id', 'created_at', 'updated_at'])
        ->addSelectTable('program_studies', 'program_study', ['id', 'created_at', 'updated_at'])
        ->addSelectTable('companies', 'company', ['id', 'created_at', 'updated_at'])

        ->where('jobs.id', '=', $id)
        ->first();

        $data['job']->tags = TagsJobs::where('jobs_id', '=', $data['job']->id)
        ->join("tags","tags.id", "=", "tags_id")
        ->select('tags.name')
        ->limit(3)
        ->get();

        $data['job']->applied_count = JobApplies::where('job_id', '=', $data['job']->id)->count();
        // dd($data['job']);
        return view('landing.job-detail', $data);
    }
    
    public function apply(Request $request)
    {
        $resume_file = CRUDBooster::uploadFile('resume_file');
        $job = Jobs::findById($request->job_id);
        if(!$job) {
            CRUDBooster::redirectBack('Pekerjaan tidak ditemukan', 'error');
        }

        $exist = JobApplies::where('job_id', '=' ,$request->job_id)
            ->where('student_id', '=' ,$request->student_id)
            ->first();
        if($exist) {
            CRUDBooster::redirectBack('Anda sudah melamar pekerjaan ini', 'error');
        }

        $apply = new JobApplies();
        $apply->company_id = $job->company_id;
        $apply->job_id = $request->job_id;
        $apply->student_id = $request->student_id;
        $apply->resume_file = $resume_file;
        $apply->save();

        CRUDBooster::redirectBack('Berhasil melamar, cek dashboard anda secara berkala!', 'success');
    }
}
