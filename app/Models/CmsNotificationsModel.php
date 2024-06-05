<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsNotificationsModel extends Model
{
    
	public $id;
	public $id_cms_users;
	public $content;
	public $url;
	public $is_read;
	public $created_at;
	public $updated_at;

}