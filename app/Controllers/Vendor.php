<?php namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Controller;
use App\Models\VendorModel;
  
class Vendor extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('user/add_vendor', $data);
    }
    
    public function save()
    {
        helper(['form']);
        $rules = [
           
            'username'          => 'required|min_length[3]|max_length[20]|is_unique[vendors.username]',
            
        ];
          
        if($this->validate($rules)){

            // vendors
            $db      = \Config\Database::connect();

            $builder = $db->table("vendors");
            $builder = $db->table("vendors.*");

            $model = new VendorModel();
            $data = [
                'phone'     => $this->request->getVar('phone'),
                'fname'     => $this->request->getVar('fname'),
                'lname'     => $this->request->getVar('lname'),
                'location'     => $this->request->getVar('location'),
                'email'    => $this->request->getVar('email'),
                'username'    => $this->request->getVar('username'),
                'id_no'    => $this->request->getVar('id_no')
            ];
            $db->table('vendors')->insert($data);

            return $this->response->redirect(site_url('/vendors-list'));
        }
        else{
            $data['validation'] = $this->validator;
            echo view('user/add_vendor', $data);
        }
          
    }
       public function singleUser($id){
        $userModel = new VendorModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('user/edit_vendor', $data);
    }
   

    // update user data
    public function update(){
        $userModel = new VendorModel();
        $db = \Config\Database::connect();
        $builder = $db->table("vendors");
        $user_id = $this->request->getVar('id');
        $data = [
            'phone' => $this->request->getVar('phone'),
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'username' => $this->request->getVar('username'),
            'id_no' => $this->request->getVar('id_no'),
            'location' => $this->request->getVar('location'),
            'email'  => $this->request->getVar('email'),
        ];
        // echo'<pre>';
        // print_r($data);
        // exit;
        $userModel->update($user_id, $data);
        return $this->response->redirect(site_url('/vendors-list'));
    }
    public function delete($id){
        $userModel = new VendorModel();
        $data['user'] = $userModel->where('id', $id)->delete();
        return $this->response->redirect(site_url('/vendors-list'));
    }

    public function deletec($id)
{
         $db = \Config\Database::connect();
        $builder = $db->table("customer");
        $builder->select('customer.*');
        $builder->where('customer.id', $id);
        $builder->delete();
        return redirect()->back()->to(site_url('/customer-list'))->with('status', 'Customer deleted successfully');

    }


    //customer details
    public function customer()
    {
        helper(['form']);
        $data = [];
        echo view('user/add_customer', $data);
    }
    public function csave()
    {
         //include helper form
         helper(['form']);
         //set rules validation form
         $rules = [
            
            'username'          => 'required|min_length[3]|max_length[200]|is_unique[customer.username]',
             
         ];
           
         if($this->validate($rules)){
 
             // vendors
             $db      = \Config\Database::connect();
 
             $builder = $db->table("customer");
             $builder = $db->table("customer.*");
 
            //  $model = new VendorModel();
             $data = [
                 'phone'     => $this->request->getVar('phone'),
                 'fname'     => $this->request->getVar('fname'),
                 'lname'     => $this->request->getVar('lname'),
                 'username'     => $this->request->getVar('username'),
                 'id_no'     => $this->request->getVar('id_no'),
                 'location'     => $this->request->getVar('location'),
                 'email'    => $this->request->getVar('email')
             ];
             $db->table('customer')->insert($data);
    return $this->response->redirect(site_url('/customer-list'));

    }
            else{
                $data['validation'] = $this->validator;
                echo view('user/add_customer', $data);
            }



    }
     //show single customer 
     public function singlecustomer($id)
     {
            $db      = \Config\Database::connect();
 
             $builder = $db->table("customer");
             $builder->where('customer.id', $id);

             $data['user_obj'] = $builder->get()->getResult();
             return view('user/edit_customer', $data);
     }


     public function updatec($r)
     {
        $userModel = new VendorModel();
        $db      = \Config\Database::connect();
 
             $builder = $db->table("customer");

        $user_id = $this->request->getVar('id');
        $data = [
            'phone' => $this->request->getVar('phone'),
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'location' => $this->request->getVar('location'),
            'username' => $this->request->getVar('username'),
            'id_no' => $this->request->getVar('id_no'),
            'email'  => $this->request->getVar('email'),
        ];
        $builder->where('id', $r);
        $builder->update($data);
        return $this->response->redirect(site_url('/customer-list'));
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
            
            $builder = $db->table('stockout');
            $builder->select('stockout.*');
            $builder->where('stockout.conditions = "New" AND type="desktop"' );
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
           $data['Ndesktop'] = $builder->get()->getResult();
           return view('/stockout/Ndesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Ndesktop'] = $builder->get()->getResult();
            return view('/stockout/Ndesktop', $data);
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
            
            $builder = $db->table('stockout');
            $builder->select('stockout.*');
            $builder->where('stockout.conditions = "Used" AND type="desktop"' );
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
           $data['Udesktop'] = $builder->get()->getResult();
            return view('/stockout/Udesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Udesktop'] = $builder->get()->getResult();
            return view('/stockout/Udesktop', $data);
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
            
            $builder = $db->table('stockout');
            $builder->select('stockout.*');
            $builder->where('stockout.conditions = "Refurb" AND type="desktop"' );
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
        return view('/stockout/Rdesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rdesktop'] = $builder->get()->getResult();
        return view('/stockout/Rdesktop', $data);
           }


    }

    // lcds
    public function nlcds()
    {
        $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('stockout');
            $builder->select('stockout.*');
            $builder->where('stockout.conditions = "New" AND type="Lcd"' );
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
        return view('/stockout/nlcd', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rdesktop'] = $builder->get()->getResult();
        return view('/stockout/nlcd', $data);
           }


    }

    public function rlcds()
    {
        $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('stockout');
            $builder->select('stockout.*');
            $builder->where('stockout.conditions = "Refurb" AND type="Lcd"' );
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
        return view('/stockout/rlcd', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rdesktop'] = $builder->get()->getResult();
        return view('/stockout/rlcd', $data);
           }


    }

    public function ulcds()
    {
        $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('stockout');
            $builder->select('stockout.*');
            $builder->where('stockout.conditions = "Used" AND type="Lcd"' );
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
        return view('/stockout/ulcd', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rdesktop'] = $builder->get()->getResult();
        return view('/stockout/ulcd', $data);
           }
    }

    // end

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
            
            $builder = $db->table('stockout');
            $builder->select('stockout.*');
            $builder->where('stockout.conditions = "New" AND type="laptop"' );
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
           return view('/stockout/Nlaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Nlaptop'] = $builder->get()->getResult();
            return view('/stockout/Nlaptop', $data);
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
        
        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('stockout.conditions = "Used" AND type="laptop"' );
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
       return view('/stockout/Ulaptop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Ulaptop'] = $builder->get()->getResult();
        return view('/stockout/Ulaptop', $data);
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
        
        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('stockout.conditions = "Refurb" AND type="laptop"' );
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
        return view('/stockout/Rlaptop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Rlaptop'] = $builder->get()->getResult();
        return view('/stockout/Rlaptop', $data);
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
        
        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('stockout.conditions = "New" AND type="allinone"' );
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
       return view('/stockout/Nallinone', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/stockout/Nallinone', $data);
       }

    }

    public function smartphoness()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
    
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        
        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('stockout.type="smartphones"' );
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
       return view('/stockout/smartphone', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/stockout/smartphone', $data);
       }

    }


    public function tabletss()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
    
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        
        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('stockout.type="Tablet"' );
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
       return view('/stockout/tablet', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/stockout/tablet', $data);
       }

    }


    public function othersss()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
    
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('stockout.type="Others"' );
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
       return view('/stockout/others', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/stockout/others', $data);
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
      
      $builder = $db->table('stockout');
      $builder->select('stockout.*');
      $builder->where('stockout.conditions = "Used" AND type="allinone"' );
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
      return view('/stockout/Udesktop', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Uallinone'] = $builder->get()->getResult();
      return view('/stockout/Udesktop', $data);
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
      
      $builder = $db->table('stockout');
      $builder->select('stockout.*');
      $builder->where('stockout.conditions = "Refurb" AND type="allinone"' );
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
     return view('/stockout/Rallinone', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Rallinone'] = $builder->get()->getResult();
      return view('/stockout/Rallinone', $data);
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
      
      $builder = $db->table('stockout');
      $builder->select('stockout.*');
      $builder->where('stockout.type="ram"' );
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
     return view('/stockout/ram', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['ram'] = $builder->get()->getResult();
      return view('/stockout/ram', $data);
     }

    }

    public function hdds()
    {
        $session = \Config\Services::session();

      $db      = \Config\Database::connect();
    
      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
      
      $builder = $db->table('stockout');
      $builder->select('stockout.*');
      $builder->where('stockout.type="hdd"' );
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
     return view('/stockout/hdd', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['hdd'] = $builder->get()->getResult();
      return view('/stockout/hdd', $data);
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
      
      $builder = $db->table('stockout');
      $builder->select('stockout.*');
      $builder->where('stockout.type="ssd"' );
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
    return view('/stockout/ssd', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['ssd'] = $builder->get()->getResult();
        return view('/stockout/ssd', $data);
     }

    }

    public function credit()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
      
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        
        $builder = $db->table('credit');
        $builder->select('credit.*');
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
          return view('/stockout/credit', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['printer'] = $builder->get()->getResult();
          return view('/stockout/credit', $data);
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
      
      $builder = $db->table('stockout');
      $builder->select('stockout.*');
      $builder->where('stockout.type="printer"' );
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
        return view('/stockout/printers', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['printer'] = $builder->get()->getResult();
        return view('/stockout/printers', $data);
     }

    }

    public function stockt()
    {

        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        $date = date("Y/m/d");
        $db      = \Config\Database::connect();
        $builder1 = $db->table('stockout');
        $builder1->select('stockout.*')->orderBy('daterecieved', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('stockout.*');
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

        $cart4['all'] = $builder1->get()->getResult();
        $cart4['user_data'] = $session->get('designation');
           
        return view('stockout/stock_out', $cart4);
           
        } elseif(!$this->request->getGet('q')) {
            $cart4['all'] = $builder1->get()->getResult();
            $cart4['user_data'] = $session->get('designation');
               
            return view('stockout/stock_out', $cart4);

        }

    }

    public function Warrantys()
    {
        $session = \Config\Services::session();

      $db      = \Config\Database::connect();
      $builder1 = $db->table('customer');
      $builder1->select('customer.*');
      $data['customer'] = $builder1->get()->getResult();
      $data['user_data'] = $session->get('designation');

      $builder14 = $db->table('warrantyin');
      $builder14->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
      $nums = $builder14->countAll();
      $data['true'] = 0;
      $random = rand(10000, 99999);
      $customer = $this->request->getVar('customer');
      
      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*')->orderBy('daterecieved' ,' DESC');
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
     foreach($data as $d):
     endforeach;
     $data['num'] = count($d);
    return view('/warranty/warranty', $data);
        
     } 
       elseif($this->request->getGet('customer')) {
        $customer = $this->request->getGet('customer');
        $builder1 = $db->table('warrantyin');
        $builder1->select('warrantyin.*');
        $builder1->like('customer', $customer);       
        $data['printer'] = $builder1->get()->getResult();
        $randson = ['randoms' => $random ]; 
        session()->set($randson);
        foreach($data as $d):
        endforeach;
        if($d){
        $builder133 = $db->table('warrantyin');
        $builder133->select('*');
        $builder133->where('customer', $customer);
        $builder133->update(['random' => $random]);
        }
        $data['num'] = count($d);
        if($data['num'] <= $nums){$data['true'] = 1; }else{
            $data['true'] = 0;
        }
        $data['user_data'] = $session->get('designation');
        return view('/warranty/warranty', $data);
       }




       if($this->request->getVar('true')){

        $rands = session()->get('randoms');
        $build = $db->table('warrantyin');
        $build->select('warrantyin.*');
        $build->where('random', $rands);
        $users = $build->get()->getResult();
        // $idd = rand(1000, 9999);
        $fileName = $customer.$rands. '.xlsx';
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".$customer.$rands.".xlsx";
        return redirect()->to(base_url($filename));
        }
       elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['printer'] = $builder->get()->getResult();
        $data['num'] = $builder->countAll();
  
          return view('/warranty/warranty', $data);
       }
    }

    public function printers()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
      
      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*');
      $builder->where('warrantyin.type="printer"' );
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
        return view('/stockout/printer', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['printer'] = $builder->get()->getResult();
        return view('/stockout/printer', $data);
     }
    }


    public function printerss()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $session->set($sdata);
      $data['user_data'] = $session->get('designation');
      
      $builder = $db->table('stockout');
      $builder->select('stockout.*');
      $builder->where('stockout.type="printer"' );
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
        return view('/stockout/printers', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['printer'] = $builder->get()->getResult();
        return view('/stockout/printers', $data);
     }
    }


    public function spreadsheetgn($title){

        $delimiter = ' ';
        $words = explode($delimiter, $title);
        $condition = $words[0];
        $type = $words[1];

        $db      = \Config\Database::connect();
        $build = $db->table('masterlist');
        $build->select('*');
        $build->where('type', $type);
        $build->where('conditions', $condition);
        $users = $build->get()->getResult();
        $fileName = $title. '.xlsx';
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".$title.".xlsx";
        return redirect()->to(base_url($filename));

    }


    public function generateFunctionwo($id){
        $delimiter = ' ';
        $words = explode($delimiter, $id);
        $condition = $words[0];
        $type = $words[1];
        $data['title'] = $id;

        $db      = \Config\Database::connect();
        $builder1 = $db->table('warrantyout');
        $builder1->select('*');
        $builder1->where('type', $type);
        $builder1->where('conditions', $condition);
        $data['test'] = $builder1->get()->getResult();


        if($this->request->getGet('q')) {
             $q=$this->request->getGet('q');
             $builder122 = $db->table('warrantyout');
             $builder122->select('*')->orderBy('daterecieved', 'DESC');
             $builder122->where('type' ,$type);
             $builder122->where('conditions' ,$condition);
             $builder122->like('cpu', $q);
             $builder122->orLike('assetid', $q);
             $builder122->orLike('brand', $q);
             $builder122->orLike('conditions', $q);
             $builder122->orLike('modelid', $q);
             $builder122->orLike('gen', $q);
             $builder122->orLike('screen', $q);
             $builder122->orLike('price', $q);
             $builder122->orLike('customer', $q);
             $builder122->orLike('ram', $q);
             $builder122->orLike('odd', $q);
             $builder122->orLike('comment', $q);
             $builder122->orLike('type', $q);
             $data['test'] = $builder122->get()->getResult();
            
             echo view('products/template/header.php');
             return view('test/warrantyout', $data);
                
             } elseif(!$this->request->getGet('q')) {
            $data['test'] = $builder1->get()->getResult();
    
            echo view('products/template/header.php');
             return view('test/warrantyout', $data);
             }
    }

    public function generateFunctionw($id){
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $delimiter = ' ';
        $words = explode($delimiter, $id);
        $condition = $words[0];
        $type = $words[1];
        $data['title'] = $id;

        $builder1 = $db->table('warrantyin');
        $builder1->select('*');
        $builder1->where('type', $type);
        $builder1->where('conditions', $condition);
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
             $builder122 = $db->table('warrantyin');
             $builder122->select('*')->orderBy('daterecieved', 'DESC');
             $builder122->where('type' ,$type);
             $builder122->where('conditions' ,$condition);
             $builder122->like('cpu', $q);
             $builder122->orLike('assetid', $q);
             $builder122->orLike('brand', $q);
             $builder122->orLike('conditions', $q);
             $builder122->orLike('modelid', $q);
             $builder122->orLike('gen', $q);
             $builder122->orLike('screen', $q);
             $builder122->orLike('price', $q);
             $builder122->orLike('customer', $q);
             $builder122->orLike('ram', $q);
             $builder122->orLike('odd', $q);
             $builder122->orLike('comment', $q);
             $builder122->orLike('type', $q);
             $data['test'] = $builder122->get()->getResult();
            
             echo view('products/template/header.php');
             return view('test/warrantyin', $data);
                
             } elseif(!$this->request->getGet('q')) {
            $data['test'] = $builder1->get()->getResult();
    
            echo view('products/template/header.php');
            return view('test/warrantyin', $data);
             }



        
    }

    public function generateFunction($id){
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $delimiter = ' ';
        $words = explode($delimiter, $id);
        $condition = $words[0];
        $type = $words[1];
        $data['title'] = $id;

        $builder1 = $db->table('masterlist');
        $builder1->select('*');
        $builder1->where('type', $type);
        $builder1->where('conditions', $condition);
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
             $builder122 = $db->table('masterlist');
             $builder122->select('*')->orderBy('daterecieved', 'DESC');
             $builder122->where('type' ,$type);
             $builder122->where('conditions' ,$condition);
             $builder122->like('cpu', $q);
             $builder122->orLike('assetid', $q);
             $builder122->orLike('brand', $q);
             $builder122->orLike('conditions', $q);
             $builder122->orLike('modelid', $q);
             $builder122->orLike('gen', $q);
             $builder122->orLike('screen', $q);
             $builder122->orLike('price', $q);
             $builder122->orLike('customer', $q);
             $builder122->orLike('ram', $q);
             $builder122->orLike('odd', $q);
             $builder122->orLike('comment', $q);
             $builder122->orLike('type', $q);
             $data['test'] = $builder122->get()->getResult();
            
             echo view('products/template/header.php');
             return view('test/index', $data);
                
             } elseif(!$this->request->getGet('q')) {
            $data['test'] = $builder1->get()->getResult();
    
            echo view('products/template/header.php');
            return view('test/index', $data);
             }



        
    }

    
    public function generateFunctions($id){
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $delimiter = ' ';
        $words = explode($delimiter, $id);
        $condition = $words[0];
        $type = $words[1];
        $data['title'] = $id;

        $builder1 = $db->table('stockout');
        $builder1->select('*');
        $builder1->where('type', $type);
        $builder1->where('conditions', $condition);
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
             $builder122 = $db->table('stockout');
             $builder122->select('*')->orderBy('daterecieved', 'DESC');
             $builder122->where('type' ,$type);
             $builder122->where('conditions' ,$condition);
             $builder122->like('cpu', $q);
             $builder122->orLike('assetid', $q);
             $builder122->orLike('brand', $q);
             $builder122->orLike('conditions', $q);
             $builder122->orLike('modelid', $q);
             $builder122->orLike('gen', $q);
             $builder122->orLike('screen', $q);
             $builder122->orLike('price', $q);
             $builder122->orLike('customer', $q);
             $builder122->orLike('ram', $q);
             $builder122->orLike('odd', $q);
             $builder122->orLike('comment', $q);
             $builder122->orLike('type', $q);
             $data['test'] = $builder122->get()->getResult();
            
             echo view('products/template/header.php');
             return view('test/stockout', $data);
                
             } elseif(!$this->request->getGet('q')) {
            $data['test'] = $builder1->get()->getResult();
    
            echo view('products/template/header.php');
            return view('test/stockout', $data);
             }
        
    }



    public function generateFunctionfo($id){
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $delimiter = ' ';
        $words = explode($delimiter, $id);
        $condition = $words[0];
        $type = $words[1];
        $data['title'] = $id;

        $builder1 = $db->table('faultyout');
        $builder1->select('*');
        $builder1->where('type', $type);
        $builder1->where('conditions', $condition);
        // search function
        
        if($this->request->getGet('q')) {
          $q=$this->request->getGet('q');
           $builder122 = $db->table('faultyout');
           $builder122->select('*')->orderBy('daterecieved', 'DESC');
           $builder122->where('type' ,$type);
           $builder122->where('conditions' ,$condition);
           $builder122->like('cpu', $q);
           $builder122->orLike('assetid', $q);
           $builder122->orLike('brand', $q);
           $builder122->orLike('conditions', $q);
           $builder122->orLike('modelid', $q);
           $builder122->orLike('gen', $q);
           $builder122->orLike('screen', $q);
           $builder122->orLike('price', $q);
           $builder122->orLike('customer', $q);
           $builder122->orLike('ram', $q);
           $builder122->orLike('odd', $q);
           $builder122->orLike('comment', $q);
           $builder122->orLike('type', $q);
           $data['test'] = $builder122->get()->getResult();
          
           echo view('products/template/header.php');
           return view('test/faultyout', $data);
              
           } elseif(!$this->request->getGet('q')) {
        $data['test'] = $builder1->get()->getResult();

            echo view('products/template/header.php');
            return view('test/faultyout', $data);
           }

        // //search function

    }

    public function generateFunctionf($id){
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $delimiter = ' ';
        $words = explode($delimiter, $id);
        $condition = $words[0];
        $type = $words[1];
        $data['title'] = $id;

        $builder1 = $db->table('faulty');
        $builder1->select('*');
        $builder1->where('type', $type);
        $builder1->where('conditions', $condition);
        // search function
        
        if($this->request->getGet('q')) {
          $q=$this->request->getGet('q');
           $builder122 = $db->table('faulty');
           $builder122->select('*')->orderBy('daterecieved', 'DESC');
           $builder122->where('type' ,$type);
           $builder122->where('conditions' ,$condition);
           $builder122->like('cpu', $q);
           $builder122->orLike('assetid', $q);
           $builder122->orLike('brand', $q);
           $builder122->orLike('conditions', $q);
           $builder122->orLike('modelid', $q);
           $builder122->orLike('gen', $q);
           $builder122->orLike('screen', $q);
           $builder122->orLike('price', $q);
           $builder122->orLike('customer', $q);
           $builder122->orLike('ram', $q);
           $builder122->orLike('odd', $q);
           $builder122->orLike('comment', $q);
           $builder122->orLike('type', $q);
           $data['test'] = $builder122->get()->getResult();
          
           echo view('products/template/header.php');
           return view('test/faulty', $data);
              
           } elseif(!$this->request->getGet('q')) {
        $data['test'] = $builder1->get()->getResult();

            echo view('products/template/header.php');
            return view('test/faulty', $data);
           }

        // //search function

    }

    public function spreadsheetgnw($title){

        $delimiter = ' ';
        $words = explode($delimiter, $title);
        $condition = $words[0];
        $type = $words[1];

        $db      = \Config\Database::connect();
        $build = $db->table('warrantyin');
        $build->select('*');
        $build->where('type', $type);
        $build->where('conditions', $condition);
        $users = $build->get()->getResult();
        $fileName = $title. '.xlsx';
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".$title.".xlsx";
        return redirect()->to(base_url($filename));

    }

    public function spreadsheetgnwo($title){

        $delimiter = ' ';
        $words = explode($delimiter, $title);
        $condition = $words[0];
        $type = $words[1];

        $db      = \Config\Database::connect();
        $build = $db->table('warrantyout');
        $build->select('*');
        $build->where('type', $type);
        $build->where('conditions', $condition);
        $users = $build->get()->getResult();
        $fileName = $title. '.xlsx';
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".$title.".xlsx";
        return redirect()->to(base_url($filename));

    }


    public function spreadsheetgnf($title){

        $delimiter = ' ';
        $words = explode($delimiter, $title);
        $condition = $words[0];
        $type = $words[1];

        $db      = \Config\Database::connect();
        $build = $db->table('faulty');
        $build->select('*');
        $build->where('type', $type);
        $build->where('conditions', $condition);
        $users = $build->get()->getResult();
        $fileName = $title. '.xlsx';
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".$title.".xlsx";
        return redirect()->to(base_url($filename));

    }


    public function spreadsheetgnfo($title){

        $delimiter = ' ';
        $words = explode($delimiter, $title);
        $condition = $words[0];
        $type = $words[1];

        $db      = \Config\Database::connect();
        $build = $db->table('faultyout');
        $build->select('*');
        $build->where('type', $type);
        $build->where('conditions', $condition);
        $users = $build->get()->getResult();
        $fileName = $title. '.xlsx';
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".$title.".xlsx";
        return redirect()->to(base_url($filename));

    }





    public function spreadsheetgns($title){

        $delimiter = ' ';
        $words = explode($delimiter, $title);
        $condition = $words[0];
        $type = $words[1];

        $db      = \Config\Database::connect();
        $build = $db->table('stockout');
        $build->select('*');
        $build->where('type', $type);
        $build->where('conditions', $condition);
        $users = $build->get()->getResult();
        $fileName = $title. '.xlsx';
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".$title.".xlsx";
        return redirect()->to(base_url($filename));

    }


}