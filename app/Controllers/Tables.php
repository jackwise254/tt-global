<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

use App\Models\ProductModel; 
class Tables extends CI_Controller
{
// construct function
Public function __construct()
{
parent::__construct();
// $this->load->model('productmodel');
}
 
// index function
public function index()
{
	$productmodel = new ProductModel();
$datas['posts'] = $this->productmodel->posts();
 

return view('tablepage',$datas);
}
 
// datasave function
public function datasave()
{
If( $_SERVER['REQUEST_METHOD']  != 'POST'  )
{
redirect('table');
}
 
$id = $this->input->post('id',true);
$title = $this->input->post('title',true);
 
$fields_val = array(
'title' => $title,
);
 
$this->productmodel->posts_save($id,$fields_val);
 
echo "Successfully data saved";
 
}


public function Nlaptop()
{
	//   laptop
	
	



			$session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $db      = \Config\Database::connect();

			$builder = $db->table('faultyout');
			$builder->select('faultyout.*');
			$builder->where('faultyout.conditions = "New" AND type="laptop"' );
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
		   return view('/faultyout/Nlaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Nlaptop'] = $builder->get()->getResult();
			return view('/faultyout/Nlaptop', $data);
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

			$builder = $db->table('faultyout');
			$builder->select('faultyout.*');
			$builder->where('faultyout.conditions = "Used" AND type="laptop"' );

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
		   return view('/faultyout/Ulaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Ulaptop'] = $builder->get()->getResult();
	        return view('/faultyout/Ulaptop', $data);
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

			$builder = $db->table('faultyout');
			$builder->select('faultyout.*');
			$builder->where('faultyout.conditions = "Refurb" AND type="laptop"' );
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
		   return view('/faultyout/Rlaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rlaptop'] = $builder->get()->getResult();
			return view('/faultyout/Rlaptop', $data);
           }

}

public function Nallinone()
{
	// all in one
			$session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $db      = \Config\Database::connect();

			$builder = $db->table('faultyout');
			$builder->select('faultyout.*');
			$builder->where('faultyout.conditions = "New" AND type="allinone"' );
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
		   return view('/faultyout/Nallinone', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
			$data['Nallinone'] = $builder->get()->getResult();
			return view('/faultyout/Nallinone', $data);
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

			$builder = $db->table('faultyout');
			$builder->select('faultyout.*');
			$builder->where('faultyout.conditions = "Used" AND type="allinone"' );
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
		   $data['Uallinone'] = $builder->get()->getResult();
		   return view('/faultyout/Udesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
			$data['Uallinone'] = $builder->get()->getResult();
			return view('/faultyout/Udesktop', $data);
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

	$builder = $db->table('faultyout');
	$builder->select('faultyout.*');
	$builder->where('faultyout.conditions = "Refurb" AND type="allinone"' );

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
   return view('/faultyout/Rallinone', $data);
	  
   } elseif(!$this->request->getGet('q')) {
	$data['user_data'] = $session->get('designation');
	$data['Rallinone'] = $builder->get()->getResult();
	return view('/faultyout/Rallinone', $data);
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

	$builder = $db->table('faultyout');
	$builder->select('faultyout.*');
	$builder1->where('faultyout.type="ram"' );
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
   return view('/faultyout/ram', $data);
	  
   } elseif(!$this->request->getGet('q')) {
	$data['user_data'] = $session->get('designation');
	$data['ram'] = $builder->get()->getResult();
	return view('/faultyout/ram', $data);
   }

}

public function hdds()
{
	//   final groups
  $session = \Config\Services::session();

	$db      = \Config\Database::connect();

	$builder1 = $db->table('users');
	$builder1->select('users.*');
	$builder1->where('users.designation = "admin" ' );
	$sdata['hello'] = $builder1->get()->getResultArray();
	$session->set($sdata);
	$data['user_data'] = $session->get('designation');
	
	$db      = \Config\Database::connect();

	$builder = $db->table('faultyout');
	$builder->select('faultyout.*');
	$builder1->where('faultyout.type="hdd"' );
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
   return view('/faultyout/hdd', $data);
	  
   } elseif(!$this->request->getGet('q')) {
	$data['user_data'] = $session->get('designation');
	$data['hdd'] = $builder->get()->getResult();
	return view('/faultyout/hdd', $data);
   }

}

public function ssd()
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

	$builder = $db->table('faultyout');
	$builder->select('faultyout.*');
	$builder1->where('faultyout.type="ssd"' );
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
	return view('/faultyout/ssd', $data);
	  
   } elseif(!$this->request->getGet('q')) {
	$data['user_data'] = $session->get('designation');
	$data['ssd'] = $builder->get()->getResult();
	return view('/faultyout/ssd', $data);
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

	$builder = $db->table('faultyout');
	$builder->select('faultyout.*');
	$builder1->where('faultyout.type="printer"' );
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
   return view('/faultyout/printers', $data);
	  
   } elseif(!$this->request->getGet('q')) {
	$data['user_data'] = $session->get('designation');
	$data['printer'] = $builder->get()->getResult();
	return view('/faultyout/printers', $data);
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

	$builder = $db->table('faultyout');
	$builder->select('faultyout.*');
	// $builder1->where('faultyout.type="printer"' );
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
   $data['faulty'] = $builder->get()->getResult();
   return view('/faultyout/faulty', $data);;
	  
   } elseif(!$this->request->getGet('q')) {
	$data['user_data'] = $session->get('designation');
	$data['faulty'] = $builder->get()->getResult();
	return view('/faultyout/faulty', $data);
   }
}


}



