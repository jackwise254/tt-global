<?php

namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\HTTP\RequestInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Settings extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function settings()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'conditions' => $this->request->getPost('conditions'),
        ];
        $builder = $db->table("Condition");
        $builder = $db->table("Condition.*");
        $db->table('Condition')->insert($data);
       

        return redirect()->back()->with('status', 'Condition added successfuly ');
    }
    public function Type()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'type' => $this->request->getPost('type'),
        ];
        $builder = $db->table("Type");
        $builder = $db->table("Type.*");
        $db->table('Type')->insert($data);
       

        return redirect()->back()->with('status', 'Type added successfuly ');
    }
    public function Brand()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'brand' => $this->request->getPost('brand'),
        ];
        $builder = $db->table("Brand");
        $builder = $db->table("Brand.*");
        $db->table('Brand')->insert($data);
       

        return redirect()->back()->with('status', 'Brand added successfuly ');
    }
    public function Gen()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'gen' => $this->request->getPost('gen'),
        ];
        $builder = $db->table("Gen");
        $builder = $db->table("Gen.*");
        $db->table('Gen')->insert($data);
       

        return redirect()->back()->with('status', 'Generation added successfuly ');
    }
    public function Cpu()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'cpu' => $this->request->getPost('cpu'),
        ];
        $builder = $db->table("Cpu");
        $builder = $db->table("Cpu.*");
        $db->table('Cpu')->insert($data);
       

        return redirect()->back()->with('status', 'Cpu  added successfuly ');
    }
    public function Speed()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'speed' => $this->request->getPost('speed'),
        ];
        $builder = $db->table("Speed");
        $builder = $db->table("Speed.*");
        $db->table('Speed')->insert($data);
       

        return redirect()->back()->with('status', 'Speed added successfuly ');
    }
    public function Ram()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'ram' => $this->request->getPost('ram'),
        ];
        $builder = $db->table("Ram");
        $builder = $db->table("Ram.*");
        $db->table('Ram')->insert($data);
       

        return redirect()->back()->with('status', 'Ram size added successfuly ');
    }
    public function Hdd()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'hdd' => $this->request->getPost('hdd'),
        ];
        $builder = $db->table("Hdd");
        $builder = $db->table("Hdd.*");
        $db->table('Hdd')->insert($data);
       

        return redirect()->back()->with('status', 'Hdd added successfuly ');
    }
    public function Screen()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data = [
            'screen' => $this->request->getPost('screen'),
        ];
        $builder = $db->table("Screen");
        $builder = $db->table("Screen.*");
        $db->table('Screen')->insert($data);
       

        return redirect()->back()->with('status', 'Screen size added successfuly ');
    }
