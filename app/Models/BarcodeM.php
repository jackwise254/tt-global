<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class Barcode extends Model{
    protected $table = 'barcodes';
    
    protected $allowedFields = [
        'date',
        'generateBarcode'
    ];
}