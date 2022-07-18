<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class WarrantyModel extends Model{
    protected $table = 'warrantyin';
    
    protected $allowedFields = [
        'conditions',
        'type',
        'assetid',
<<<<<<< HEAD
        'brand',
=======
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
        'gen',
        'ram',
        'screen',
        'odd',
        'comment',
        'part',
        'status',
<<<<<<< HEAD
        'model',
        'modelid',
=======
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
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