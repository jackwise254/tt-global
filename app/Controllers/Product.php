<?php

namespace App\Controllers;

use App\Models\PModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Product extends BaseController {
	
	public function index()	{
		$model = new PModel();
		
		$data['masterlist'] = $model->get_product_list();
		
		return view('products/deletei', $data);
	}
	
	public function delete_products() {
		if ('post' === $this->request->getMethod() && $this->request->getPost('ids')) {
			
			$ids = explode(',', $this->request->getPost('ids'));
			
			$model = new PModel();
			
			$results = $model->delete_products_by_ids($ids);
			
			if ($results === true) {
				echo '<span style="color:green;">Product(s) successfully deleted</span>';
			} else {
				echo '<span style="color:red;">Something went wrong during product deletion</span>';
			}
		} else {
			echo '<span style="color:red;">You must select at least one product row for deletion</span>';
		}
	}

    public function faultyv()
    {
        
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $data['faulty'] = $builder->get()->getResult();


        
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder->select('faulty.*');
        $builder->like('assetid', $q);
        $builder->orLike('brand', $q);
        $builder->orLike('conditions', $q);
        $builder->orLike('model', $q);
        $builder->orLike('modelid', $q);
        $builder->orLike('gen', $q);
        $builder->orLike('cpu', $q);
        $builder->orLike('screen', $q);
        $builder->orLike('price', $q);
        $builder->orLike('customer', $q);
        $builder->orLike('ram', $q);
        $builder->orLike('odd', $q);
        $builder->orLike('comment', $q);
        $builder->orLike('type', $q);

        $data['faulty'] = $builder->get()->getResult();
        foreach($data as $d):
        endforeach;
        $data['num'] = count($d);
        
            // echo'<pre>';
            // print_r($data['faulty']);
    $data['user_data'] = $session->get('designation');

        return view('/faulty/faulty', $data);
           
        } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');

            $data['faulty'] = $builder->get()->getResult();
            $data['num'] = $builder->countAll();

            helper(['url', 'form']);
            return view('/faulty/faulty', $data);
        
        }



        // new function 
        

        
        


        
        
    }

	public function Ndesktop()
    {

        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        
        $db      = \Config\Database::connect();
        $builder1 = $db->table('faulty');
        $builder1->select('faulty.*')->orderBy('time', 'DESC');
        $builder1->where('faulty.conditions = "New" AND type="desktop"' );
            
            if($this->request->getGet('q')) {
             $q=$this->request->getGet('q');
            // $builder1->select('faulty.*');
            $builder1->select('faulty.conditions = "New" AND type="desktop"' );
            $builder1->like('assetid', $q);
            $builder1->orLike('brand', $q);
            $builder1->orLike('conditions', $q);
            $builder1->orLike('model', $q);
            $builder1->orLike('modelid', $q);
            $builder1->orLike('gen', $q);
            $builder1->orLike('cpu', $q);
            $builder1->orLike('screen', $q);
            $builder1->orLike('price', $q);
            $builder1->orLike('customer', $q);
            $builder1->orLike('ram', $q);
            $builder1->orLike('odd', $q);
            $builder1->orLike('comment', $q);
            $builder1->orLike('type', $q);
    
    $data['user_data'] = $session->get('designation');

            $data['Ndesktop'] = $builder1->get()->getResult();
            
            return view('/faulty/Ndesktop', $data);
               
            } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');

                $data['Ndesktop'] = $builder1->get()->getResult();
    
                helper(['url', 'form']);
                return view('/faulty/Ndesktop', $data);
            
            }
    
        }


    public function Odesktop()
    {
      $session = \Config\Services::session();
      $db      = \Config\Database::connect();
    $builder1 = $db->table('users');
    $builder1->select('users.*');
    $builder1->where('users.designation = "admin" ' );
    $sdata['hello'] = $builder1->get()->getResultArray();
    $session->set($sdata);
    $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Used" AND type="desktop"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
   
           $data['Udesktop'] = $builder->get()->getResult();
   
    $data['user_data'] = $session->get('designation');

               return view('/faulty/Udesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');

               $data['Udesktop'] = $builder->get()->getResult();
   
               helper(['url', 'form']);
               return view('/faulty/Udesktop', $data);
           
           }

    }
    public function Rdesktop()
    {
    $session = \Config\Services::session();
    $db      = \Config\Database::connect();
    $builder1 = $db->table('users');
    $builder1->select('users.*');
    $builder1->where('users.designation = "admin" ' );
    $sdata['hello'] = $builder1->get()->getResultArray();
    $session->set($sdata);
    $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();

        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Refurb" AND type="desktop"' );

        
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
    $data['user_data'] = $session->get('designation');
          
           $data['Rdesktop'] = $builder->get()->getResult();
   
           return view('/faulty/Rdesktop', $data);

              
           } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');

            $data['Rdesktop'] = $builder->get()->getResult();
   
               helper(['url', 'form']);
               return view('/faulty/Rdesktop', $data);
           }
    }

    public function rlcdf()
    {

      $session = \Config\Services::session();

      $db      = \Config\Database::connect();
    $builder1 = $db->table('users');
    $builder1->select('users.*');
    $builder1->where('users.designation = "admin" ' );
    $sdata['hello'] = $builder1->get()->getResultArray();
    $session->set($sdata);
    $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();

        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Refurb" AND type="Lcd"' );

        
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
    $data['user_data'] = $session->get('designation');
          
           $data['Rdesktop'] = $builder->get()->getResult();
   
           return view('/faulty/rlcd', $data);

              
           } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');

            $data['Rdesktop'] = $builder->get()->getResult();
   
               helper(['url', 'form']);
               return view('/faulty/rlcd', $data);
           }
    }

    public function ulcdf()
    {

      $session = \Config\Services::session();

      $db      = \Config\Database::connect();
    $builder1 = $db->table('users');
    $builder1->select('users.*');
    $builder1->where('users.designation = "admin" ' );
    $sdata['hello'] = $builder1->get()->getResultArray();
    $session->set($sdata);
    $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();

        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Used" AND type="Lcd"' );

        
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
    $data['user_data'] = $session->get('designation');
          
           $data['Rdesktop'] = $builder->get()->getResult();
   
           return view('/faulty/ulcd', $data);

              
           } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');

            $data['Rdesktop'] = $builder->get()->getResult();
   
               helper(['url', 'form']);
               return view('/faulty/ulcd', $data);
           }
    }

    public function nlcdf()
    {

      $session = \Config\Services::session();

      $db      = \Config\Database::connect();
    $builder1 = $db->table('users');
    $builder1->select('users.*');
    $builder1->where('users.designation = "admin" ' );
    $sdata['hello'] = $builder1->get()->getResultArray();
    $session->set($sdata);
    $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();

        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "New" AND type="Lcd"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
    $data['user_data'] = $session->get('designation');
          
           $data['Rdesktop'] = $builder->get()->getResult();
   
           return view('/faulty/nlcd', $data);

              
           } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');

            $data['Rdesktop'] = $builder->get()->getResult();
   
               helper(['url', 'form']);
               return view('/faulty/nlcd', $data);
           }
    }


    public function Nlaptop()
    {

      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "New" AND type="laptop"' );

        
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');

           $data['Nlaptop'] = $builder->get()->getResult();
            return view('/faulty/Nlaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Nlaptop'] = $builder->get()->getResult();
            return view('/faulty/Nlaptop', $data);
           }


    }

    public function Olaptop()
    {
        

      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');

        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Used" AND type="laptop"' );

        
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
          $data['user_data'] = $session->get('designation');
          
           $data['Ulaptop'] = $builder->get()->getResult();
            return view('/faulty/Ulaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Ulaptop'] = $builder->get()->getResult();
            return view('/faulty/Ulaptop', $data);
           }

    }

    public function Rlaptop()
    {
        
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Refurb" AND type="laptop"' );

        
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');

           $data['Rlaptop'] = $builder->get()->getResult();
        return view('/faulty/Rlaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Rlaptop'] = $builder->get()->getResult();
        return view('/faulty/Rlaptop', $data);
           }

    }

    public function Nallinone()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "New" AND type="allinone"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['Nallinone'] = $builder->get()->getResult();
           return view('/faulty/Nallinone', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Nallinone'] = $builder->get()->getResult();
            return view('/faulty/Nallinone', $data);
           }

    }
    public function smartphonef()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="smartphones"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['Nallinone'] = $builder->get()->getResult();
           return view('/faulty/smartphone', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Nallinone'] = $builder->get()->getResult();
            return view('/faulty/smartphone', $data);
           }

    }

    public function tabletf()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="tablet"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['Nallinone'] = $builder->get()->getResult();
           return view('/faulty/tablet', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Nallinone'] = $builder->get()->getResult();
            return view('/faulty/tablet', $data);
           }

    }

    public function othersf()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="Others"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['Nallinone'] = $builder->get()->getResult();
           return view('/faulty/others', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Nallinone'] = $builder->get()->getResult();
            return view('/faulty/others', $data);
           }

    }



    public function Oallinone()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
      $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Used" AND type="allinone"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['Nallinone'] = $builder->get()->getResult();
            return view('/faulty/Nallinone', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Nallinone'] = $builder->get()->getResult();
            return view('/faulty/Nallinone', $data);
           }

    }

    public function printerf()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="printer"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['Rallinone'] = $builder->get()->getResult();
            return view('/faulty/printersf', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Rallinone'] = $builder->get()->getResult();
            return view('/faulty/printersf', $data);
           }
    }

    public function Rallinone()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.conditions = "Refurb" AND type="allinone"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['Rallinone'] = $builder->get()->getResult();
            return view('/faulty/Rallinone', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['Rallinone'] = $builder->get()->getResult();
            return view('/faulty/Rallinone', $data);
           }

    }

    public function rams()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
      $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="ram"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['ram'] = $builder->get()->getResult();
             return view('/faulty/ram', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['ram'] = $builder->get()->getResult();
            return view('/faulty/ram', $data);
           }

    }

    public function hdd()
    {
      $session = \Config\Services::session();
      $db      = \Config\Database::connect();
      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="hdd"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
           $data['user_data'] = $session->get('designation');
           $data['hdd'] = $builder->get()->getResult();

           echo'<pre>';
           print_r($data['hdd']);
           exit;

          return view('/faulty/hdd', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['hdd'] = $builder->get()->getResult();
            return view('/faulty/hdd', $data);
           }

    }
    

    public function ssd()
    {
      $session = \Config\Services::session();

        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="ssd"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['ssd'] = $builder->get()->getResult();
           return view('/faulty/ssd', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['ssd'] = $builder->get()->getResult();
             return view('/faulty/ssd', $data);
           }

    }


    public function printer()
    {
      $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('time', 'DESC');
        $builder->where('faulty.type="printer"' );
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
           $builder->like('assetid', $q);
           $builder->orLike('brand', $q);
           $builder->orLike('conditions', $q);
           $builder->orLike('model', $q);
           $builder->orLike('modelid', $q);
           $builder->orLike('gen', $q);
           $builder->orLike('cpu', $q);
           $builder->orLike('screen', $q);
           $builder->orLike('price', $q);
           $builder->orLike('customer', $q);
           $builder->orLike('ram', $q);
           $builder->orLike('odd', $q);
           $builder->orLike('comment', $q);
           $builder->orLike('type', $q);
      $data['user_data'] = $session->get('designation');
          
           $data['printer'] = $builder->get()->getResult();
            return view('/faulty/printers', $data);
              
           } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');

            $data['printer'] = $builder->get()->getResult();
             return view('/faulty/printers', $data);
           }

    }


    public function spreadsheetfna()
  {
    $session = \Config\Services::session();

      $db      = \Config\Database::connect();

      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "New" AND type="allinone"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function spreadsheetua()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Used" AND type="allinone"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }
  public function spreadsheetrl()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Refurb" AND type="allinone"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function spreadsheetnl()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "New" AND type="laptop"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);
        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function spreadsheetul()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Used" AND type="laptop"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }
  public function spreadsheetrd()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Refurb" AND type="desktop"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }
  public function spreadsheetud()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Used" AND type="desktop"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }
  public function spreadsheetfnd()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "New" AND type="desktop"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function spreadsheetfs()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.type="ssd"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }


  public function spreadsheetfp()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.type="printer"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyna'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'faultyna'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }
  
  public function printerssp()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('masterlist');   
    $builder->where('masterlist.type="printer"' );
    $builder->select('masterlist.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'printers'.$idd. '.xlsx';

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Id');
  $sheet->setCellValue('B1', 'CONDTIONS');
  $sheet->setCellValue('C1', 'Type');
  $sheet->setCellValue('D1', 'ASSETID');
  $sheet->setCellValue('E1', 'GEN');
  $sheet->setCellValue('F1', 'BRAND');
  $sheet->setCellValue('G1', 'SERIANO');
  $sheet->setCellValue('H1', 'PART');
  $sheet->setCellValue('I1', 'MODELID');
  $sheet->setCellValue('J1', 'MODEL');
  $sheet->setCellValue('K1', 'CPU');
  $sheet->setCellValue('L1', 'SPEED');
  $sheet->setCellValue('M1', 'RAM'); 
  $sheet->setCellValue('N1', 'HDD');
  $sheet->setCellValue('O1', 'ODD');
  $sheet->setCellValue('P1', 'SCREEN');
  $sheet->setCellValue('Q1', 'COMMENT');
  $sheet->setCellValue('R1', 'PRICE'); 
  $sheet->setCellValue('S1', 'CUSTOMER'); 
  $sheet->setCellValue('T1', 'LIST');      
  $sheet->setCellValue('U1', 'STATUS');      
  $sheet->setCellValue('V1', 'DATERECIEVERD');
  $sheet->setCellValue('W1', 'DATEDELIVERED');

  $rows = 2;

  foreach ($users as $val){
      $sheet->setCellValue('A' . $rows, $val->id);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->assetid);
      $sheet->setCellValue('E' . $rows, $val->gen);
      $sheet->setCellValue('F' . $rows, $val->brand);
      $sheet->setCellValue('G' . $rows, $val->serialno);
      $sheet->setCellValue('H' . $rows, $val->part);
      $sheet->setCellValue('I' . $rows, $val->modelid);
      $sheet->setCellValue('J' . $rows, $val->model);
      $sheet->setCellValue('K' . $rows, $val->cpu);
      $sheet->setCellValue('L' . $rows, $val->speed);
      $sheet->setCellValue('M' . $rows, $val->ram);
      $sheet->setCellValue('N' . $rows, $val->hdd);
      $sheet->setCellValue('O' . $rows, $val->odd);
      $sheet->setCellValue('P' . $rows, $val->screen);
      $sheet->setCellValue('Q' . $rows, $val->comment);
      $sheet->setCellValue('R' . $rows, $val->price);
      $sheet->setCellValue('S' . $rows, $val->customer);
      $sheet->setCellValue('T' . $rows, $val->list);
      $sheet->setCellValue('U' . $rows, $val->status);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);

        $rows++;
    } 

      $data = [
          'ref' => $idd,
      ];
      $builder = $db->table("export");
      $builder = $db->table("export.*");
      $db->table('export')->insert($data);
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'printers'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

}