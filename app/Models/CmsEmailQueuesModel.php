<?php
namespace App\Models;

use Crocodic\LaravelModel\Core\Model;

class CmsEmailQueuesModel extends Model
{
    
	public $id;
	public $send_at;
	public $email_recipient;
	public $email_from_email;
	public $email_from_name;
	public $email_cc_email;
	public $email_subject;
	public $email_content;
	public $email_attachments;
	public $is_sent;
	public $created_at;
	public $updated_at;

}