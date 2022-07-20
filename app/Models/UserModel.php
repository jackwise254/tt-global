<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    protected $PrimaryKey ='user_id';
    protected $allowedFields = ['user_name','user_email','user_password','user_created_at', 'fname', 'lname', 'designation', 'user_id'];
}