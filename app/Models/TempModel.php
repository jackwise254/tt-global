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
        'datedelivered',
        'customer',
        'list',
        'del'
    ];
    
}