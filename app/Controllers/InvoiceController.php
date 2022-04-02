<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Student extends BaseController
{
    public $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
  	
    public function listStudent()
    {
        
        $data = $this->db->table("users")->get()->getResult();
        return view('list-student', [
            "students" => $data
        ]);
    }

    function generatePDF(){
        $dompdf = new \Dompdf\Dompdf(); 

        $data = $this->db->table("masterlist")->get()->getResult();
        $dompdf->loadHtml(view('pdf/template-students', ["masterlist" => $data]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
        return redirect()->to(base_url('products/products'));
    }
}