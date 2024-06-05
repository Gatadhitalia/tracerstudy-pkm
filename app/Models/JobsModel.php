<?php
namespace App\Models;

use App\Repositories\JobCategories;
use Crocodic\LaravelModel\Core\Model;

class JobsModel extends Model
{
    
	public $id;
	public $company_id;
	public $program_study_id;
	public $title;
	public $experience;
	public $job_type;
	public $position;
	public $sallary;
	public $placement;
	public $description;
	public $responsibility;
	public $created_at;
	public $updated_at;
	public $job_category_id;

	public $category;

	public function tags() {
		return $this->hasMany(TagJobsModel::class);
	}

	public function category() {
        return JobCategories::find($this->job_category_id);
    }

	public function program_study() {
		return $this->belongsTo(ProgramStudiesModel::class);
	}

	public function company() {
		return $this->belongsTo('App\Models\Companies');
	}

}