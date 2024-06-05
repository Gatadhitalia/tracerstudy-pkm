<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class TagsCompaniesModel extends Model
{
    
	public $id;
	public $tags_id;
	public $companies_id;
	public $created_at;
	public $updated_at;

}