<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsModulsModel extends Model
{
    
	public $id;
	public $name;
	public $icon;
	public $path;
	public $table_name;
	public $controller;
	public $is_protected;
	public $is_active;
	public $created_at;
	public $updated_at;
	public $deleted_at;

}