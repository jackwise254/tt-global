<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class TempModel extends Model{
    protected $table = 'tempinsert';
    
    protected $allowedFields = [
        'conditions',
        'type',
        'assetid',
        'brand',
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
        'model',
        'cpu',
        'hdd',
        'speed',
        'price',
<<<<<<< HEAD
=======
        'daterecieved',
        'datedelivered',
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
        'customer',
        'list',
        'del'
    ];
    function insert_csv($data) {
        $this->db->insert('templist', $data);
    }
    function posts()
    {
    $query = $this
    ->db
    ->limit(10)
    ->get('templist');
     
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
    ->update('templist',$fields_val);
    }
     
    }
    