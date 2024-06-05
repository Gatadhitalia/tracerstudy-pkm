<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class UniversitiesModel extends Model
{
    
	public $id;
	public $logo;
	public $name;
	public $phone_number;
	public $email;
	public $address;
	public $created_at;
	public $updated_at;

}