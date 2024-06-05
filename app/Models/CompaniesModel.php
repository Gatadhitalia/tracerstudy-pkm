<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CompaniesModel extends Model
{
    
	public $id;
	public $logo;
	public $name;
	public $bussiness_field;
	public $location;
	public $about;
	public $created_at;
	public $updated_at;

}