<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsStatisticComponentsModel extends Model
{
    
	public $id;
	public $id_cms_statistics;
	public $componentID;
	public $component_name;
	public $area_name;
	public $sorting;
	public $name;
	public $config;
	public $created_at;
	public $updated_at;

}