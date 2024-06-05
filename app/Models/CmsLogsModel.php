<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsLogsModel extends Model
{
    
	public $id;
	public $ipaddress;
	public $useragent;
	public $url;
	public $description;
	public $details;
	public $id_cms_users;
	public $created_at;
	public $updated_at;

}