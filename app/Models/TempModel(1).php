<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class TempModel extends Model{
    protected $table = 'templist';
    
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
    