// deleting dropdowns
    public function delete($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("condition");
        $builder->select('condition.*');
        $builder->where('condition.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deleteb($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("brand");
        $builder->select('brand.*');
        $builder->where('brand.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deletet($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("type");
        $builder->select('type.*');
        $builder->where('type.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deletec($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("cpu");
        $builder->select('cpu.*');
        $builder->where('cpu.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deleter($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("ram");
        $builder->select('ram.*');
        $builder->where('ram.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deletes($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("screen");
        $builder->select('screen.*');
        $builder->where('screen.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deletep($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("speed");
        $builder->select('speed.*');
        $builder->where('speed.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deleteh($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("hdd");
        $builder->select('hdd.*');
        $builder->where('hdd.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    public function deleteg($l)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("gen");
        $builder->select('gen.*');
        $builder->where('gen.id', $l);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }



//loading views
        public function conditionl(Type $var = null)
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
        $builder = $db->table('condition');
        $builder->select('condition.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/condition', $data);

        }

        public function typel(Type $var = null)
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
        $builder = $db->table('type');
        $builder->select('type.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/type', $data);

        }
        public function brandl(Type $var = null)
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
        $builder = $db->table('brand');
        $builder->select('brand.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/brand', $data);

        }
        public function raml(Type $var = null)
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
        $builder = $db->table('ram');
        $builder->select('ram.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/ram', $data);

        }
        public function screenl(Type $var = null)
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
        $builder = $db->table('screen');
        $builder->select('screen.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/screen', $data);

        }
        public function hddl(Type $var = null)
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
        $builder = $db->table('hdd');
        $builder->select('hdd.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/hdd', $data);

        }
        public function cpul(Type $var = null)
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
        $builder = $db->table('cpu');
        $builder->select('cpu.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/cpu', $data);

        }
        public function speedl(Type $var = null)
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
        $builder = $db->table('speed');
        $builder->select('speed.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/speed', $data);

        }
        public function genl(Type $var = null)
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
        $builder = $db->table('gen');
        $builder->select('gen.*');
        $data['masterlist'] = $builder->get()->getResult();
        return view('settings/gen', $data);

        }

        public function spreadsheetv()
        {
          $sess = session()->get('user_name');
            $db      = \Config\Database::connect();
            $builder = $db->table('verify');   
            $builder->select('verify.*');
            $builder->where('terms', $sess);
            $users = $builder->get()->getResult();
            $idd = rand(1000, 9999);
            $fileName = 'verification'. '.xlsx';
      
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
          $sheet->setCellValue('T1', 'VENDOR'); 
          $sheet->setCellValue('U1', 'LIST');      
          $sheet->setCellValue('V1', 'STATUS');      
          $sheet->setCellValue('W1', 'DATERECIEVERD');
          $sheet->setCellValue('X1', 'DATEDELIVERED');
          $sheet->setCellValue('Y1', 'TABLE'); 
          $sheet->setCellValue('Z1', 'PROBLEM'); 

        
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
              $sheet->setCellValue('T' . $rows, $val->vendor);
              $sheet->setCellValue('U' . $rows, $val->list);
              $sheet->setCellValue('V' . $rows, $val->status);
              $sheet->setCellValue('W' . $rows, $val->daterecieved);
              $sheet->setCellValue('X' . $rows, $val->datedelivered);
              $sheet->setCellValue('Y' . $rows, $val->tbl);
              $sheet->setCellValue('z' . $rows, $val->problem);


      
                $rows++;
            } 
            // spreadsheet
      
              $data = [
                  'ref' => $idd,
              ];
              $builder = $db->table("export");
              $builder = $db->table("export.*");
              $db->table('export')->insert($data);
            $writer = new Xlsx($spreadsheet);
            $writer->save("upload/".$fileName);

            $filename = "upload/".'verification'.".xlsx";
            return redirect()->to(base_url($filename));

            // return redirect()->to(site_url('verify'));
        }
        public function jobcard($id)
        {
          $db      = \Config\Database::connect();
          $builder2 = $db->table("warrantyin");
          $builder2->select('warrantyin.*');
          $builder2->where('warrantyin.del', $id);
          $users = $builder2->get()->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'jobcard-'.$id. '.xlsx';
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

            $filename = "upload/".'jobcard-'.$id.".xlsx";
            return redirect()->to(base_url($filename));
        }

        public function verifiedspre($id)
        {
          $db      = \Config\Database::connect();
          $builder2 = $db->table("verified");
          $builder2->select('verified.*');
          $builder2->where('verified.random', $id);
          $users = $builder2->get()->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'verified'. '.xlsx';
      
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

            $filename = "upload/".'verified'.".xlsx";
            return redirect()->to(base_url($filename));
        }

        


        public function fetchfaultyspre($id)
        {
          $db      = \Config\Database::connect();
          $builder2 = $db->table("faultyout");
          $builder2->select('faultyout.*');
          $builder2->where('faultyout.random', $id);
          $users = $builder2->get()->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'faultynote'. '.xlsx';
      
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

            $filename = "upload/".'faultynote'.".xlsx";
            return redirect()->to(base_url($filename));
        }

        public function fetchdeliveryspre($id)
        {
          $db      = \Config\Database::connect();
          $builder2 = $db->table("stockout");
          $builder2->select('stockout.*');
          $builder2->where('stockout.random', $id);
          $users = $builder2->get()->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'deliverynote'. '.xlsx';
      
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

            $filename = "upload/".'deliverynote'.".xlsx";
            return redirect()->to(base_url($filename));
        }

        public function fetchinvoicespre($id)
        {
          $db      = \Config\Database::connect();
          $builder2 = $db->table("tinvoicecreate1");
          $builder2->select('tinvoicecreate1.*');
          $builder2->where('tinvoicecreate1.random', $id);
          $users = $builder2->get()->getResult();
          $idd = rand(1000, 9999);

          $fileName = 'invoice'.$id.'.xlsx';
      
          $spreadsheet = new Spreadsheet();
          $sheet = $spreadsheet->getActiveSheet();
          $sheet->setCellValue('A1', 'Id');
          $sheet->setCellValue('B1', 'DESCRIPTION');
          $sheet->setCellValue('C1', 'DATE');
          $sheet->setCellValue('D1', 'UNIT PRICE');
          $sheet->setCellValue('E1', 'TOTAL');
        
          $rows = 2;
        
          foreach ($users as $val){
              $sheet->setCellValue('A' . $rows, $val->id);
              $sheet->setCellValue('B' . $rows, $val->description);
              $sheet->setCellValue('C' . $rows, $val->date);
              $sheet->setCellValue('D' . $rows, $val->unitprice);
              $sheet->setCellValue('E' . $rows, $val->total);
      
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
            $filename = "upload/".'invoice'.$id.".xlsx";
            return redirect()->to(base_url($filename));
        }

        public function fetchdebitspre($id)
        {
          $db      = \Config\Database::connect();
          $builder2 = $db->table("debit");
          $builder2->select('debit.*');
          $builder2->where('debit.random', $id);
          $users = $builder2->get()->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'debitnote'. '.xlsx';
      
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

            $filename = "upload/".'debitnote'.".xlsx";
            return redirect()->to(base_url($filename));
        }

        public function fetchcreditspre($id)
        {
          $db      = \Config\Database::connect();
          $builder2 = $db->table("credit");
          $builder2->select('credit.*');
          $builder2->where('credit.random', $id);
          $users = $builder2->get()->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'creditnote'. '.xlsx';
      
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
          $sheet->setCellValue('T1', 'VENDOR'); 
          $sheet->setCellValue('U1', 'LIST');      
          $sheet->setCellValue('V1', 'STATUS');      
          $sheet->setCellValue('W1', 'DATERECIEVERD');
          $sheet->setCellValue('X1', 'DATEDELIVERED');
        
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
              $sheet->setCellValue('T' . $rows, $val->vendor);
              $sheet->setCellValue('U' . $rows, $val->list);
              $sheet->setCellValue('V' . $rows, $val->status);
              $sheet->setCellValue('W' . $rows, $val->daterecieved);
              $sheet->setCellValue('X' . $rows, $val->datedelivered);
      
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

            $filename = "upload/".'creditnote'.".xlsx";
            return redirect()->to(base_url($filename));
        }

        public function fetchwarrantyspre($id)
        {
         
          $db      = \Config\Database::connect();
          $builder2 = $db->table("warrantyout");
          $builder2->select('warrantyout.*');
          $builder2->where('warrantyout.random', $id);
          $users = $builder2->get()->getResult();
       
            // $users = $query->getResult();
          //   $users = $query->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'warrantynote'. '.xlsx';
      
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
          $sheet->setCellValue('T1', 'CUSTOMER'); 
          $sheet->setCellValue('U1', 'LIST');      
          $sheet->setCellValue('V1', 'STATUS');      
          $sheet->setCellValue('W1', 'DATERECIEVERD');
          $sheet->setCellValue('X1', 'DATEDELIVERED');
        
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
              $sheet->setCellValue('T' . $rows, $val->vendor);
              $sheet->setCellValue('U' . $rows, $val->list);
              $sheet->setCellValue('V' . $rows, $val->status);
              $sheet->setCellValue('W' . $rows, $val->daterecieved);
              $sheet->setCellValue('X' . $rows, $val->datedelivered);
      
                $rows++;
            } 
            // spreadsheet
      
              $data = [
                  'ref' => $idd,
              ];
              $builder = $db->table("export");
              $builder = $db->table("export.*");
              $db->table('export')->insert($data);
            $writer = new Xlsx($spreadsheet);
            $writer->save("upload/".$fileName);

            $filename = "upload/".'warrantynote'.".xlsx";
            return redirect()->to(base_url($filename));

        }

        public function spreadsheetf()
        {
            $db      = \Config\Database::connect();
            $builder = $db->table('faulty');   
            $builder->select('faulty.*');
            
          $users = $builder->get()->getResult();
       
          //   $users = $query->getResult();
          $idd = rand(1000, 9999);
          $fileName = 'faulty'.$idd. '.xlsx';
      
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
            // spreadsheet
      
              $data = [
                  'ref' => $idd,
              ];
              $builder = $db->table("export");
              $builder = $db->table("export.*");
              $db->table('export')->insert($data);
            $writer = new Xlsx($spreadsheet);
            $writer->save("upload/".$fileName);

            $filename = "upload/".'faulty'.$idd.".xlsx";
            return redirect()->to(base_url($filename));
        }

        public function spreadsheet()
        {
                
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');   
          $builder->select('masterlist.*');
          
        $users = $builder->get()->getResult();
     
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'stock'.$idd. '.xlsx';
    
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
          $filename = "upload/".'stock'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      }
 
  public function spreadsheetfd()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.type="hdd"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyhdd'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyhdd'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function spreadsheets()
  {
          
    $db      = \Config\Database::connect();
    $builder = $db->table('stockout');   
    $builder->select('stockout.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'spreadsheets'. '.xlsx';

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

      $data = [
        'ref' => $idd,
    ];
    $builder = $db->table("export");
    $builder = $db->table("export.*");
    $db->table('export')->insert($data);
  $writer = new Xlsx($spreadsheet);
  $writer->save("upload/".$fileName);
  $filename = "upload/".'spreadsheets'.$idd.".xlsx";
  return redirect()->to(base_url($filename));

}

    public function spreadsheetw()
    {
        $db      = \Config\Database::connect();
    $builder = $db->table('warrantyout');   
    $builder->select('warrantyout.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'spreadsheetw'. '.xlsx';

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
    $filename = "upload/".'spreadsheetw'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
    }

    public function spreadsheetpfi()
    {
      $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faulty'.$idd. '.xlsx';

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
  $filename = "upload/".'faulty'.$idd.".xlsx";
  return redirect()->to(base_url($filename));
    }

    public function spreadsheetpwi()
    {
      $db      = \Config\Database::connect();
    $builder = $db->table('warrantyin');   
    $builder->select('warrantyin.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'warrantyin'.$idd. '.xlsx';

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
  $filename = "upload/".'warrantyin'.$idd.".xlsx";
  return redirect()->to(base_url($filename));
    }


    public function customercsv()
    {
    $db      = \Config\Database::connect();
    $builder = $db->table('customer');   
    $builder->select('*');
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'Customers'. '.xlsx';
  
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', '#');
    $sheet->setCellValue('B1', 'FIRST NAME');
    $sheet->setCellValue('C1', 'LAST NAME');
    $sheet->setCellValue('D1', 'USER NAME');
    $sheet->setCellValue('E1', 'CONTACT');
    $sheet->setCellValue('F1', 'EMAIL');
    $sheet->setCellValue('G1', 'ID NO');
    $sheet->setCellValue('G1', 'LOCATION');

  
    $rows = 2;
    $i = 0;
    foreach ($users as $val){
        $i++;
        $sheet->setCellValue('A' . $rows, $i);
        $sheet->setCellValue('B' . $rows, $val->fname);
        $sheet->setCellValue('C' . $rows, $val->lname);
        $sheet->setCellValue('D' . $rows, $val->username);
        $sheet->setCellValue('E' . $rows, $val->phone);
        $sheet->setCellValue('F' . $rows, $val->email);
        $sheet->setCellValue('G' . $rows, $val->id_no);
        $sheet->setCellValue('G' . $rows, $val->location);

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
    $filename = "upload/".'Customers'.".xlsx";
    return redirect()->to(base_url($filename));
    }

    public function spreadsheetp()
    {
        $db      = \Config\Database::connect();
    $builder = $db->table('masterlist');   
    $builder->select('masterlist.*');
    
  $users = $builder->get()->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'spreadsheetp'. '.xlsx';

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
  $filename = "upload/".'spreadsheetp'.".xlsx";
  return redirect()->to(base_url($filename));


    }

    public function deliveryimport()
    {
      try {
        $db      = \Config\Database::connect();
        $builder111 = $db->table('stockout');
        $builder111->selectMax('id');
        $dels = $builder111->get()->getResultArray();
        foreach($dels as $dls):
          $del = $dls['id'] + 1;
        endforeach;
        $update = ['random' => $del,
        'terms' => session()->get('user_name'),
      ];
        $sess = session()->get('user_name');
        $db      = \Config\Database::connect();
        if ($this->request->getMethod() == "post") {
            $file = $this->request->getFile("file");
            $file_name = $file->getTempName();
            $stock = array();
            $csv_data = array_map('str_getcsv', file($file_name));
            if (count($csv_data) > 0) {
                $index = 0;
                foreach ($csv_data as $filedata) {
                    if ($index > 0) {
                        $stock[] = array(
                          'assetid' => $filedata[0],
                          'terms' => session()->get('user_name')
                        );
                    }
                    $index++;
                }

                foreach($stock as $s){
                  
                  $builder1 = $db->table('masterlist');
                  $builder1->select('*');
                  $builder1->where('assetid', $s['assetid']);
                  $datas = $builder1->get()->getResultArray();
                  if($datas){
                    foreach($datas as $d){
                      // echo '<pre>';
                      // print_r($s);
                      $builder11 = $db->table('tempinsert');
                      $builder11->select('*');
                      $builder11->where('assetid', $d['assetid']);
                      $data2 = $builder11->get()->getResultArray();
                      if(!$data2){
                        $db->table('tempinsert')->insert($d);
                      }
                      else{
  
                        return redirect()->back()->with('status', 'items already exist');
                      }
                    }
                  }
                  $builder111 = $db->table('tempinsert');
                  $builder111->select('*');
                  $builder111->where('assetid', $s['assetid']);
                  $builder111->update($update);
                }
                $total = $index-1;
                // exit;
                //   $db      = \Config\Database::connect();
                //   $builder = $db->table('tempinsert');
                //   $builder->insertBatch($stock);
                //   $session = session();
                //   $session->setFlashdata("success", "Data saved successfully");

                return redirect()->to(base_url('ProductsCrud/delv'))->with('status', $total. ' items added' );
            }

        }
      } catch (\Exception $e) {
        return redirect()->back()->with('status', 'Kindly check your csv format');
      }
        return redirect()->to(base_url('Warranty/wload'));

    }

    public function importCsvToW()
    {
      try {
        $del =rand(100000, 999999);

        $db      = \Config\Database::connect();
        if ($this->request->getMethod() == "post") {

            $file = $this->request->getFile("file");

            $file_name = $file->getTempName();

            $stock = array();
            $csv_data = array_map('str_getcsv', file($file_name));

            if (count($csv_data) > 0) {

                $index = 0;

                foreach ($csv_data as $filedata) {

                    if ($index > 0) {
                      if($filedata[3]){
                        $assetid1 =  $filedata[3];
                      }
                      else{
                      $rand = rand(100000, 999999);
                      $assetid1 = 'WI'.$rand; 
                      }

                        $stock[] = array(
                          'id' => $filedata[0],
                          'conditions' => $filedata[1],
                          'type' => $filedata[2],
                          'assetid' => $assetid1,
                          'gen' => $filedata[4],
                          'brand' => $filedata[5],
                          'serialno' => $filedata[6],
                          'part' => $filedata[7],
                          'modelid' => $filedata[8],  
                          'model' => $filedata[9],
                         'cpu' => $filedata[10],
                          'speed' => $filedata[11], 
                          'ram' => $filedata[12],
                          'hdd' => $filedata[13],  
                          'odd' => $filedata[14],
                          'screen' => $filedata[15],
                          'comment'=> $filedata[16],
                          'price' => $filedata[17],
                          'problem' => $filedata[18],
                          'del' => $del,   
                          'customer' => $this->request->getVar('customer'),
                        );
                    }
                    $index++;
                }


                    
        $num = 0;

        foreach($stock as $s){
        $builder11 = $db->table('masterlist');
        $builder11->select('masterlist.assetid');
        $builder11->where('masterlist.assetid', $s['assetid']);
        $datta = $builder11->get()->getResultArray();
        foreach($datta as $d):
          $num++;
          endforeach;
        }

        $builder121 = $db->table('masterlist');
        $builder121->select('masterlist.del');
        $builder121->where('masterlist.assetid', $s['assetid']);
        $dattas = $builder121->get()->getResultArray();
        if($dattas){
        foreach($dattas as $ds):
        endforeach;
        $builder1221 = $db->table('masterlist');
        $builder1221->select('masterlist.assetid');
        $builder1221->where('masterlist.del', $ds['del']);
        $builder1221->limit(20);
        $dattass = $builder1221->get()->getResultArray();
        }
        if($num > 0){
        $dssss = json_encode($dattass); 
        $arr = json_encode([1, 2, 3, 4,5]);
        return redirect()->to(base_url('Warranty/wload'))->with('status', $num.' '.'Items already exist in Stock In including:'.' '.$dssss. '...');
        }

        $num1 = 0;
        foreach($stock as $s){
        $builder12 = $db->table('faulty');
        $builder12->select('faulty.*');
        $builder12->where('faulty.assetid', $s['assetid']);
        $datta1 = $builder12->get()->getResultArray();
        foreach($datta1 as $d1):
          $num1++;
          endforeach;
        }
        if($num1 > 0){
          return redirect()->to(base_url('Warranty/wload'))->with('status', $num1.' '.'Items already exist in faulty stock including:'.' '.$d1['assetid']. '...');

      }
      $num3 = 0;
      foreach($stock as $s){
        $builder13 = $db->table('warrantyin');
        $builder13->select('warrantyin.*');
        $builder13->where('warrantyin.assetid', $s['assetid']);
        $datta2 = $builder13->get()->getResultArray();
        foreach($datta2 as $d2):
          $num3++;
          endforeach;
      }
        if($num3 > 0){
          return redirect()->to(base_url('Warranty/wload'))->with('status', $num3.' '.'Items already exist in faulty stock including:'.' '.$d2['assetid']. '...');

      }
          $nums = $index-1;
          $builder1 = $db->table('wtemplist');
          $builder1->insertBatch($stock);
          $build = $db->table('wtemplist');
          $build->select('*');
          $build->where('del', $del);
          $build->update(['total' => $nums]);
            
                $data1 = [
                  'username' => $this->request->getVar('customer'),
      
              ];
              $data5 =[
                  'random' => $del,
              ];
               $builder2 = $db->table("customer");
              $builder2->select('customer.*');
              $builder2->where('username', $data1['username']);
              $data3 = $builder2->get()->getResultArray();
      
              $builder1 = $db->table("wicustomer");
              $builder1->select('wicustomer.*');
              $builder1->where('username', $data1['username']);
              $data2 = $builder1->get()->getResultArray();
      
              foreach($data3 as $r) { 
                if(!$data2)
                  $db->table('wicustomer')->insert($r);
              }
      
              $builder1000 = $db->table("wicustomer");
              $builder1000->select('wicustomer.*');
              $builder1000->where('username', $data1['username']);
              $builder1000->update(['random' => $data5['random']]);
              $session = session();
              return redirect()->to(base_url('Warranty/wload'))->with('status', $index.' '.'Items inserted successfully');
            }

        }
      } catch (\Exception $e) {
        return redirect()->back()->with('status', 'Kindly check your csv format');
      }
        return redirect()->to(base_url('Warranty/wload'));

    }

    
    public function importCsvToM()
    {
      try {
        $del =rand(100000, 999999);

        $db      = \Config\Database::connect();
        if ($this->request->getMethod() == "post") {

            $file = $this->request->getFile("file");

            $file_name = $file->getTempName();

            $stock = array();
            $csv_data = array_map('str_getcsv', file($file_name));

            if (count($csv_data) > 0) {
              $builder2 = $db->table('templist');
              $builder2->select('*');
              $data2 = $builder2->get()->getResultArray();
                if($data2){
                    return redirect()->back()->with('status', 'Try again after pushing all items to masterlist');
                }

                $index = 0;

                foreach ($csv_data as $filedata) {
                  $qty = $index + 1;
                    if ($index > 0) {
                      if($filedata[3]){
                        $assetid1 =  $filedata[3];
                      }
                      else{

                        $assid = 0;
                        $builder1 = $db->table('masterlist');
                        $builder1->selectMax('id');
                        $data1 = $builder1->get()->getResultArray();
                        foreach($data1 as $d1){
                            if($d1['id']){
                                $assid = 'ST'.$d1['id'] + 1;
                                for($j=0; $j < $qty; $j++){
                                    $assid ++ ; 
                                    $assetid1 = $assid;
                                }
                            }
                            else{
                                for($j=0; $j < $qty; $j++){
                                  $assetid1 = 'ST'.rand(1000000, 9999999);
                                }
                            }
                        } 
                      }

                        $stock[] = array(
                          // 'id' => $filedata[0],
                          'conditions' => $filedata[1],
                          'type' => $filedata[2],
                          'assetid' => $assetid1,
                          'gen' => $filedata[4],
                          'brand' => $filedata[5],
                          'serialno' => $filedata[6],
                          'part' => $filedata[7],
                          'modelid' => $filedata[8],  
                          'model' => $filedata[9],
                         'cpu' => $filedata[10],
                          'speed' => $filedata[11], 
                          'ram' => $filedata[12],
                          'hdd' => $filedata[13],  
                          'odd' => $filedata[14],
                          'screen' => $filedata[15],
                          'comment'=> $filedata[16],
                          // 'price' => $filedata[17],
                          // 'problem' => $filedata[18],
                          'del' => $del,   
                          'vendor' => $this->request->getVar('customer'),
                        );
                    }
                    $index++;
                }
                    
        $num = 0;

        foreach($stock as $s){
        $builder11 = $db->table('masterlist');
        $builder11->select('masterlist.assetid');
        $builder11->where('masterlist.assetid', $s['assetid']);
        $datta = $builder11->get()->getResultArray();
        foreach($datta as $d):
          $num++;
          endforeach;
        }
        if($datta){
        if($num > 0){
        $dssss = json_encode($datta); 
        $arr = json_encode([1, 2, 3, 4,5]);
        return redirect()->to(base_url('ProductsCrud/load'))->with('status', $num.' '.'Items already exist in Stock In including:'.' '.$s['assetid']. '...');
        }
        }

        $num1 = 0;
        foreach($stock as $s){
        $builder12 = $db->table('faulty');
        $builder12->select('faulty.*');
        $builder12->where('faulty.assetid', $s['assetid']);
        $datta1 = $builder12->get()->getResultArray();
        foreach($datta1 as $d1):
          $num1++;
          endforeach;
        }
        if($num1 > 0){
          return redirect()->to(base_url('ProductsCrud/load'))->with('status', $num1.' '.'Items already exist in faulty stock including:'.' '.$d1['assetid']. '...');
      }
      $num3 = 0;
      foreach($stock as $s){
        $builder13 = $db->table('warrantyin');
        $builder13->select('warrantyin.*');
        $builder13->where('warrantyin.assetid', $s['assetid']);
        $datta2 = $builder13->get()->getResultArray();
        foreach($datta2 as $d2):
          $num3++;
          endforeach;
      }
        if($num3 > 0){
          return redirect()->to(base_url('ProductsCrud/load'))->with('status', $num3.' '.'Items already exist in faulty stock including:'.' '.$d2['assetid']. '...');

      }

          $builder1 = $db->table('templist');
          $builder1->insertBatch($stock);
          $session = session();
          $nums = $index-1;
          $build = $db->table('templist');
          $build->select('*');
          $build->where('del', $del);
          $build->update(['total' => $nums]);

            }
            return redirect()->to(base_url('ProductsCrud/load'))->with('status', $nums.' '. ' Item(s) inserted successfully');

        }
      } catch (\Exception $e) {
        return redirect()->back()->with('status', 'Kindly check your csv format');
      }
        return redirect()->to(base_url('ProductsCrud/load'));

    }

    public function fload()
    {
      try {
        $del =rand(100000, 999999);

        $db      = \Config\Database::connect();
        if ($this->request->getMethod() == "post") {

            $file = $this->request->getFile("file");

            $file_name = $file->getTempName();

            $stock = array();
            $csv_data = array_map('str_getcsv', file($file_name));

            if (count($csv_data) > 0) {
                $index = 0;
                foreach ($csv_data as $filedata) {
                    if ($index > 0) {
                      if($filedata[3]){
                        $assetid1 =  $filedata[3];
                      }
                      else{
                      $rand = rand(100000, 999999);
                      $assetid1 = 'FP'.$rand; 
                      }
                        $stock[] = array(
                          'conditions' => $filedata[1],
                          'type' => $filedata[2],
                          'assetid' => $assetid1,
                          'gen' => $filedata[4],
                          'brand' => $filedata[5],
                          'serialno' => $filedata[6],
                          'part' => $filedata[7],
                          'modelid' => $filedata[8],  
                          'model' => $filedata[9],
                         'cpu' => $filedata[10],
                          'speed' => $filedata[11], 
                          'ram' => $filedata[12],
                          'hdd' => $filedata[13],  
                          'odd' => $filedata[14],
                          'screen' => $filedata[15],
                          'comment'=> $filedata[16],
                          'price' => $filedata[17],
                          'problem' => $filedata[18],
                          'del' => $del,   
                          'vendor' => $this->request->getVar('customer'),
                        );
                    }
                    $index++;
                }
        $num = 0;

        foreach($stock as $s){
        $builder11 = $db->table('masterlist');
        $builder11->select('masterlist.assetid');
        $builder11->where('masterlist.assetid', $s['assetid']);
        $datta = $builder11->get()->getResultArray();
        foreach($datta as $d):
          $num++;
          endforeach;
        }

        $builder121 = $db->table('masterlist');
        $builder121->select('masterlist.del');
        $builder121->where('masterlist.assetid', $s['assetid']);
        $dattas = $builder121->get()->getResultArray();
        if($dattas){
        foreach($dattas as $ds):
        endforeach;
        $builder1221 = $db->table('masterlist');
        $builder1221->select('masterlist.assetid');
        $builder1221->where('masterlist.del', $ds['del']);
        $builder1221->limit(20);
        $dattass = $builder1221->get()->getResultArray();
        }
        if($num > 0){
        $dssss = json_encode($dattass); 
        $arr = json_encode([1, 2, 3, 4,5]);
        return redirect()->to(site_url('/tload'))->with('status', $num.' '.'Items already exist in Stock In including:'.' '.$dssss. '...');
        }

        $num1 = 0;
        foreach($stock as $s){
        $builder12 = $db->table('faulty');
        $builder12->select('faulty.*');
        $builder12->where('faulty.assetid', $s['assetid']);
        $datta1 = $builder12->get()->getResultArray();
        foreach($datta1 as $d1):
          $num1++;
          endforeach;
        }
        if($num1 > 0){
          return redirect()->to(site_url('/tload'))->with('status', $num1.' '.'Items already exist in faulty stock including:'.' '.$d1['assetid']. '...');

      }
      $num3 = 0;
      foreach($stock as $s){
        $builder13 = $db->table('warrantyin');
        $builder13->select('warrantyin.*');
        $builder13->where('warrantyin.assetid', $s['assetid']);
        $datta2 = $builder13->get()->getResultArray();
        foreach($datta2 as $d2):
          $num3++;
          endforeach;
      }
        if($num3 > 0){
          return redirect()->to(site_url('tload'))->with('status', $num3.' '.'Items already exist in faulty stock including:'.' '.$d2['assetid']. '...');

      }

          $builder1 = $db->table('tfaulty');
          $builder1->insertBatch($stock);
          $session = session();

          $nums = $index-1;

          $build = $db->table('tfaulty');
          $build->select('*');
          $build->where('del', $del);
          $build->update(['total' => $nums]);

        // return redirect()->to(base_url('ProductsCrud/load'))->with('status', $nums.' '. ' Item(s) inserted successfully');
            }
            return redirect()->to(site_url('/tload'))->with('status', $nums.' '. ' Item(s) inserted successfully');

        }
      } catch (\Exception $e) {
        return redirect()->back()->with('status', 'Kindly check your csv format');
      }
        return redirect()->to(site_url('/tload'));

    }


    public function backup(){

      $dbhost = 'localhost:3036';
      $dbuser = 'root';
      $db = 'users';
      $dbpass = '';
      date_default_timezone_set("Africa/Nairobi");
      $date = date("h:i:sa");
      $dbname = 'ttglobal';
      $backup_file = $dbname . date("Y-m-d-H-i-s") . '.gz';
      $command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". "test_db | gzip > $backup_file";
      if($date == '04:09:52pm' ){
        echo 'performing backup...';
       system($command);


      }
      system($command);
    }

    public function floads()
    {
      $e = 'Something went wrong';
      
      // try {
        $del =rand(100000, 999999);

        $db      = \Config\Database::connect();
        if ($this->request->getMethod() == "post") {

            $file = $this->request->getFile("file");

            $file_name = $file->getTempName();

            $stock = array();
            $csv_data = array_map('str_getcsv', file($file_name));

            if (count($csv_data) > 0) {

                $index = 0;

                foreach ($csv_data as $filedata) {
                  if ($index > 0) {
                    if($filedata[3]){
                      $assetid1 =  $filedata[3];
                    }
                    else{
                    $rand = rand(100000, 999999);
                    $assetid1 = 'FI'.$rand; 
                    }

                    if ($index > 0) {

                        $stock[] = array(
                          //  'id' => $filedata[0],
                            'conditions' => $filedata[1],
                            'type' => $filedata[2],
                            'assetid' => $assetid1,
                            'gen' => $filedata[4],
                            'brand' => $filedata[5],
                            'serialno' => $filedata[6],
                            'part' => $filedata[7],
                            'modelid' => $filedata[8],  
                            'model' => $filedata[9],
                            'cpu' => $filedata[10],
                            'speed' => $filedata[11], 
                            'ram' => $filedata[12],
                            'hdd' => $filedata[13],  
                            'odd' => $filedata[14],
                            'screen' => $filedata[15],
                            'comment'=> $filedata[16],
                            'price' => $filedata[17],
                            'problem' => $filedata[18],

                            'del' => $del,   
                            'vendor' => $this->request->getVar('vendor'),

                        );
                    }
                    $index++;
                }

                $num = 0;

                foreach($stock as $s){

                $builder11 = $db->table('masterlist');
                $builder11->select('masterlist.assetid');
                $builder11->where('masterlist.assetid', $s['assetid']);
                $datta = $builder11->get()->getResultArray();
                foreach($datta as $d):
                  $num++;
                  endforeach;
                
                }

                if($num > 0){
                  return redirect()->to(base_url('ProductsCrud/load'))->with('status', $num.' '.'Items already exist in Stock In including:'.' '.$d['assetid']. '...');

                }
                $num1 = 0;
                foreach($stock as $s){
                $builder12 = $db->table('faulty');
                $builder12->select('faulty.*');
                $builder12->where('faulty.assetid', $s['assetid']);
                $datta1 = $builder12->get()->getResultArray();
                foreach($datta1 as $d1):
                  $num1++;
                  endforeach;
                }
                if($num1 > 0){
                  return redirect()->to(base_url('ProductsCrud/load'))->with('status', $num1.' '.'Items already exist in faulty stock including:'.' '.$d1['assetid']. '...');

              }
              $num3 = 0;
              foreach($stock as $s){
                $builder13 = $db->table('warrantyin');
                $builder13->select('warrantyin.*');
                $builder13->where('warrantyin.assetid', $s['assetid']);
                $datta2 = $builder13->get()->getResultArray();
                foreach($datta2 as $d2):
                  $num3++;
                  endforeach;
              }
                if($num3 > 0){
                  return redirect()->to(base_url('ProductsCrud/load'))->with('status', $num3.' '.'Items already exist in faulty stock including:'.' '.$d2['assetid']. '...');

              }
                  $nums= $index -1;
                  $builder = $db->table('tfaulty');
                  $builder->insertBatch($stock);
               
                  $build = $db->table('tfaulty');
                  $build->select('*');
                  $build->where('del', $del);
                  $build->update(['total' => $nums]);
                  $session = session();
                return redirect()->to(site_url('tload'))->with('status', $nums. ' '. 'Items inserted successfully');

        }
      }
    }
    
      //  catch (Exception $e) {
      //   return redirect()->back()->with('status', $e);
      // }
             return redirect()->to(site_url('tload'))->with('status', 'Data saved successfully');   
    }

    public function search()
    {

        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
     $daat = [
        'type' => $this->request->getVar('type'),
        'gen' => $this->request->getVar('gen'),
        'model' => $this->request->getVar('model'),
        'conditions' => $this->request->getVar('conditions')
    ];


        $db      = \Config\Database::connect();
        $builder1 = $db->table('masterlist');
        $builder1->select('masterlist.*')->orderBy('daterecieved', 'DESC');
        if($daat['type']){ $builder1->where('type', $daat['type']);}
        if($daat['gen']){$builder1->where('gen',$daat['gen']);}
        if($daat['model']){$builder1->where('model', $daat['model']);}
        if($daat['conditions']){$builder1->where('conditions', $daat['conditions']);}
        $users = $builder1->get()->getResult();
      $idd = rand(1000, 9999);
      $fileName = 'searchresult'.$idd. '.xlsx';
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
      $filename = "upload/".'searchresult'.$idd.".xlsx";
      return redirect()->to(base_url($filename));
    
    

    }

    public function fsummary()
    {
        return view('products/fsummary');
    }

    public function summary()
    {

    return view('/summary/warrantyin', $data);
    }

    //   type = 'desktop' AND conditions ='New'
   
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
      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*');
      $builder->where('warrantyin.conditions = "New" AND type="desktop"' );
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
        return view('/warranty/Ndesktop', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Ndesktop'] = $builder->get()->getResult();
      return view('/warranty/Ndesktop', $data);
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.conditions = "Used" AND type="desktop"' );
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
     return view('/warranty/Udesktop', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Udesktop'] = $builder->get()->getResult();
      return view('/warranty/Udesktop', $data);
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

        $builder = $db->table('warrantyin');
        $builder->select('warrantyin.*');
        $builder->where('warrantyin.conditions = "Refurb" AND type="desktop"' );
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
     return view('/warranty/Rdesktop', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Rdesktop'] = $builder->get()->getResult();
        return view('/warranty/Rdesktop', $data);
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.conditions = "New" AND type="laptop"' );
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
        return view('/warranty/Nlaptop', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Nlaptop'] = $builder->get()->getResult();
      return view('/warranty/Nlaptop', $data);
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.conditions = "Used" AND type="laptop"' );
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
     return view('/warranty/Ulaptop', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Ulaptop'] = $builder->get()->getResult();
      return view('/warranty/Ulaptop', $data);
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.conditions = "Refurb" AND type="laptop"' );
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
     return view('/warranty/Rlaptop', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Rlaptop'] = $builder->get()->getResult();
      return view('/warranty/Rlaptop', $data);
     }

    }

// lcds

public function nlcdw()
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

$builder = $db->table('warrantyin');
$builder->select('warrantyin.*');
$builder->where('warrantyin.conditions = "New" AND type="Lcd"' );
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

 
 return view('/warranty/nlcd', $data);
 
 } elseif(!$this->request->getGet('q')) {
  
  $data['user_data'] = $session->get('designation');
  $data['Rdesktop'] = $builder->get()->getResult();
 
  return view('/warranty/nlcd', $data);
 }

}

// checking duplicates in all tables 
public function duplicate(){

      // printing duplicates
      $db      = \Config\Database::connect();
      // $builder = $db->table("masterlist");
      // $builder->select('masterlist.*, warrantyin.*, recycle.*, stockout.*, warrantyout.*, faultyout.*, faulty.*, COUNT(masterlist.assetid) as status');
      // $builder->join('faulty', 'masterlist.assetid = faulty.assetid', 'left');
      // $builder->join('warrantyin', 'faulty.assetid = warrantyin.assetid', 'left');
      // $builder->join('recycle', 'warrantyin.assetid = recycle.assetid', 'left');
      // $builder->join('stockout', 'recycle.assetid = stockout.assetid', 'left');
      // $builder->join('warrantyout', 'stockout.assetid = warrantyout.assetid', 'left');
      // $builder->join('faultyout', 'warrantyout.assetid = faultyout.assetid', 'left');
      // $builder->HAVING('COUNT(masterlist.assetid) > 1');
      // $data['masterlist'] = $builder->get()->getResultArray();


      $builder = $db->table('masterlist');
      $builder->select('assetid,  COUNT(assetid) as assetid');
      $builder->groupBy(['assetid']);
      $builder->HAVING('COUNT(assetid) > 1');
      $datas = $builder->get()->getResultArray();

      $builder1 = $db->table('faulty');
      $builder1->select('assetid,  COUNT(assetid) as assetid');
      $builder1->groupBy(['assetid']);
      $builder1->HAVING('COUNT(assetid) > 1');
      $datas1 = $builder1->get()->getResultArray();

      $builder2 = $db->table('warrantyin');
      $builder2->select('assetid,  COUNT(assetid) as assetid');
      $builder2->groupBy(['assetid']);
      $builder2->HAVING('COUNT(assetid) > 1');
      $datas2 = $builder2->get()->getResultArray();

      $builder3 = $db->table('warrantyout');
      $builder3->select('assetid,  COUNT(assetid) as status');
      $builder3->groupBy(['assetid']);
      $builder3->HAVING('COUNT(status) > 1');
      $datas3 = $builder3->get()->getResultArray();

      $builder4 = $db->table('faultyout');
      $builder4->select('assetid,  COUNT(assetid) as status');
      $builder4->groupBy(['assetid']);
      $builder4->HAVING('COUNT(status) > 1');
      $datas4 = $builder4->get()->getResultArray();

      $builder5 = $db->table('stockout');
      $builder5->select('assetid,  COUNT(assetid) as status');
      $builder5->groupBy(['assetid']);
      $builder5->HAVING('COUNT(status) > 1');
      $datas5 = $builder5->get()->getResultArray();

      // $builder6 = $db->table('recycle');
      // $builder6->select('assetid,  COUNT(assetid) as status');
      // $builder6->groupBy(['assetid']);
      // $builder6->HAVING('COUNT(status) > 1');
      // $datas6 = $builder6->get()->getResultArray();
      $datass = array_merge($datas, $datas1, $datas2, $datas3, $datas4, $datas5 );

      // echo '<pre>';
      // print_r($datass);
      // exit;
      $i = 0;
      foreach($datass as $dss){
        $ds = $dss['assetid']; 
        $builder8 = $db->table('masterlist');
        $builder8->select('*');
        $builder8->where('assetid', $ds);
        $data8['masterlist'] = $builder8->get()->getResultArray();

        $builder9 = $db->table('faulty');
        $builder9->select('*');
        $builder9->where('assetid', $ds);
        $data8['faulty'] = $builder9->get()->getResultArray();

        $builder10 = $db->table('warrantyin');
        $builder10->select('*');
        $builder10->where('assetid', $ds);
        $data8['warrantyin'] = $builder10->get()->getResultArray();

        $builder11 = $db->table('warrantyout');
        $builder11->select('*');
        $builder11->where('assetid', $ds);
        $data8['warrantyout'] = $builder11->get()->getResultArray();

        $builder12 = $db->table('stockout');
        $builder12->select('*');
        $builder12->where('assetid', $ds);
        $data8['stockout'] = $builder12->get()->getResultArray();

        $builder13 = $db->table('faultyout');
        $builder13->select('*');
        $builder13->where('assetid', $ds);
        $data8['faultyout'] = $builder13->get()->getResultArray();
        // $data['masterlist'][$i] = array_merge($data8, $data9, $data10, $data11, $data12, $data13);
        $i++;

        

        // $builder14 = $db->table('recycle');
        // $builder14->select('*');
        // $builder14->where('assetid', $dss['assetid']);
        // $data14 = $builder14->get()->getResultArray();
      }
      echo '<pre>';
        print_r($data8);
      exit;

      // if($data1){
      //   $data['masterlist'] = $data1;
      // }
      // // $data['masterlist'] = array_pop($data1);



      // echo '<pre>';
      // print_r($data['masterlist']);
      // exit;


      // $builder10 = $db->table('masterlist');
      // $builder10->select('warrantyin.*, recycle.*, stockout.*, warrantyout.*, faultyout.*, faulty.*,');
      // $builder10->join('masterlist', ' tempinsert.random = dcustomer.random', "left");
      // $builder10->where('tempinsert.random', $data['random']);
      // $builder10->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
      // $data5['items'] = $builder10->get()->getResult();



      // $builder1 = $db->table('faulty');
      // $builder1->select('assetid');
      // $data1 = $builder1->get()->getResultArray();

      // $builder2 = $db->table('masterlist');
      // $builder2->select('assetid');
      // $data2 = $builder2->get()->getResultArray();
      // $common = array_intersect(...$data2, ...$data1);


      // echo '<pre>';
      // print_r($common);
      // print_r($data1);
      // print_r($data2);

      // exit;


      $data['num'] = count($data['masterlist']);

      // echo '<pre>';
      // print_r($data['masterlist']);
      // exit;
      echo view('/products/template/header');
      return view('/products/duplicate', $data);
      echo view('/products/template/footer');


}

public function ulcdw()
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.conditions = "Used" AND type="ulcd"' );
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
     return view('/warranty/ulcd', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Rlaptop'] = $builder->get()->getResult();
      return view('/warranty/ulcd', $data);
     }

    }
    public function rlcdw()
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.conditions = "Refurb" AND type="Lcd"' );
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
     return view('/warranty/rlcd', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Rdesktop'] = $builder->get()->getResult();
      return view('/warranty/rlcd', $data);
     }

    }

// end

    public function wip()
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.status = "wip" ' );
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
     $data['ok'] = $builder->get()->getResult();
     return view('/warranty/wip', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['ok'] = $builder->get()->getResult();
      return view('/warranty/wip', $data);
     }

    }

    public function ok()
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.status = "irrepairable" ' );
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
     $data['ok'] = $builder->get()->getResult();
     return view('/warranty/ok', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['ok'] = $builder->get()->getResult();
      return view('/warranty/ok', $data);
     }

    }
    public function fixed()
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
    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.status = "fixed" ' );
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
     $data['fixed'] = $builder->get()->getResult();
        return view('/warranty/fixed', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['fixed'] = $builder->get()->getResult();
      return view('/warranty/fixed', $data);
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

      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*');
      $builder->where('warrantyin.conditions = "New" AND type="allinone"' );
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
        return view('/warranty/Nallinone', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Nallinone'] = $builder->get()->getResult();
      return view('/warranty/Nallinone', $data);
     }

    }

    public function smartphones()
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

      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*');
      $builder->where('warrantyin.type="smartphone"' );
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
        return view('/warranty/smartphone', $data);
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Nallinone'] = $builder->get()->getResult();
      return view('/warranty/smartphone', $data);
     }
    }

    public function tablets()
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

      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*');
      $builder->where('warrantyin.type="tablets"' );
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
        return view('/warranty/tablet', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Nallinone'] = $builder->get()->getResult();
      return view('/warranty/tablet', $data);
     }

    }

    public function otherss()
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

      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*');
      $builder->where('warrantyin.type="otherss"' );
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
        return view('/warranty/others', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Nallinone'] = $builder->get()->getResult();
      return view('/warranty/others', $data);
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

    $builder = $db->table('warrantyin');
  $builder->select('warrantyin.*');
  $builder->where('warrantyin.conditions = "Used" AND type="allinone"' );
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
   return view('/warranty/Udesktop', $data);
      
   } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');
    $data['Uallinone'] = $builder->get()->getResult();
    return view('/warranty/Udesktop', $data);
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

      $builder = $db->table('warrantyin');
      $builder->select('warrantyin.*');
      $builder->where('warrantyin.conditions = "Refurb" AND type="allinone"' );
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
     return view('/warranty/Rallinone', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Rallinone'] = $builder->get()->getResult();
      return view('/warranty/Rallinone', $data);
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

        $builder = $db->table('warrantyin');
      $builder->select(' warrantyin.*');
      $builder->where('warrantyin.type="ram"' );
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
      return view('/warranty/ram', $data);
      
   } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');
    $data['ram'] = $builder->get()->getResult();
      return view('/warranty/ram', $data);
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

    $builder = $db->table('warrantyin');
    $builder->select('warrantyin.*');
    $builder->where('warrantyin.type="hdd"' );
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
   return view('/warranty/hdd', $data);
      
   } elseif(!$this->request->getGet('q')) {
    $data['user_data'] = $session->get('designation');
    $data['hdd'] = $builder->get()->getResult();
    return view('/warranty/hdd', $data);
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

        $builder = $db->table('warrantyin');
        $builder->select('warrantyin.*');
        $builder->where('warrantyin.type="ssd"' );
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
     return view('/warranty/ssd', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['ssd'] = $builder->get()->getResult();
      return view('/warranty/ssd', $data);
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

        $builder = $db->table('warrantyin');
        $builder->select(' warrantyin.*');
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
        return view('/warranty/printers', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['printer'] = $builder->get()->getResult();
        return view('/warranty/printers', $data);
     }

    }


    public function spreadsheetr(){
      $db      = \Config\Database::connect();
      $builder = $db->table('recycle'); 
      $builder->select('recycle.*');
    $users = $builder->get()->getResult();
  
    //   $users = $query->getResult();
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
      $sheet->setCellValue('T1', 'VENDOR'); 
      $sheet->setCellValue('U1', 'LIST');      
      $sheet->setCellValue('V1', 'STATUS');      
      $sheet->setCellValue('W1', 'DATERECIEVERD');
      $sheet->setCellValue('X1', 'DATEDELIVERED');
  
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
          $sheet->setCellValue('T' . $rows, $val->vendor);
          $sheet->setCellValue('U' . $rows, $val->list);
          $sheet->setCellValue('V' . $rows, $val->status);
          $sheet->setCellValue('W' . $rows, $val->daterecieved);
          $sheet->setCellValue('X' . $rows, $val->datedelivered);
  
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

    public function spreadsheetwi()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table('warrantyin'); 
      $builder->select('warrantyin.*');
    $users = $builder->get()->getResult();
  
    //   $users = $query->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'warranty in'.$idd. '.xlsx';
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
      $sheet->setCellValue('T1', 'VENDOR'); 
      $sheet->setCellValue('U1', 'LIST');      
      $sheet->setCellValue('V1', 'STATUS');      
      $sheet->setCellValue('W1', 'DATERECIEVERD');
      $sheet->setCellValue('X1', 'DATEDELIVERED');
  
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
          $sheet->setCellValue('T' . $rows, $val->vendor);
          $sheet->setCellValue('U' . $rows, $val->list);
          $sheet->setCellValue('V' . $rows, $val->status);
          $sheet->setCellValue('W' . $rows, $val->daterecieved);
          $sheet->setCellValue('X' . $rows, $val->datedelivered);
  
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
      $filename = "upload/".'warranty in'.$idd.".xlsx";
      return redirect()->to(base_url($filename));
    }

    public function spreadsheetsto()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table('stockout'); 
      $builder->select('stockout.*');
    $users = $builder->get()->getResult();
  
    //   $users = $query->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'stock out'.$idd. '.xlsx';
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
      $sheet->setCellValue('T1', 'VENDOR'); 
      $sheet->setCellValue('U1', 'LIST');      
      $sheet->setCellValue('V1', 'STATUS');      
      $sheet->setCellValue('W1', 'DATERECIEVERD');
      $sheet->setCellValue('X1', 'DATEDELIVERED');
  
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
          $sheet->setCellValue('T' . $rows, $val->vendor);
          $sheet->setCellValue('U' . $rows, $val->list);
          $sheet->setCellValue('V' . $rows, $val->status);
          $sheet->setCellValue('W' . $rows, $val->daterecieved);
          $sheet->setCellValue('X' . $rows, $val->datedelivered);
  
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
      $filename = "upload/".'stock out'.$idd.".xlsx";
      return redirect()->to(base_url($filename));
    }

    public function spreadsheetfo(){

      $db      = \Config\Database::connect();
    $builder = $db->table('faultyout'); 
    $builder->select('faultyout.*');
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faulty out'.$idd. '.xlsx';
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
    $sheet->setCellValue('S1', 'VENDOR'); 
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
        $sheet->setCellValue('S' . $rows, $val->vendor);
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
    $filename = "upload/".'faulty out'.$idd.".xlsx";
    return redirect()->to(base_url($filename));



    }


    public function spreadsheetd()
    {
      $db      = \Config\Database::connect();
    $builder = $db->table('debit');   
    $builder->select('debit.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'debit'.$idd. '.xlsx';

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
    $filename = "upload/".'debit'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
    }


    public function spreadsheetc()
    {
      $db      = \Config\Database::connect();
    $builder = $db->table('credit');   
    $builder->select('credit.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'credit'.$idd. '.xlsx';

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
    $filename = "upload/".'credit'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
    }

    // faulty items spreadsheet
    public function spreadsheetfs()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.type="ssd"' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyssd'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyssd'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }
  public function spreadsheetfnd()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "New" AND type="desktop' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyndesktop'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyndesktop'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  

  public function spreadsheetfod()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Refurb" AND type="desktop' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyod'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyod'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function spreadsheetrd()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Refurb" AND type="desktop' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyrd'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyrd'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function spreadsheetnl()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "New" AND type="laptop' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultynl'.$idd. '.xlsx';

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
    $filename = "upload/".'faultynl'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function spreadsheetol()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Used" AND type="laptop' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyol'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyol'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function spreadsheetrl()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Refurb" AND type="laptop' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyrl'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyrl'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function spreadsheetno()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "New" AND type="allinone' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyno'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyno'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function spreadsheetoa()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('faulty.conditions = "Used" AND type="allinone' );
    $builder->select('faulty.*');
    
  $users = $builder->get()->getResult();

  //   $users = $query->getResult();
  $idd = rand(1000, 9999);
  $fileName = 'faultyoa'.$idd. '.xlsx';

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
    $filename = "upload/".'faultyoa'.$idd.".xlsx";
    return redirect()->to(base_url($filename));

  }

  public function pspsreadsheet($del)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('masterlist');   
    $builder->where('del', $del );
    $builder->select('*');
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'batch'.$del. '.xlsx';

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
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
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
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
    $filename = "upload/".'batch'.$del.".xlsx";
    return redirect()->to(base_url($filename));
  }


  public function pspsreadsheetf($del)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->where('del', $del );
    $builder->select('*');
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'batch'.$del. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
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
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
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
    $filename = "upload/".'batch'.$del.".xlsx";
    return redirect()->to(base_url($filename));
  }


  public function pspsreadsheetw($del)
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('warrantyin');   
    $builder->where('del', $del );
    $builder->select('*');
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'batch'.$del. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
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
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
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
    $filename = "upload/".'batch'.$del.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function stockouts()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('stockout');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'summary'.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'CUSTOMER');      
    $sheet->setCellValue('V1', 'DATERECIEVERD');
    $sheet->setCellValue('W1', 'DATEDELIVERED');
    $sheet->setCellValue('X1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->customer);
      $sheet->setCellValue('V' . $rows, $val->daterecieved);
      $sheet->setCellValue('W' . $rows, $val->datedelivered);
      $sheet->setCellValue('X' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'summary'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function masterlistsum()
  {
    $db      = \Config\Database::connect();
    $builder = $db->table('masterlist');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = 'summary'.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'DATERECIEVERD');
    $sheet->setCellValue('V1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->daterecieved);
      $sheet->setCellValue('V' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".'summary'.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function masterlistsums($title)
  {
    $delimiter = ' ';
    $words = explode($delimiter, $title);
    $condition = $words[0];
    $type = $words[1];

    $db      = \Config\Database::connect();
    $builder = $db->table('masterlist');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $builder->where('conditions', $condition);
    $builder->where('type', $type);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = $title.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'DATERECIEVERD');
    $sheet->setCellValue('V1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->daterecieved);
      $sheet->setCellValue('V' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".$title.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function faultysum($title)
  {
    $delimiter = ' ';
    $words = explode($delimiter, $title);
    $condition = $words[0];
    $type = $words[1];

    $db      = \Config\Database::connect();
    $builder = $db->table('faulty');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $builder->where('conditions', $condition);
    $builder->where('type', $type);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = $title.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'DATERECIEVERD');
    $sheet->setCellValue('V1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->daterecieved);
      $sheet->setCellValue('V' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".$title.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function faultysumout($title)
  {
    $delimiter = ' ';
    $words = explode($delimiter, $title);
    $condition = $words[0];
    $type = $words[1];

    $db      = \Config\Database::connect();
    $builder = $db->table('faultyout');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $builder->where('conditions', $condition);
    $builder->where('type', $type);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = $title.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'DATERECIEVERD');
    $sheet->setCellValue('V1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->daterecieved);
      $sheet->setCellValue('V' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".$title.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function stockoutsum($title)
  {
    $delimiter = ' ';
    $words = explode($delimiter, $title);
    $condition = $words[0];
    $type = $words[1];

    $db      = \Config\Database::connect();
    $builder = $db->table('stockout');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $builder->where('conditions', $condition);
    $builder->where('type', $type);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = $title.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'DATERECIEVERD');
    $sheet->setCellValue('V1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->daterecieved);
      $sheet->setCellValue('V' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".$title.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }
  public function warrantyinsum($title)
  {
    $delimiter = ' ';
    $words = explode($delimiter, $title);
    $condition = $words[0];
    $type = $words[1];

    $db      = \Config\Database::connect();
    $builder = $db->table('warrantyin');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $builder->where('conditions', $condition);
    $builder->where('type', $type);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = $title.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'DATERECIEVERD');
    $sheet->setCellValue('V1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->daterecieved);
      $sheet->setCellValue('V' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".$title.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }
  
  public function warrantyoutsum($title)
  {
    $delimiter = ' ';
    $words = explode($delimiter, $title);
    $condition = $words[0];
    $type = $words[1];

    $db      = \Config\Database::connect();
    $builder = $db->table('warrantyout');   
    $builder->select('*, sum(qty) as tqty')->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
    $builder->where('conditions', $condition);
    $builder->where('type', $type);
    $users = $builder->get()->getResult();
    $idd = rand(1000, 9999);
    $fileName = $title.$idd. '.xlsx';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'CONDTIONS');
    $sheet->setCellValue('C1', 'Type');
    $sheet->setCellValue('D1', 'BATCH');
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
    $sheet->setCellValue('S1', 'LIST');      
    $sheet->setCellValue('T1', 'STATUS');      
    $sheet->setCellValue('U1', 'DATERECIEVERD');
    $sheet->setCellValue('V1', 'QUANTITY');
    $rows = 2;
    $index = 0;
    foreach ($users as $val){
      $index ++;
      $sheet->setCellValue('A' . $rows, $index);
      $sheet->setCellValue('B' . $rows, $val->conditions);
      $sheet->setCellValue('C' . $rows, $val->type);
      $sheet->setCellValue('D' . $rows, $val->del);
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
      $sheet->setCellValue('S' . $rows, $val->list);
      $sheet->setCellValue('T' . $rows, $val->status);
      $sheet->setCellValue('U' . $rows, $val->daterecieved);
      $sheet->setCellValue('V' . $rows, $val->tqty);
      $rows++;
    } 
    $writer = new Xlsx($spreadsheet);
    $writer->save("upload/".$fileName);
    $filename = "upload/".$title.$idd.".xlsx";
    return redirect()->to(base_url($filename));
  }

  public function swap()
  {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        $date = date("Y/m/d");

        $db      = \Config\Database::connect();
         $builder1 = $db->table('customer4');
         $builder1->select('customer4.*')->orderBy('wnote', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('customer4.*');
        $builder1->like('fname', $q);
        $builder1->orLike('lname', $q);
        $builder1->orLike('location', $q);
        $builder1->orLike('ref', $q);
        $builder1->orLike('date', $q);
        $builder1->orLike('document', $q);

        $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/swapadd', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder1->get()->getResult();
            return view('products/swapadd', $data);
        }


    // if($this->request->getMethod()=='post'){
    
    // $faulty = $this->request->getVar('faulty');
    // $replace = $this->request->getVar('replace');

    // $db      = \Config\Database::connect();
    // $builder = $db->table('warrantyin');   
    // $builder->select('*');
    // $builder->where('assetid', $faulty);
    // $data_faulty = $builder->get()->getResult();
    // $customer = $data_faulty[0]['customer'];


    // $db      = \Config\Database::connect();
    // $builder1 = $db->table('masterlist');   
    // $builder1->select('*');
    // $builder1->where('assetid', $replace);
    // $data_replace = $builder1->get()->getResult();
    // foreach($data_replace as $d ){
    //   $builder2 = $db->table('warrantyout');
    //   $builder2->select('*');
    //   $builder2->where('assetid', $replace);
    // }

    // echo '<pre>';
    // print_r($data_faulty);

    // echo '<pre>';
    // print_r($data_replace);
    // exit;

    // }
  
  }

  public function swapcreat()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        helper(['form', 'url']);
        

        $db      = \Config\Database::connect();
        $builder = $db->table('warrantyswap');
        $builder->select('*');

        $builder1 = $db->table('customer5');
        $builder1->select('*');

        $data['customer'] = $builder1->get()->getResult();
        $data['masterlist'] = $builder->get()->getResult();

        $db      = \Config\Database::connect();
        $builder5 = $db->table('customer');
        $builder5->select('customer.*')->orderBy('username', 'ASC');;
        $data['customers'] = $builder5->get()->getResult();
        return view('products/swapp', $data);
    }

    public function adjustments(){
      $session = \Config\Services::session();
      $db      = \Config\Database::connect();
      $builder1 = $db->table('users');
      $builder1->select('users.*');
      $builder1->where('users.designation = "admin" ' );
      $sdata['hello'] = $builder1->get()->getResultArray();
      $sess = session()->get('user_name');
      $session->set($sdata);

      $builder222 =  $db->table('barcodes');
      $builder222->selectCount('serialno');
      $datawww = $builder222->get()->getResultArray();
      foreach($datawww as $dw):
      endforeach;
      $data['ans'] = $dw['serialno'];

      $builder17 = $db->table('type');
      $builder17->select('*');
      $data['type'] = $builder17->get()->getresult();

      $random = rand(100000, 999999);
      $rands = [
          'random' =>$random,
          'terms' => $sess,
          'tbl' =>$this->request->getvar('table'),
      ];

      session()->set($rands);
      $datam = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'Stockin',
      ];

      $dataso = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'Stockout'
      ];

      $dataf = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'faulty'
      ];


      $datafo = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'faultyout'
      ];

      $dataw = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'warrantyin'
      ];

      $datawo = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'warranty out'
      ];

      $datac = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'credit'
      ];

      $datad = [
          'random' => $random,
          'terms' => $sess,
          'time' => date("h:i:sa"),
          'tbl' => 'debit'
      ];
      if($this->request->getGet('find') && $this->request->getGet('model') && $this->request->getGet('search') ) {

          $m = $this->request->getVar('table');
          $j = $this->request->getVar('find');
          $i = $this->request->getVar('search');
          $model = $this->request->getVar('model');
          $builde = $db->table('verify');
          $builde->select('*');
          $builde->like('model', $model) &&
          $builde->like('type', $i) &&
          
          $builde->orLike('model', $model) && 
          $builde->like('type', $i) &&
          $builde->like('assetid', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('brand', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('conditions', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('modelid', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('gen', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('screen', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('price', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('customer', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('ram', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('odd', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('comment', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $i) &&
          $builde->like('type', $j);
          $dataa = $builde->get()->getresultArray();

          if($m == 'Stockin'){
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($datam);
              return redirect()->to(site_url('/verify'));
              }

          elseif($m == 'stockout'){
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warranty'){
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($dataw);
          }
          elseif($m == 'warrantyout'){
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($datawo);
          }
          elseif($m == 'credit'){
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($datac);
          }elseif($m == 'debit'){
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($datad);
          }elseif($m == 'faulty'){
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($dataf);
          }elseif($m == 'faultyout'){
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('type', $i) &&
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $i) &&
              $builde->like('type', $j); 
              $builde->update($datafo);
          }
          return redirect()->to(site_url('/adjustments'));

      }
      
      // start 
      elseif($this->request->getGet('find') && $this->request->getGet('model')){
          $m = $this->request->getVar('table');
          $j = $this->request->getVar('find');
          $model = $this->request->getVar('model');

          $builde = $db->table('verify');
          $builde->select('*');
          $builde->like('model', $model) &&
          $builde->like('cpu', $j);
          $builde->orLike('model', $model) && 
          $builde->like('assetid', $j);
          $builde->orLike('model', $model) &&
          $builde->like('brand', $j);
          $builde->orLike('model', $model) &&
          $builde->like('conditions', $j);
          $builde->orLike('model', $model) &&
          $builde->like('modelid', $j);
          $builde->orLike('model', $model) &&
          $builde->like('gen', $j);
          $builde->orLike('model', $model) &&
          $builde->like('screen', $j);
          $builde->orLike('model', $model) &&
          $builde->like('price', $j);
          $builde->orLike('model', $model) &&
          $builde->like('customer', $j);
          $builde->orLike('model', $model) &&
          $builde->like('ram', $j);
          $builde->orLike('model', $model) &&
          $builde->like('odd', $j);
          $builde->orLike('model', $model) &&
          $builde->like('comment', $j);
          $builde->orLike('model', $model) &&
          $builde->like('type', $j);
          $dataa = $builde->get()->getresultArray();

          if($m == 'Stockin'){
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122->like('model', $model) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $j); 
              $builde->update($datam);
              return redirect()->to(site_url('/adjustments'));
              }

          elseif($m == 'stockout'){
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122->like('model', $model) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              $builde->like('type', $j); 
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warranty'){
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122->like('model', $model) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($dataw);
          }
          elseif($m == 'warrantyout'){
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($datawo);
          }
          elseif($m == 'credit'){
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($datac);
          }elseif($m == 'debit'){
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($datad);
          }elseif($m == 'faulty'){
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($dataf);
          }elseif($m == 'faultyout'){
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('model', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('model', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('model', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('model', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($datafo);
          }
          return redirect()->to(site_url('/adjustments'));

      }
      // end
      elseif($this->request->getGet('model') && $this->request->getGet('search')){
          
          $m = $this->request->getVar('table');
          $i = $this->request->getVar('search');
          $model = $this->request->getVar('model');

          $builde = $db->table('verify');
          $builde->select('*');
          $builde->like('model', $model) &&
          $builde->like('type', $i);
          $dataa = $builde->get()->getresultArray();

          if($m == 'Stockin'){
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($datam);
              return redirect()->to(site_url('/adjustments'));
              }

          elseif($m == 'stockout'){
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warranty'){
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($dataw);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warrantyout'){
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
              $builde->update($datawo);
          }
          elseif($m == 'credit'){
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($datac);
              return redirect()->to(site_url('/adjustments'));
          }elseif($m == 'debit'){
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($datad);
              return redirect()->to(site_url('/adjustments'));
          }elseif($m == 'faulty'){
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($dataf);
              return redirect()->to(site_url('/adjustments'));
          }elseif($m == 'faultyout'){
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('model', $model) &&
              $builder122->like('type', $i);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $model) &&
              $builde->like('type', $i);
              $builde->update($datafo);
              return redirect()->to(site_url('/adjustments'));
          }
          return redirect()->to(site_url('/adjustments'));

      }
      elseif($this->request->getGet('find') && $this->request->getGet('search')){
          $m = $this->request->getVar('table');
          $j = $this->request->getVar('find');
          $model = $this->request->getVar('search');

          $builde = $db->table('verify');
          $builde->select('*');
          $builde->like('type', $model) &&
          $builde->like('cpu', $j);
          $builde->orLike('type', $model) && 
          $builde->like('assetid', $j);
          $builde->orLike('type', $model) &&
          $builde->like('brand', $j);
          $builde->orLike('type', $model) &&
          $builde->like('conditions', $j);
          $builde->orLike('type', $model) &&
          $builde->like('modelid', $j);
          $builde->orLike('type', $model) &&
          $builde->like('gen', $j);
          $builde->orLike('type', $model) &&
          $builde->like('screen', $j);
          $builde->orLike('type', $model) &&
          $builde->like('price', $j);
          $builde->orLike('type', $model) &&
          $builde->like('customer', $j);
          $builde->orLike('type', $model) &&
          $builde->like('ram', $j);
          $builde->orLike('type', $model) &&
          $builde->like('odd', $j);
          $builde->orLike('type', $model) &&
          $builde->like('comment', $j);
          $builde->orLike('type', $model) &&
          $builde->like('type', $j);
          $dataa = $builde->get()->getresultArray();

          if($m == 'Stockin'){
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122->like('type', $model) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              // echo '<pre>';
              // print_r($data);
              // exit;
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              $builde->like('type', $j); 
              $builde->update($datam);
              return redirect()->to(site_url('/adjustments'));
              }

          elseif($m == 'stockout'){
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122->like('type', $model) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              $builde->like('type', $j); 
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warranty'){
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122->like('type', $model) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($dataw);
          }
          elseif($m == 'warrantyout'){
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122->like('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($datawo);
          }
          elseif($m == 'credit'){
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122->like('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              $builde->like('type', $j); 
              $builde->update($datac);
          }elseif($m == 'debit'){
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($datad);
          }elseif($m == 'faulty'){
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122->like('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($dataf);
          }elseif($m == 'faultyout'){
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122->like('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('cpu', $j);
              $builder122->orLike('type', $model) && 
              $builder122->like('type', $i) &&
              $builder122->like('assetid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('brand', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('conditions', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('modelid', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('gen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('screen', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('price', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('customer', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('ram', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('odd', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('comment', $j);
              $builder122->orLike('type', $model) &&
              $builder122->like('type', $i) &&
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $model) &&
              
              $builde->like('cpu', $j);
              $builde->orLike('type', $model) && 
              
              $builde->like('assetid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('brand', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('conditions', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('modelid', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('gen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('screen', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('price', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('customer', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('ram', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('odd', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('comment', $j);
              $builde->orLike('type', $model) &&
              
              $builde->like('type', $j); 
              $builde->update($datafo);
          }
          return redirect()->to(site_url('/adjustments'));
      }
      elseif($this->request->getGet('find')){
          $m = $this->request->getVar('table');
          $j = $this->request->getVar('find');
          $builde = $db->table('verify');
          $builde->select('*');
          $builde->like('cpu', $j);
          $builde->orLike('assetid', $j);
          $builde->orLike('brand', $j);
          $builde->orLike('conditions', $j);
          $builde->orLike('modelid', $j);
          $builde->orLike('gen', $j);
          $builde->orLike('screen', $j);
          $builde->orLike('price', $j);
          $builde->orLike('customer', $j);
          $builde->orLike('ram', $j);
          $builde->orLike('odd', $j);
          $builde->orLike('comment', $j);
          
          $builde->orLike('type', $j);
          $dataa = $builde->get()->getresultArray();

          if($m == 'Stockin'){
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122->like('cpu', $j);
              $builder122->orLike('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('cpu', $j);
              $builde->orLike('assetid', $j);
              $builde->orLike('brand', $j);
              $builde->orLike('conditions', $j);
              $builde->orLike('modelid', $j);
              $builde->orLike('gen', $j);
              $builde->orLike('screen', $j);
              $builde->orLike('price', $j);
              $builde->orLike('customer', $j);
              $builde->orLike('ram', $j);
              $builde->orLike('odd', $j);
              $builde->orLike('comment', $j);
              $builde->orLike('type', $j); 
              $builde->update($datam);
              return redirect()->to(site_url('/adjustments'));
              }

          elseif($m == 'stockout'){
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122->like('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('cpu', $j);
              $builde->orLike('assetid', $j);
              $builde->orLike('brand', $j);
              $builde->orLike('conditions', $j);
              $builde->orLike('modelid', $j);
              $builde->orLike('gen', $j);
              $builde->orLike('screen', $j);
              $builde->orLike('price', $j);
              $builde->orLike('customer', $j);
              $builde->orLike('ram', $j);
              $builde->orLike('odd', $j);
              $builde->orLike('comment', $j);
              $builde->orLike('type', $j); 
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warranty'){
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122->like('cpu', $j);
              $builder122->orLike('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('cpu', $j);
              $builde->orLike('assetid', $j);
              $builde->orLike('brand', $j);
              $builde->orLike('conditions', $j);
              $builde->orLike('modelid', $j);
              $builde->orLike('gen', $j);
              $builde->orLike('screen', $j);
              $builde->orLike('price', $j);
              $builde->orLike('customer', $j);
              $builde->orLike('ram', $j);
              $builde->orLike('odd', $j);
              $builde->orLike('comment', $j);
              $builde->orLike('type', $j); 
              $builde->update($dataw);
          }
          elseif($m == 'warrantyout'){
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122->like('cpu', $j);
              $builder122->orLike('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->orLike('type', $model) &&
              
              $builde->orLike('cpu', $j);
               
              
              $builde->orLike('assetid', $j);
              
              
              $builde->orLike('brand', $j);
              
              
              $builde->orLike('conditions', $j);
              
              
              $builde->orLike('modelid', $j);
              
              
              $builde->orLike('gen', $j);
              
              
              $builde->orLike('screen', $j);
              
              
              $builde->orLike('price', $j);
              
              
              $builde->orLike('customer', $j);
              
              
              $builde->orLike('ram', $j);
              
              
              $builde->orLike('odd', $j);
              
              
              $builde->orLike('comment', $j);
              
              
              $builde->orLike('type', $j); 
              $builde->update($datawo);
          }
          elseif($m == 'credit'){
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122->like('cpu', $j);
              $builder122->orLike('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->orLike('type', $model) &&
              
              $builde->orLike('cpu', $j);
               
              
              $builde->orLike('assetid', $j);
              
              
              $builde->orLike('brand', $j);
              
              
              $builde->orLike('conditions', $j);
              
              
              $builde->orLike('modelid', $j);
              
              
              $builde->orLike('gen', $j);
              
              
              $builde->orLike('screen', $j);
              
              
              $builde->orLike('price', $j);
              
              
              $builde->orLike('customer', $j);
              
              
              $builde->orLike('ram', $j);
              
              
              $builde->orLike('odd', $j);
              
              
              $builde->orLike('comment', $j);
              
              
              $builde->orLike('type', $j); 
              $builde->update($datac);
          }elseif($m == 'debit'){
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('cpu', $j);
              $builder122->orLike('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->orLike('type', $model) &&
              $builde->orLike('cpu', $j);
              $builde->orLike('assetid', $j);
              $builde->orLike('brand', $j);
              $builde->orLike('conditions', $j);
              $builde->orLike('modelid', $j);
              $builde->orLike('gen', $j);
              $builde->orLike('screen', $j);
              $builde->orLike('price', $j);
              $builde->orLike('customer', $j);
              $builde->orLike('ram', $j);
              $builde->orLike('odd', $j);
              $builde->orLike('comment', $j);
              $builde->orLike('type', $j); 
              $builde->update($datad);
          }elseif($m == 'faulty'){
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122->like('cpu', $j);
              $builder122->orLike('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->orLike('type', $model) &&
              
              $builde->orLike('cpu', $j);
               
              
              $builde->orLike('assetid', $j);
              
              
              $builde->orLike('brand', $j);
              
              
              $builde->orLike('conditions', $j);
              
              
              $builde->orLike('modelid', $j);
              
              
              $builde->orLike('gen', $j);
              
              
              $builde->orLike('screen', $j);
              
              
              $builde->orLike('price', $j);
              
              
              $builde->orLike('customer', $j);
              
              
              $builde->orLike('ram', $j);
              
              
              $builde->orLike('odd', $j);
              
              
              $builde->orLike('comment', $j);
              
              
              $builde->orLike('type', $j); 
              $builde->update($dataf);
          }elseif($m == 'faultyout'){
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122->like('cpu', $j);
              $builder122->orLike('assetid', $j);
              $builder122->orLike('brand', $j);
              $builder122->orLike('conditions', $j);
              $builder122->orLike('modelid', $j);
              $builder122->orLike('gen', $j);
              $builder122->orLike('screen', $j);
              $builder122->orLike('price', $j);
              $builder122->orLike('customer', $j);
              $builder122->orLike('ram', $j);
              $builder122->orLike('odd', $j);
              $builder122->orLike('comment', $j);
              $builder122->orLike('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->orLike('type', $model) &&
              
              $builde->orLike('cpu', $j);
               
              
              $builde->orLike('assetid', $j);
              
              
              $builde->orLike('brand', $j);
              
              
              $builde->orLike('conditions', $j);
              
              
              $builde->orLike('modelid', $j);
              
              
              $builde->orLike('gen', $j);
              
              
              $builde->orLike('screen', $j);
              
              
              $builde->orLike('price', $j);
              
              
              $builde->orLike('customer', $j);
              
              
              $builde->orLike('ram', $j);
              
              
              $builde->orLike('odd', $j);
              
              
              $builde->orLike('comment', $j);
              
              
              $builde->orLike('type', $j); 
              $builde->update($datafo);
          }
          return redirect()->to(site_url('/adjustments'));
      }
      elseif($this->request->getGet('model')){
          $m = $this->request->getVar('table');
          $j = $this->request->getVar('model');
          $builde = $db->table('verify');
          $builde->select('*');
          $builde->like('model', $j);
          $dataa = $builde->get()->getresultArray();

          if($m == 'Stockin'){
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($datam);
              return redirect()->to(site_url('/adjustments'));
              }

          elseif($m == 'stockout'){
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warranty'){
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($dataw);
          }
          elseif($m == 'warrantyout'){
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($datawo);
          }
          elseif($m == 'credit'){
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($datac);
          }elseif($m == 'debit'){
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($datad);
          }elseif($m == 'faulty'){
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($dataf);
          }elseif($m == 'faultyout'){
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122->like('model', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('model', $j);
              $builde->update($datafo);
          }
          return redirect()->to(site_url('/adjustments'));

      }
      elseif($this->request->getGet('search')){
          $m = $this->request->getVar('table');
          $j = $this->request->getVar('search');
          $builde = $db->table('verify');
          $builde->select('*');
          $builde->like('model', $j);
          $dataa = $builde->get()->getresultArray();

          if($m == 'Stockin'){
              $builder122 = $db->table('masterlist');
              $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('masterlist.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($datam);
              return redirect()->to(site_url('/adjustments'));
              }

          elseif($m == 'stockout'){
              $builder122 = $db->table('stockout');
              $builder122->select('stockout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('stockout.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($dataso);
              return redirect()->to(site_url('/adjustments'));
          }
          elseif($m == 'warranty'){
              $builder122 = $db->table('warrantyin');
              $builder122->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyin.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($dataw);
          }
          elseif($m == 'warrantyout'){
              $builder122 = $db->table('warrantyout');
              $builder122->select('warrantyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('warrantyout.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($datawo);
          }
          elseif($m == 'credit'){
              $builder122 = $db->table('credit');
              $builder122->select('credit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('credit.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($datac);
          }elseif($m == 'debit'){
              $builder122 = $db->table('debit');
              $builder122->select('debit.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('debit.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($datad);
          }elseif($m == 'faulty'){
              $builder122 = $db->table('faulty');
              $builder122->select('faulty.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faulty.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($dataf);
          }elseif($m == 'faultyout'){
              $builder122 = $db->table('faultyout');
              $builder122->select('faultyout.*')->orderBy('daterecieved', 'DESC');
              $builder122->select('faultyout.*');
              $builder122->like('type', $j);
              $data = $builder122->get()->getResultArray();
              foreach($data as $d){
                  if(!$dataa){
                      $builde->insert($d);
                  }
                  }
              $builde = $db->table('verify');
              $builde->select('*');
              $builde->like('type', $j);
              $builde->update($datafo);
          }
          return redirect()->to(site_url('/adjustments'));

      }
      else{
          // return redirect()->back();

      }

      if($this->request->getVar('replace')){
          $x = $this->request->getVar('replace');
          $s = session()->get('random');
              
          $builder111 = $db->table('verify');
          $builder111->selectMax('id');
          $builder111->where('terms', $sess);
          $datas = $builder111->get()->getResultArray();
          foreach($datas as $ds):
              endforeach;

          $builde11 = $db->table('verify');
          $builde11->select('random');
          $builde11->where('terms', $sess);
          $builde11->where('id', $ds['id']);
          $dat11 = $builde11->get()->getResultArray();
          $s = $dat11[0]['random'];
          $column = $this->request->getVar('column');
          if($this->request->getVar('column') == 'Model'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('random' , $s);
              $builder->where('terms' , $sess);
              $builder->update(['model' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }      
          elseif($this->request->getVar('column') == 'Brand'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('random' , $s);
              $builder->where('terms' , $sess);
              $builder->update(['brand' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
           }      
          elseif($this->request->getVar('column') == 'Hdd'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['hdd' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          } 
          elseif($this->request->getVar('column') == 'Screen'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['screen' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          } 
          elseif($this->request->getVar('column') == 'Status'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['status' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          }     
          // Screen
          
          elseif($this->request->getVar('column') == 'Speed'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              
              $builder->update(['speed' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          } 
          elseif($this->request->getVar('column') == 'Cpu'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['cpu' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }      
          elseif($this->request->getVar('column') == 'Price'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['price' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }      
          elseif($this->request->getVar('column') == 'Ram'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['ram' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }      
          elseif($this->request->getVar('column') == 'Odd'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['odd' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }      
          elseif($this->request->getVar('column') == 'Problem'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['problem' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }      
          elseif($this->request->getVar('column') == 'Conditions'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['conditions' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }
          elseif($this->request->getVar('column') == 'Type'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['type' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');

          }
          elseif($this->request->getVar('column') == 'gen'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['gen' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          } 
          elseif($this->request->getVar('column') == 'Part'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['part' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          }
          elseif($this->request->getVar('column') == 'Modelid'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['modelid' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          }
          elseif($this->request->getVar('column') == 'Customer'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('random' , $s);
              $builder->update(['customer' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          }
          elseif($this->request->getVar('column') == 'Vendor'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['vendor' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          }
          elseif($this->request->getVar('column') == 'Screen'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['screen' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          }
          elseif($this->request->getVar('column') == 'Comment'){
              $builder = $db->table('verify');
              $builder->select('*');
              $builder->where('terms' , $sess);
              $builder->where('random' , $s);
              $builder->update(['comment' => $x]);
              return redirect()->back()->with('status', 'replaced successfully');
          }     
          else{
              return redirect()->back()->with('status', 'No result found!');
          }
          return redirect()->back()->with('status', 'replaced successfully');
       }

      helper(['form', 'url']);

      $builder = $db->table('verify');
      $builder->select('verify.*')->orderBy('time', 'DESC');
      $builder->where('terms' , $sess);
      $data['items'] = $builder->get()->getResultArray();
      $data['count_verif'] = count($data['items']);
      $data['user_data'] = $session->get('designation');

      $data['true'] = 0;
      return view('products/adjustments', $data);
  }

  // verification table
     public function sverify()
     {
         
         $db      = \Config\Database::connect();
         $session = \Config\Services::session();
         $sess = $session->get('user_name');
         // $seri alno = $this->request->getPost('serialno');
        //  if($this->request->getVar('serialno')){
             $data = [
                 'serialno' => $this->request->getVar('serialno'),
                 'random' => $this->request->getVar('random'),
                 'tbl' => $this->request->getVar('table'),
                 'session' => $sess,
             ];


            //  $builder = $db->table('barcodes');
            //  $builder->select('serialno');
            //  $builder->where('serialno' , $data['serialno']);
            //  $da = $builder->get()->getResultArray();
            //  if(!$da){
            //      $db->table('barcodes')->insert($data);
            //  }
            //  return redirect()->to(base_url('Settings/adjustments'));
        //  }
 
         $datam = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'tbl' => 'Stockin',
             'terms' => $sess,

         ];
 
         $dataso = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'Stockout'
         ];
 
         $dataf = [
             'random' => $this->request->getPost('random'),
             'terms' => $sess,
             'time' => date("h:i:sa"),
             'tbl' => 'faulty'
         ];
 
         $datafo = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'faultyout'
         ];
 
         $dataw = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'warrantyin'
         ];
 
         $datawo = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'warranty out'
         ];
 
         $datac = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'credit'
         ];
 
         $datad = [
             'random' => $this->request->getPost('random'),
             'time' => date("h:i:sa"),
             'terms' => $sess,
             'tbl' => 'debit'
         ];
 
         if($this->request->getVar('serialno')){
            // echo 'true';
            // exit;
            //  $bulders = $db->table('barcodes');
            //  $bulders->select('*');
            //  $databs = $bulders->get()->getResultArray();
            //  foreach($databs as $dbs):
            //  endforeach;
             $table = $this->request->getVar('table');
             $serialno = $this->request->getVar('serialno');
             $date = date("h:i:sa");
 
             $builder5 = $db->table("verify");
             $builder5->select('verify.*')->orderBy('time', 'DESC');
             $builder5->where('verify.assetid', $serialno);
             $data5 = $builder5->get()->getResultArray();
 
             if($table == 'Stockin'){
                     $builder1 = $db->table("masterlist");
                     $builder1->select('masterlist.*');
                     $builder1->where('masterlist.assetid', $serialno);
                     $data1 = $builder1->get()->getResultArray();
                     foreach($data1 as $r) {
                         if(!$data5){
                             $builder5->insert($r);
                         }
                             $builder51 = $db->table('verify');
                             $builder51->select('*');
                             $builder51->where('verify.assetid', $serialno);
                             $builder51->update($datam);
                         }
                //  $db->table('barcodes')->emptyTable();
                 return redirect()->to('Settings/adjustments');
             } 
             
             if($table == 'stockout'){
                $builder1 = $db->table("stockout");
                $builder1->select('stockout.*');
                $builder1->where('stockout.assetid', $serialno);
                $data1 = $builder1->get()->getResultArray();
                foreach($data1 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                        $builder51 = $db->table('verify');
                        $builder51->select('*');
                        $builder51->where('verify.assetid', $serialno);
                        $builder51->update($dataso);
                    }
                     return redirect()->to('Settings/adjustments');
                 }
 
                 if($table == 'warrantyin'){
                    $builder1 = $db->table("warrantyin");
                    $builder1->select('warrantyin.*');
                    $builder1->where('warrantyin.assetid', $serialno);
                    $data1 = $builder1->get()->getResultArray();
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                            $builder51 = $db->table('verify');
                            $builder51->select('*');
                            $builder51->where('verify.assetid', $serialno);
                            $builder51->update($dataw);
                        }
                    return redirect()->to('Settings/adjustments');
                 }
 
                 if($table == 'faulty'){
                    $builder1 = $db->table("faulty");
                    $builder1->select('faulty.*');
                    $builder1->where('faulty.assetid', $serialno);
                    $data1 = $builder1->get()->getResultArray();
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                            $builder51 = $db->table('verify');
                            $builder51->select('*');
                            $builder51->where('verify.assetid', $serialno);
                            $builder51->update($dataf);
                        }
                    return redirect()->to('Settings/adjustments');
                 }
 
                 if($table == 'faultyout'){
                    $builder1 = $db->table("faultyout");
                    $builder1->select('faultyout.*');
                    $builder1->where('faultyout.assetid', $serialno);
                    $data1 = $builder1->get()->getResultArray();
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                            $builder51 = $db->table('verify');
                            $builder51->select('*');
                            $builder51->where('verify.assetid', $serialno);
                            $builder51->update($datafo);
                        }
                    return redirect()->to('Settings/adjustments');
                 }
                 if($table == 'warrantyout'){
                    $builder1 = $db->table("warrantyout");
                    $builder1->select('warrantyout.*');
                    $builder1->where('warrantyout.assetid', $serialno);
                    $data1 = $builder1->get()->getResultArray();
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                            $builder51 = $db->table('verify');
                            $builder51->select('*');
                            $builder51->where('verify.assetid', $serialno);
                            $builder51->update($datawo);
                        }
                    return redirect()->to('Settings/adjustments');
                 }
                 if($table == 'credit'){
                    $builder1 = $db->table("credit");
                    $builder1->select('credit.*');
                    $builder1->where('credit.assetid', $serialno);
                    $data1 = $builder1->get()->getResultArray();
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                            $builder51 = $db->table('verify');
                            $builder51->select('*');
                            $builder51->where('verify.assetid', $serialno);
                            $builder51->update($datac);
                        }
                return redirect()->to('Settings/adjustments');
                 }
 
                 if($table == 'debit'){
                    $builder1 = $db->table("debit");
                    $builder1->select('debit.*');
                    $builder1->where('debit.assetid', $serialno);
                    $data1 = $builder1->get()->getResultArray();
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                            $builder51 = $db->table('verify');
                            $builder51->select('*');
                            $builder51->where('verify.assetid', $serialno);
                            $builder51->update($datad);
                        }
                    return redirect()->to('Settings/adjustments');
                 }
 
          if($table == 'All'){
                 $builder1 = $db->table("masterlist");
                 $builder1->select('masterlist.*');
                 $builder1->where('masterlist.assetid', $serialno);
                 $data1 = $builder1->get()->getResultArray();
 
                 $builder2 = $db->table("stockout");
                 $builder2->select('stockout.*');
                 $builder2->where('stockout.assetid', $serialno);
                 $data2 = $builder2->get()->getResultArray();
 
                 $builder3 = $db->table("warrantyin");
                 $builder3->select('warrantyin.*');
                 $builder3->where('warrantyin.assetid', $serialno);
                 $data3 = $builder3->get()->getResultArray();
 
                 $builder4 = $db->table("faulty");
                 $builder4->select('faulty.*');
                 $builder4->where('faulty.assetid', $serialno);
                 $data4 = $builder4->get()->getResultArray();
 
                 $builder6 = $db->table("faultyout");
                 $builder6->select('faultyout.*');
                 $builder6->where('faultyout.assetid', $serialno);
                 $data6 = $builder6->get()->getResultArray();
 
                 $builder7 = $db->table("warrantyout");
                 $builder7->select('warrantyout.*');
                 $builder7->where('warrantyout.assetid', $serialno);
                 $data7 = $builder7->get()->getResultArray();
 
                 $builder8 = $db->table("debit");
                 $builder8->select('debit.*');
                 $builder8->where('debit.assetid', $serialno);
                 $data8 = $builder8->get()->getResultArray();
 
                 $builder9 = $db->table("credit");
                 $builder9->select('credit.*');
                 $builder9->where('credit.assetid', $serialno);
                 $data9 = $builder9->get()->getResultArray();

                 
 
            //    checking masterlist
                if($data1){
                    foreach($data1 as $r) {
                        if(!$data5){
                            $builder5->insert($r);
                        }
                
                        $builder51 = $db->table('verify');
                        $builder51->select('*');
                        $builder51->where('verify.assetid', $serialno);
                        $builder51->update($datam);
                        // $builder5->update(['time'=> $date]);                            
                    }
                //  return redirect()->to('Settings/adjustments');
               } 
 
            // checking stockout
            elseif($data2){
                foreach($data2 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($dataso);
        
                }
                // return redirect()->to('Settings/adjustments');
            }
        
            // checking warrantyin
            elseif($data3){
                foreach($data3 as $r) {
            
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($dataw);
                    // $builder5->update(['time'=> $date]);                            
                }
                // return redirect()->to('Settings/adjustments');
            }
 
            // checking faulty in
            elseif($data4){
                foreach($data4 as $r) {
            
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($dataf);
                    // $builder5->update(['time'=> $date]);                            
                }
                //  return redirect()->to('Settings/adjustments');
            }        
         
            // checkin table  faultyout
            elseif($data6){
                foreach($data6 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datafo);
                    // $builder5->update(['time'=> $date]);                            
                }
                // return redirect()->to('Settings/adjustments');
            }
          
            // checking table warrantyout
            elseif($data7){
                foreach($data7 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datawo);
                    // $builder5->update(['time'=> $date]);                            
                }
                //  return redirect()->to('Settings/adjustments');
            }
 
            // checkin in debit 
            elseif($data8){
                foreach($data8 as $r) {
                    if(!$data5){
                        $builder5->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datad);
                    // $builder5->update(['time'=> $date]);                            
                }
                // return redirect()->to('Settings/adjustments');
            }
         
            elseif($data9){
                foreach($data9 as $r) {
            
                    if(!$data5){
                        $db->table('verify')->insert($r);
                    }
                    $builder51 = $db->table('verify');
                    $builder51->select('*');
                    $builder51->where('verify.assetid', $serialno);
                    $builder51->update($datac);
                    // $builder5->update(['time'=> $date]);                            
                }
                // return redirect()->to('Settings/adjustments');
            }

         else{
         return redirect()->to('Settings/adjustments'); 
         

         }
         return redirect()->to('Settings/adjustments'); 
        
         // }
       }
         $db->table('barcodes')->emptyTable();
         }
         $db->table('barcodes')->emptyTable();
         return redirect()->to('Settings/adjustments'); 
     }


     public function clears()
    {
        $db      = \Config\Database::connect();
        $sess = session()->get('user_name');
        $builder1 = $db->table("verify");
        $builder1->select("verify.*");
        $builder1->where('terms', $sess);
        $builder1->delete();
        return redirect()->back()->with('status', 'cleared');
    }

    public function delvs()
    {
      $db      = \Config\Database::connect();
      $datedelivered = $this->request->getVar('datedelivered');
      $sess = $session->get('user_name');
      $data = [
        'user_name' => $session->get('user_name'),
        'random' => $this->request->getVar('random'),
        'lname' => $this->request->getVar('lname'),
        'datedelivered' =>  date("Y/m/d"),
        $x = 'AA000',
        'delvnote' => 'AA000',
      ];
      $x = 'AA000';

      $increment = $db->table("product2");
      $increment->selectMax('product2.delvnote');
      $increment1 = $increment->get()->getResultArray();
      $inc = $increment1[0]['delvnote'];
      if($inc){
        $incc1 = $db->table("dcustomer");
        $incc1->select('delvnote');
        $incc1->where('vendor', $sess);
        $sss1 = $incc1->get()->getResultArray();
        $nn = $sss1[0]['delvnote'];
        if(!$nn){
          $x = $inc;
          for($i = 0; $i < 1; $i++) {
              $x++;
              $incc = $db->table("dcustomer");
              $incc->select('delvnote');
              $incc->where('vendor', $sess);
              $incc->update(['delvnote' => $x]);
          }
        }

      }
      else{
        $incc = $db->table("dcustomer");
        $incc->select('dcustomer.*');
        $incc->where('vendor', $sess);
        $incc->where('dcustomer.delvnote');
        $incc->update(['delvnote' => $data['delvnote']]);
      }
      // updating customer name in temporary table
      $builder44 = $db->table("dcustomer");
      $builder44->select('dcustomer.username');
      $builder44->where('vendor', $sess);
      $data44 = $builder44->get()->getResultArray();
      if($dat44){
        $dat44 = [
          'customer' => $data44[0]['username'],
          'datedelivered' => $session->get('datedelivered'),
          'random' => $this->request->getVar('random'),
        ];
        $dat45 = [
          'user_name' => $session->get('user_name'),
          'random' => $this->request->getVar('random'),

        ];
        $builder90 = $db->table("dcustomer");
        $builder90->select('dcustomer.*');
        $builder90->where('vendor', $sess);
        $builder90->update($dat45);

        $builder10000 = $db->table("tempinsert");
        $builder10000->select('tempinsert.*');
        $builder10000->where('terms', $sess);
        $data1000 = $builder10000->get()->getResultArray();
          if($data1000){
            $builder10000->update($dat44);
          }
          else{
            return redirect()->with('status', 'Kindly scan items and retry');
          }

      }else{
        return redirect()->with('status', 'Try again after providing customer details');
      }
      
      $builder899 = $db->table("tempinsert");
      $builder899->select('*');
      $builder899->where('terms', $sess);
      $data899 = $builder899->get()->getResultArray();

      foreach($data899 as $mast):
        $builder8991 = $db->table("stockout");
        $builder8991->select('*');
        $builder8991->where('assetid', $mast['assetid']);
        $data8991 = $builder8991->get()->getResultArray();
        if(!$data8991){
          $builder8991->insert($mast);
        }else{
          $builder8991->update($mast);
        }

        $builder8999 = $db->table("masterlist");
        $builder8999->select('');
        $builder8999->where('masterlist.assetid', $mast['assetid']);
        $builder8999->delete();
      endforeach;

      $builder4 = $db->table("dcustomer");
      $builder4->select('dcustomer.*');
      $builder4->where('vendor', $sess);
      $data4 = $builder4->get()->getResultArray();
      foreach($data4 as $c) { 
        $db->table('product')->insert($c);
      }

      $builder10 = $db->table('tempinsert');
      $builder10->select('tempinsert.*, dcustomer.*, sum(tempinsert.qty) as tqty ');
      $builder10->join('dcustomer', ' tempinsert.random = dcustomer.random', "left");
      $builder10->where('tempinsert.random', $data['random']);
      $builder10->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
      $data5['items'] = $builder10->get()->getResult();

      $builder1001 = $db->table("tempinsert");
      $builder1001->select('tempinsert.*');
      $builder1001->where('terms', $sess);
      $builder1001->delete();

      $builder404 = $db->table("dcustomer");
      $builder404->select('dcustomer.*');
      $builder404->where('vendor', $sess);
      $builder404->delete();
      return View('/products/deliverypdf', $data5);
    }

}




  