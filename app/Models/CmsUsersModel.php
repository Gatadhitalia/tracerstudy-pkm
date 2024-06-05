<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsUsersModel extends Model
{
    
	public $id;
	public $name;
	public $photo;
	public $email;
	public $password;
	public $id_cms_privileges;
	public $created_at;
	public $updated_at;
	public $status;
	public $type;
	public $company_id;
	public $student_id;
	public $university_id;

}