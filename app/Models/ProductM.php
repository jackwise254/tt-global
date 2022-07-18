<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ProductM extends Model{
    
    protected $table = 'invoicecreate';
    
    protected $allowedFields = [

        'vendor',
        'address',
        'terms',
        'memo',
        'date',
        'ref',
        'amountdue',
        'billdue',
        'customerjob',
        'billamount',
        'customer',
        'account'

    ];
}