<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsEmailTemplatesModel extends Model
{
    
	public $id;
	public $name;
	public $slug;
	public $subject;
	public $content;
	public $description;
	public $from_name;
	public $from_email;
	public $cc_email;
	public $created_at;
	public $updated_at;

}