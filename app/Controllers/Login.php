<?php namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class Login extends Controller
{
    private function setUserSession($user)
    {
        
        $data = [
            'user_id' => $user['user_id'],
            'fname' => $user['fname'],
            'lname' => $user['lname'],
            'user_name' => $user['user_name'],
            // 'phone_no' => $user['phone_no'],
            'user_email' => $user['user_email'],
            'isLoggedIn' => true,
            "designation" => $user['designation'],
        ];

        session()->set($data);
        return true;
    }
    public function index()
    {
        helper(['form']);
        echo view('login');
    } 
  
    public function auth()
    {

        $session = session();
        $rand = rand(10000, 99999);
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('user_email', $email)->first();
        if($data){
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_name'     => $data['user_name'],
                    'user_email'    => $data['user_email'],
                    'designation' => 'admin',
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);

                
                    $model = new UserModel();
    
                    $user = $model->where('user_email', $this->request->getVar('email'))
                        ->first();
    
                    // Stroing session values
                    $this->setUserSession($user);
    
                    if($user['designation'] == "admin"){
    
                        return redirect()->to('/dashboard');
    
                    }elseif($user['designation'] == "manager"){
                        return redirect()->to('/stock-view');
                    }elseif($user['designation'] == "superadmin"){
                        return redirect()->to('/dashboard');
                    }
                    elseif($user['designation'] == "technician"){
                        return redirect()->to('/warranty');
                    }

                    elseif($user['designation'] == "warranty"){
                        return redirect()->to('/warranty');
                    }

                    elseif($user['designation'] == "sales"){
                        return redirect()->to('/invoice-page');
                    }
                    // 
                    
            }else{
                $session->setTempdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setTempdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }
  
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
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
        $builder = $db->table('faultyout');
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
        $builder->where('faultyout.conditions = "New" AND type="desktop"' );
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
        return view('/faultyout/Ndesktop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Ndesktop'] = $builder->get()->getResult();
        return view('/faultyout/Ndesktop', $data);
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

        $builder = $db->table('faultyout');
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
        $builder->where('faultyout.conditions = "Used" AND type="desktop"' );
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
       return view('/faultyout/Udesktop', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Udesktop'] = $builder->get()->getResult();
        return view('/faultyout/Udesktop', $data);
       }

    }

    public function recyclebin()
    {
        $db      = \Config\Database::connect();
        // $builder = $db->table('recycle');
        // $builder->select('recycle.*');
        // $builder->where( "DATEDIFF(NOW(), daterecieved) BETWEEN 1 AND 60" );
        // $builder->delete();

        // $current = date(d/m/y);
        $session = \Config\Services::session();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        $date = date("Y/m/d");

        $condition = $this->request->getVar('conditions');
        $cpu = $this->request->getVar('cpu');
        $type = $this->request->getVar('type');
        $model = $this->request->getVar('model');

       
        // $builder13 = $db->table('recycle');
        // $builder13->select('*');
        // if($model){$builder13->where('model', $model);};
        // $data['masterlist'] = $builder13->get()->getResult();
       
      if($type){
        // spreadsheet opeartion
      $builder11 = $db->table('recycle');
      $builder11->select('recycle.*');
      if($condition){$builder11->where( 'conditions', $condition);};
      if($cpu){$builder11->where( 'cpu', $cpu );};
      if($type){$builder11->where( 'type', $type );};
      $users = $builder11->get()->getResult();
      if($users){
      $idd = rand(1000, 9999);
      $fileName = 'recycle'.$idd. '.xlsx';
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
      $filename = "upload/".'recycle'.$idd.".xlsx";
      return redirect()->to(base_url($filename));
        }
    }
        // end


        // normal operation
        $builder1 = $db->table('recycle');
        $builder1->select('recycle.*')->orderBy('daterecieved', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('recycle.*');
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

        $data['masterlist'] = $builder1->get()->getResult();

        foreach($data as $d):
        endforeach;
        $data['num'] = count($d);

        
       return view('faulty/recycle', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['masterlist'] = $builder1->get()->getResult();
            $data['num'] = $builder1->countAll();
            helper(['url', 'form']);
            return view('faulty/recycle', $data);
        
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

        $builder1 = $db->table('faultyout');
        $builder1->select('faultyout.*')->orderBy('time','DESC');
        $builder1->where('faultyout.conditions = "Refurb" AND type="desktop"' );
        $data['Rdesktop'] = $builder1->get()->getResult();
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('faultyout.*')->orderBy('time', 'DESC');
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

        $data['Rdesktop'] = $builder1->get()->getResult();

        
        return view('/faultyout/Rdesktop', $data);
           
        } elseif(!$this->request->getGet('q')) {
       $data['user_data'] = $session->get('designation');

            $data['Rdesktop'] = $builder1->get()->getResult();


            helper(['url', 'form']);
            return view('/faultyout/Rdesktop', $data);

        
        }

    }


    // start

    public function nlcdfo()
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

        $builder1 = $db->table('faultyout');
        $builder1->select('faultyout.*')->orderBy('time','DESC');
        $builder1->where('faultyout.conditions = "New" AND type="Lcd"' );
        $data['Rdesktop'] = $builder1->get()->getResult();
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('faultyout.*')->orderBy('time', 'DESC');
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

        $data['Rdesktop'] = $builder1->get()->getResult();

        
        return view('/faultyout/nlcd', $data);
           
        } elseif(!$this->request->getGet('q')) {
       $data['user_data'] = $session->get('designation');

            $data['Rdesktop'] = $builder1->get()->getResult();


            helper(['url', 'form']);
            return view('/faultyout/nlcd', $data);

        
        }

    }


    public function rlcdfo()
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

        $builder1 = $db->table('faultyout');
        $builder1->select('faultyout.*')->orderBy('time','DESC');
        $builder1->where('faultyout.conditions = "Refurb" AND type="Lcd"' );
        $data['Rdesktop'] = $builder1->get()->getResult();
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('faultyout.*')->orderBy('time', 'DESC');
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

        $data['Rdesktop'] = $builder1->get()->getResult();

        
        return view('/faultyout/rlcd', $data);
           
        } elseif(!$this->request->getGet('q')) {
       $data['user_data'] = $session->get('designation');

            $data['Rdesktop'] = $builder1->get()->getResult();


            helper(['url', 'form']);
            return view('/faultyout/rlcd', $data);

        
        }

    }


    public function ulcdfo()
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

        $builder1 = $db->table('faultyout');
        $builder1->select('faultyout.*')->orderBy('time','DESC');
        $builder1->where('faultyout.conditions = "Used" AND type="Lcd"' );
        $data['Rdesktop'] = $builder1->get()->getResult();
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('faultyout.*')->orderBy('time', 'DESC');
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
        $data['Rdesktop'] = $builder1->get()->getResult();
        return view('/faultyout/ulcd', $data);
        } elseif(!$this->request->getGet('q')) {
       $data['user_data'] = $session->get('designation');
            $data['Rdesktop'] = $builder1->get()->getResult();
            helper(['url', 'form']);
            return view('/faultyout/ulcd', $data);
        }
    }

    // end

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

        $builder = $db->table('faultyout');
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
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
        // site_url('home-view')
        $builder = $db->table('faultyout');
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
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

    public function smartphonefo()
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
        $builder->where('faultyout.type="smartphones"' );
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
       return view('/faultyout/smartphone', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/faultyout/smartphone', $data);
       }

    }


     public function tabletfo()
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
        $builder->where('faultyout.type="Tablet"' );
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
       return view('/faultyout/tablet', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/faultyout/tablet', $data);
       }

    }


    public function othersfo()
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
        $builder->where('faultyout.type="Others"' );
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
       return view('/faultyout/others', $data);
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Nallinone'] = $builder->get()->getResult();
        return view('/faultyout/others', $data);
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
      $builder->select('faultyout.*')->orderBy('time', 'DESC');
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
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
      $builder->select(' faultyout.*');
      $builder->where('faultyout.type="ram"' );
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
        $builder->where('faultyout.type="hdd"' );
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
        $builder->select('faultyout.*')->orderBy('time', 'DESC');
        $builder->where('faultyout.type="ssd"' );
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


    public function printerfo()
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
        $builder->select(' faultyout.*');
        $builder->where('faultyout.type="printer"' );
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
    public function totalfo()
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
        $builder->select(' faultyout.*');
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
       return view('/faultyout/totalfo', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['Ulaptop'] = $builder->get()->getResult();
        return view('/faultyout/totalfo', $data);
       }
    }

    public function undo()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('recycle');
        $builder->selectMax('id');
        $builder->where( 'tbl' , 'masterlist' );
        $data = $builder->get()->getResultArray();
        foreach($data as $d):
        endforeach;

        $builder1 = $db->table('recycle');
        $builder1->select('*');
        $builder1->where( 'id' , $d );
        $data1 = $builder1->get()->getResultArray();

        $builder11 = $db->table('masterlist');
        $builder11->select('*');
        $builder11->where( 'id' , $d );
        $data11 = $builder11->get()->getResultArray();

        foreach($data1 as $d1){
            if(!$data11){
            $db->table('masterlist')->insert($d1);
            }
        }
        $builder111 = $db->table('recycle');
        $builder111->select('*');
        $builder111->where( 'id' , $d );
        $builder111->delete();
        return redirect()->to(base_url('ProductsCrud/inventoryView'))->with('status', 'success');
        // echo '<pre>';
        // print_r($data);
        // exit;
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
        $builder->select(' faultyout.*');
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
       return view('/faultyout/faulty', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['faulty'] = $builder->get()->getResult();
        return view('/faultyout/faulty', $data);
       }
	}

    public function debit()
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

        $builder = $db->table('debit');
        $builder->select(' debit.*');
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
       return view('/faulty/debit', $data);
          
       } elseif(!$this->request->getGet('q')) {
        $data['user_data'] = $session->get('designation');
        $data['faulty'] = $builder->get()->getResult();
        return view('/faulty/debit', $data);
       }
    }

    public function test()
    {
        
        $db      = \Config\Database::connect();
        $builder1 = $db->table('condition');
        $builder1->select('condition.*');
        $cart4['condition'] = $builder1->get()->getResult();

        $builder2 = $db->table('brand');
        $builder2->select('brand.*');
        $cart4['brand'] = $builder2->get()->getResult();

        $builder3 = $db->table('type');
        $builder3->select('type.*');
        $cart4['type'] = $builder3->get()->getResult();

        $builder4 = $db->table('Gen');
        $builder4->select('Gen.*');
        $cart4['gen'] = $builder4->get()->getResult();

        $builder5 = $db->table('Cpu');
        $builder5->select('Cpu.*');
        $cart4['cpu'] = $builder5->get()->getResult();

        $builder6 = $db->table('Speed');
        $builder6->select('Speed.*');
        $cart4['speed'] = $builder6->get()->getResult();

        $builder7 = $db->table('Ram');
        $builder7->select('Ram.*');
        $cart4['ram'] = $builder7->get()->getResult();

        $builder8 = $db->table('Hdd');
        $builder8->select('Hdd.*');
        $cart4['hdd'] = $builder8->get()->getResult();

        $builder9 = $db->table('Screen');
        $builder9->select('Screen.*');
        $cart4['screen'] = $builder9->get()->getResult();

        $builder10 = $db->table('vendors');
        $builder10->select('vendors.*');
        $cart4['customer'] = $builder10->get()->getResult();


        $builder31 = $db->table('type');
        $builder31->select('type.*');
        $cart4['num'] = $builder31->get()->getResultArray();

         
        return view('/products/test', $cart4);
        


    }

} 