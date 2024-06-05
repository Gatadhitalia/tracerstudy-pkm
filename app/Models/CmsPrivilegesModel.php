<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsPrivilegesModel extends Model
{
    
	public $id;
	public $name;
	public $is_superadmin;
	public $theme_color;
	public $created_at;
	public $updated_at;

}