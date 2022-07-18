<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class technicianModel extends Model{
    protected $table = 'technician';
    
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
        'qty',
        'serialno',
<<<<<<< HEAD
        'model',
=======
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
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
    