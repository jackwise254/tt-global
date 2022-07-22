<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class Register extends Controller
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('user/add_user', $data);
    }
  
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'fname'          => 'required|min_length[3]|max_length[20]',
            'lname'          => 'required|min_length[3]|max_length[20]',
            'designation'          => 'required|min_length[3]|max_length[20]',
            'username'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            // 'confpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'user_name'     => $this->request->getVar('username'),
                'fname'     => $this->request->getVar('fname'),
                'lname'     => $this->request->getVar('lname'),
                'designation'     => $this->request->getVar('designation'),
                'user_email'    => $this->request->getVar('email'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return $this->response->redirect(site_url('/users-list'));
            // return view('user/user_view');
        }else{
            $data['validation'] = $this->validator;
            echo view('user/add_user', $data);
        }
          
    }


    public function update($user_id)
    {
        //include helper form
        $db      = \Config\Database::connect();
        helper(['form']);
        //set rules validation form
        $rules = [
            'fname'          => 'required|min_length[3]|max_length[20]',
            'lname'          => 'required|min_length[3]|max_length[20]',
            'designation'          => 'required|min_length[3]|max_length[20]',
            'username'          => 'required|min_length[3]|max_length[20]',
            // 'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            // 'confpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            // $model = new UserModel();
        $builder = $db->table('users');


            $data = [
                'user_name'     => $this->request->getVar('username'),
                'fname'     => $this->request->getVar('fname'),
                'lname'     => $this->request->getVar('lname'),
                'designation'     => $this->request->getVar('designation'),
                'user_email'    => $this->request->getVar('email'),
                'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $builder->where('user_id', $user_id);
            $builder->update($data);
            return redirect()->to(base_url('UserCrud/index'))->with('status', 'Updated succesfully');
            // return view('user/user_view');
        }else{
            $data['validation'] = $this->validator;
            echo view('user/edit_user', $data);
        }
          
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
        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.conditions = "New" AND type="desktop"' );
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
       return view('/warrantyout/Ndesktop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Ndesktop'] = $builder->get()->getResult();
        return view('/warrantyout/Ndesktop', $data);
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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.conditions = "Used" AND type="desktop"' );
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
        return view('/warrantyout/Udesktop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Udesktop'] = $builder->get()->getResult();
        return view('/warrantyout/Udesktop', $data);
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

        $builder1 = $db->table('warrantyout');
        $builder1->select('warrantyout.*');
        $builder1->where('warrantyout.conditions = "Refurb" AND type="desktop"' );
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
       return view('/warrantyout/Rdesktop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Rdesktop'] = $builder->get()->getResult();
        return view('/warrantyout/Rdesktop', $data);
       }

    }

    // lcds
    public function rlcdwo()
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

        $builder1 = $db->table('warrantyout');
        $builder1->select('warrantyout.*');
        $builder1->where('warrantyout.conditions = "Refurb" AND type="Lcd"' );
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
       return view('/warrantyout/rlcd', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Rdesktop'] = $builder->get()->getResult();
        return view('/warrantyout/rlcd', $data);
       }

    }

    public function nlcdwo()
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

        $builder1 = $db->table('warrantyout');
        $builder1->select('warrantyout.*');
        $builder1->where('warrantyout.conditions = "New" AND type="Lcd"' );
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
       return view('/warrantyout/nlcd', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Rdesktop'] = $builder->get()->getResult();
        return view('/warrantyout/nlcd', $data);
       }

    }

    public function ulcdwo()
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

        $builder1 = $db->table('warrantyout');
        $builder1->select('warrantyout.*');
        $builder1->where('warrantyout.conditions = "Used" AND type="Lcd"' );
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
       return view('/warrantyout/ulcd', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Rdesktop'] = $builder->get()->getResult();
        return view('/warrantyout/ulcd', $data);
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
        
        $db      = \Config\Database::connect();

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.conditions = "New" AND type="laptop"' );
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
       return view('/warrantyout/Nlaptop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nlaptop'] = $builder->get()->getResult();
        return view('/warrantyout/Nlaptop', $data);
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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.conditions, masterlist.type');
        $builder->where('warrantyout.conditions = "Used" AND type="laptop"' );
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
       return view('/warrantyout/Ulaptop', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Ulaptop'] = $builder->get()->getResult();
        return view('/warrantyout/Ulaptop', $data);

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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.conditions = "Refurb" AND type="laptop"' );
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
       return view('/warrantyout/Rlaptop', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Rlaptop'] = $builder->get()->getResult();
        return view('/warrantyout/Rlaptop', $data);

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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.conditions = "New" AND type="allinone"' );
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
       return view('/warrantyout/Nallinone', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/warrantyout/Nallinone', $data);

       }

    }

    public function smartphonewo()
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
        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.type="smartphones"' );
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
       return view('/warrantyout/smartphone', $data);
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/warrantyout/smartphone', $data);
       }
    }


    public function tabletwo()
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
        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.type="Tablet"' );
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
       return view('/warrantyout/tablet', $data);
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/warrantyout/tablet', $data);
       }
    }


    public function otherswo()
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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.type="Others"' );
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
       return view('/warrantyout/others', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/warrantyout/others', $data);

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

        $builder = $db->table('warrantyout');
      $builder->select('warrantyout.*');
      $builder->where('warrantyout.conditions = "Used" AND type="allinone"' );
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
       return view('/warrantyout/Udesktop', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Uallinone'] = $builder->get()->getResult();
      return view('/warrantyout/Udesktop', $data);

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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.conditions = "Refurb" AND type="allinone"' );
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
       return view('/warrantyout/Rallinone', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Rallinone'] = $builder->get()->getResult();
        return view('/warrantyout/Rallinone', $data);

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

        $builder = $db->table('warrantyout');
      $builder->select(' warrantyout.*');
      $builder->where('warrantyout.type="ram"' );
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
       return view('/warrantyout/ram', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['ram'] = $builder->get()->getResult();
        return view('/warrantyout/ram', $data);
       }

    }

    public function hdd()
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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.type="hdd"' );
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
      return view('/warrantyout/hdd', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['hdd'] = $builder->get()->getResult();
      return view('/warrantyout/hdd', $data);
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

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.type="ssd"' );
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
       return view('/warrantyout/ssd', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['ssd'] = $builder->get()->getResult();
        return view('/warrantyout/ssd', $data);
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

        $builder = $db->table('warrantyout');
        $builder->select(' warrantyout.*');
        $builder->where('warrantyout.type="printer"' );
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
        return view('/warrantyout/printers', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['printer'] = $builder->get()->getResult();
        return view('/warrantyout/printers', $data);
       }
    }

    public function warrantyoutv()
    {
        
        // $builder1->where('warrantyout.type="printer"' );
        

        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
    
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        
        $db      = \Config\Database::connect();

        $builder = $db->table('warrantyout');
        $builder->select(' warrantyout.*');
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
        return view('/warrantyout/warrantv', $data);

          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['printer'] = $builder->get()->getResult();
        return view('/warrantyout/warrantv', $data);
       }
    }
  
}