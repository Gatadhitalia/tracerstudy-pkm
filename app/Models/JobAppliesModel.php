<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class JobAppliesModel extends Model
{
    
	public $id;
	public $company_id;
	public $job_id;
	public $student_id;
	public $resume_file;
	public $state;
	public $status;
	public $interview_date;
	public $created_at;
	public $updated_at;

}