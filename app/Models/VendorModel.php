<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class VendorModel extends Model{
    protected $table = 'vendors';
    protected $PrimaryKey ='user_id';
    protected $allowedFields = ['phone','email','user_password','user_created_at', 'fname', 'lname', 'location', 'username', 'id_no'];

}