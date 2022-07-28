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
            $db      = \Config\Database::connect();
            $builder = $db->table('verify');   
            $builder->select('verify.*');
            
          $users = $builder->get()->getResult();
       
          //   $users = $query->getResult();
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

    public function importusers()
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

                        $stock[] = array(
                          'username' => $filedata[0],
                          'phone' => $filedata[1],
                          'fname' => $filedata[2],
                          'id_no' => $filedata[3],
                        );
                    }
                    $index++;
                }

                  $db      = \Config\Database::connect();
                  $builder = $db->table('customer');
                  $builder->insertBatch($stock);
                  $session = session();
                   $session->setFlashdata("success", "Data saved successfully");

                return redirect()->to(base_url('Warranty/wload'));
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
                      $assetid1 = 'ST'.$rand; 
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
                          'customer' => $this->request->getVar('customer'),
                        );
                    }
                    $index++;
                }

                echo '<pre>';
                print_r($stock);
                exit;

                    
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

        // return redirect()->to(base_url('ProductsCrud/load'))->with('status', $nums.' '. ' Item(s) inserted successfully');
            }
            return redirect()->to(base_url('ProductsCrud/load'))->with('status', $nums.' '. ' Item(s) inserted successfully');

        }
      // } catch (\Exception $e) {
      //   return redirect()->back()->with('status', 'Kindly check your csv format');
      // }
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
      // echo'<pre>';
      // print_r($date);
      // exit;
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
 $data['Rlaptop'] = $builder->get()->getResult();
 return view('/warranty/nlcd', $data);
    
 } elseif(!$this->request->getGet('q')) {
  $data['user_data'] = $session->get('designation');
  $data['Rlaptop'] = $builder->get()->getResult();
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
     $data['Rlaptop'] = $builder->get()->getResult();
     return view('/warranty/rlcd', $data);
        
     } elseif(!$this->request->getGet('q')) {
      $data['user_data'] = $session->get('designation');
      $data['Rlaptop'] = $builder->get()->getResult();
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
      $builder->where('warrantyin.type="smartphones"' );
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
}




  