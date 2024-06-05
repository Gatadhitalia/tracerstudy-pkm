<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsMenusModel extends Model
{
    
	public $id;
	public $name;
	public $type;
	public $path;
	public $color;
	public $icon;
	public $parent_id;
	public $is_active;
	public $is_dashboard;
	public $id_cms_privileges;
	public $sorting;
	public $created_at;
	public $updated_at;

}