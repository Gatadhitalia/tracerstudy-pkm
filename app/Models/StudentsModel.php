<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class StudentsModel extends Model
{
    
	public $id;
	public $program_study_id;
	public $level_study_id;
	public $nim;
	public $name;
	public $ipk;
	public $student_email;
	public $personal_email;
	public $approved_job_apply_id;
	public $created_at;
	public $updated_at;
	public $university_id;
	public $phone;

}