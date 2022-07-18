<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ProductModel extends Model{
    protected $table = 'masterlist';
    
    protected $allowedFields = [
        'conditions',
        'type',
        'assetid',
        'gen',
        'ram',
        'screen',
        'odd',
        'comment',
        'part',
        'status',
        'qty',
        'serialno',
        'modelid',
        'cpu',
        'hdd',
        'speed',
        'price',
        'daterecieved',
        'datedelivered',
        'customer',
        'list',
<<<<<<< HEAD
        'del',
=======
        'del'
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
    ];
    function insert_csv($data) {
        $this->db->insert('massterlist', $data);
    }
    function posts()
    {
    $query = $this
    ->db
    ->limit(10)
    ->get('masterlist');
     
    if($query->num_rows()>0)
    {
    return $query->result();
    }
    else
    {
    return null;
    }
     
    }
     
    // posts_save function
    function posts_save($id,$fields_val)
    {
    $this ->db
    ->where('id',$id)
    ->update('masterlist',$fields_val);
    }
     
    }
    