<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class WarrantyModel extends Model{
    protected $table = 'warrantyin';
    
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
        'model',
        'modelid',
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