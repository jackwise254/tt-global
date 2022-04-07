<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class WarrantyModel extends Model{
    protected $table = 'warrantyin';
    
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