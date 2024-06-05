<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsSettingsModel extends Model
{
    
	public $id;
	public $name;
	public $content;
	public $content_input_type;
	public $dataenum;
	public $helper;
	public $created_at;
	public $updated_at;
	public $group_setting;
	public $label;

}