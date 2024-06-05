<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsPrivilegesRolesModel extends Model
{
    
	public $id;
	public $is_visible;
	public $is_create;
	public $is_read;
	public $is_edit;
	public $is_delete;
	public $id_cms_privileges;
	public $id_cms_moduls;
	public $created_at;
	public $updated_at;

}