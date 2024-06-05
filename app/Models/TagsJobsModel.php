<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class TagsJobsModel extends Model
{
    
	public $id;
	public $tags_id;
	public $jobs_id;
	public $created_at;
	public $updated_at;

}