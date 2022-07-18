<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class technicianModel extends Model{
    protected $table = 'technician';
    
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
        'model',
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
    