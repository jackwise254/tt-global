<?php 
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\ProductM;
use App\Models\VendorModel;
use App\Models\InsertModel;
use App\Models\TempModel;
use CodeIgniter\Controller;
use App\Libraries\Zend;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Config\Events;
use App\Libraries\fpdf;
use App\Models\WarrantyModel;

class ProductsCrud extends Controller
{
    
    public function index(){
        helper(['form', 'url']);
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->orderBy('id', 'DESC')->findAll();
        return view('products/products', $data);

    }

    // Collect the queries so something can be done with them later.
        public static function collecting( )
        {
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();
        $data['user_data'] = $session->get('designation');
        

        $db      = \Config\Database::connect();
        $builder = $db->table('type');
        $builder->select('type.type');
        $data['templist'] = $builder->get()->getResultArray();

        $builder1 = $db->table('masterlist');
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.type AND masterlist.conditions');
        $data['masterlist'] = $builder1->get()->getResultArray();
        foreach($data as $d){
            $num = $builder1->countAll();

        }
        echo $num;
        exit;
        // print_r();

        $db      = \Config\Database::connect();
        $builder = $db->table('condition');
        $builder->select('condition.conditions');
        $data['condition'] = $builder->get()->getResultArray();

        return view('products/testcards', $data);
        

       

        
        // exit;

        // // $data2 = array_unique($data['templist']);

        // echo'<pre>';
        // print_r(array_unique($data));
        // exit;
        


        // $cart = array();
        // $cart2 = array();
        // $cart4 = array();
        // foreach($data['templist'] as $p){
        //     $m = $p->type;
        //     $cart[] = $m; 
        // }

        // $data2['single'] = array_unique($cart);
        // foreach($data2['single'] as $s){
        // $singles = $s;
        // $cart2 = 0;

        // $builder = $db->table('masterlisttest');
        // $builder->select('masterlisttest.type');
        // $data3 = $builder->get()->getResult();
        // // $cart4['num'] = $builder->countAll();

        
        // $cart2 = $data3;
        // $array = json_decode(json_encode($cart2[0]), true);
        // $cat[] = $array;


        // $cart4['all'] = $cat;

        
       
        // }
        // if($cart4 != []){
        //     $cart4['user_data'] = $session->get('designation');

        //     return view('products/testcards', $cart4);
        // }else{
        //     $cart4['all'] = $cart;

        // $cart4['user_data'] = $session->get('designation');

           
        //     return view('products/testcards', $cart4);
        // }
        }



    public function reports()
    {
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();


        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        return view('products/report' ,$data );
    }

    public function actions()
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
        
        $builder1 = $db->table('session');
        $builder1->select('session.*')->orderBy('time', 'DESC');
        // $data['masterlist'] = $builder1->get()->getResult();

        
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('session.*')->orderBy('time', 'DESC');
        $builder1->like('fname', $q);
        $builder1->orLike('lname', $q);
        $builder1->orLike('designation', $q);
        $builder1->orLike('time', $q);
        $builder1->orLike('action', $q);

        $data['masterlist'] = $builder1->get()->getResult();
        
       return view('products/actions', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['masterlist'] = $builder1->get()->getResult();

            helper(['url', 'form']);
            return view('products/actions', $data);
        
        }
    }


    public function inventoryView(){
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $data['user_data'] = $session->get('designation');

        $random = rand(10000, 99999);
        $true = $this->request->getGet('true');
        $builder1121 = $db->table('masterlist');
        $builder1121->select('masterlist.*');
        $nums = $builder1121->countAll();
        $data['true'] = 0;

        // finding duplicate
        $builder11211 = $db->table('masterlist');
        $builder11211->selectCount('assetid');
        $builder11211->groupBy(['assetid']);
        $datas = $builder11211->get()->getResultArray();
        foreach($datas as $ds):
         if($ds['assetid'] > 1){
            $data['count'] = $ds['assetid'];
            
         }
         else{
            $data['count'] = 0;
         }
         
        endforeach;

        // printing duplicates
        if($this->request->getVar('duplicate')){

        $builder1121111 = $db->table('masterlist');
        $builder1121111->select('assetid, COUNT(assetid) as status ');
        $builder1121111->groupBy(['assetid']);
        $builder1121111->HAVING('COUNT(status) > 1 ');
        $arrays1 = $builder1121111->get()->getResultArray();
        foreach($arrays1 as $arr){
           $builder = $db->table('masterlist');
           $builder->select('*');
           $builder->where('assetid', $arr['assetid']);
           $data['masterlist'] = $builder->get()->getResultArray();

        }

        
        foreach($data as $d):
        endforeach;
        $data['num'] = count($d);
        // counting duplicates
        foreach($datas as $ds):
            if($ds['assetid'] > 1){
               $data['count'] = $ds['assetid'];
            }
            else{
               $data['count'] = 0;
            }
           endforeach;
           return view('products/inventory', $data);

        }
        // end 

        $model = $this->request->getVar('model');
        $q=$this->request->getGet('q');
        $builder111 = $db->table('masterlist');
        $builder111->select('masterlist.*')->orderBy('daterecieved', 'DESC');
        
        if($this->request->getGet('q') && $this->request->getGet('model') ) {
           $builder122 = $db->table('masterlist');
           $builder122->select('masterlist.*')->orderBy('daterecieved', 'DESC');
           $builder122->select('masterlist.*');
           $builder122->like('model', $model) &&
           $builder122->like('cpu', $q);
           $builder122->orLike('model', $model) && 
           $builder122->like('assetid', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('brand', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('conditions', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('modelid', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('gen', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('screen', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('price', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('customer', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('ram', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('odd', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('comment', $q);
           $builder122->orLike('model', $model) &&
           $builder122->like('type', $q);
           $data['masterlist'] = $builder122->get()->getResultArray();
           $rand = [
            'random' => $random,
           ];
           session()->set($rand);

           foreach($data as $d):
           endforeach;
           if($d){
           $builder12222 = $db->table('masterlist');
           $builder12222->select('masterlist.*');
           $builder12222->like('model', $model) &&
           $builder12222->like('cpu', $q);
           $builder12222->orLike('model', $model) && 
           $builder12222->like('assetid', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('brand', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('conditions', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('modelid', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('gen', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('screen', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('price', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('customer', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('ram', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('odd', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('comment', $q);
           $builder12222->orLike('model', $model) &&
           $builder12222->like('type', $q);
           $builder12222->update(['random' => $random]);
           }
            $data['num'] = count($d);
            if($data['num'] <= $nums){$data['true'] = 1; }else{
                $data['true'] = 0;
            }
          
            // counting duplicates
            foreach($datas as $ds):
                if($ds['assetid'] > 1){
                   $data['count'] = $ds['assetid'];
                }
                else{
                   $data['count'] = 0;
                }
               endforeach;
            //  end  

            
            return view('products/inventory', $data);
        }
        // start of spreadsheet
        if($true){
        $rands = session()->get('random');
        $build = $db->table('masterlist');
        $build->select('masterlist.*');
        $build->where('random', $rands);
        $users = $build->get()->getResult();
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
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/".$fileName);
        $filename = "upload/".'stock'.$idd.".xlsx";
        return redirect()->to(base_url($filename));
        }
    // end
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1 = $db->table('masterlist');
        $builder1->select('masterlist.*')->orderBy('daterecieved', 'DESC');
        $builder1->select('masterlist.*');
        $builder1->like('assetid', '%'.$q.'%');
        $builder1->orLike('brand', '%'.$q.'%');
        $builder1->orLike('conditions', '%'.$q.'%');
        $builder1->orLike('random', '%'.$q.'%');
        $builder1->orLike('modelid', '%'.$q.'%');
        $builder1->orLike('gen', '%'.$q.'%');
        $builder1->orLike('cpu', '%'.$q.'%');
        $builder1->orLike('screen', '%'.$q.'%');
        $builder1->orLike('price', '%'.$q.'%');
        $builder1->orLike('customer', '%'.$q.'%');
        $builder1->orLike('ram', '%'.$q.'%');
        $builder1->orLike('odd', '%'.$q.'%');
        $builder1->orLike('comment', '%'.$q.'%');
        $builder1->orLike('type', '%'.$q.'%');
        $data['masterlist'] = $builder1->get()->getResultArray();
        $data['count'] = $builder11211->get()->getResultArray();

        $rand = [
            'random' => $random,
           ];
           session()->set($rand);

           foreach($data as $d):
           endforeach;
           if($d){
        $builder12222 = $db->table('masterlist');
        $builder12222->select('masterlist.*');
        $builder12222->like('assetid', '%'.$q.'%');
        $builder12222->orLike('brand', '%'.$q.'%');
        $builder12222->orLike('conditions', '%'.$q.'%');
        $builder12222->orLike('modelid', '%'.$q.'%');
        $builder12222->orLike('gen', '%'.$q.'%');
        $builder12222->orLike('cpu', '%'.$q.'%');
        $builder12222->orLike('screen', '%'.$q.'%');
        $builder12222->orLike('price', '%'.$q.'%');
        $builder12222->orLike('customer', '%'.$q.'%');
        $builder12222->orLike('ram', '%'.$q.'%');
        $builder12222->orLike('odd', '%'.$q.'%');
        $builder12222->orLike('comment', '%'.$q.'%');
        $builder12222->orLike('type', '%'.$q.'%');
        $builder12222->update(['random' => $random]);
           }
        $data['num'] = count($d);
        if($data['num'] <= $nums){$data['true'] = 1; }else{
            $data['true'] = 0;
        }
        // counting duplicates
        foreach($datas as $ds):
            if($ds['assetid'] > 1){
               $data['count'] = $ds['assetid'];
            }
            else{
               $data['count'] = 0;
            }
           endforeach;
        //  end  

        return view('products/inventory', $data);
           
        }
         if($model) {
        $r = $this->request->getGet('model');
        $builder111->select('masterlist.*');
        $builder111->like('model', $r);
        $data['masterlist'] = $builder111->get()->getResultArray();
        $rand = [
        'random' => $random,
        ];
        session()->set($rand);

        foreach($data as $d):
        endforeach;
        if($d){
        $builder12222 = $db->table('masterlist');
        $builder12222->select('masterlist.*');
        $builder12222->like('model', $model);
        $builder12222->update(['random' => $random]);
               }
        $data['num'] = count($d);
        if($data['num'] <= $nums){$data['true'] = 1; }else{
            $data['true'] = 0;
        }
        // $data['count'] = $builder11211->get()->getResultArray();
        foreach($datas as $ds):
            if($ds['assetid'] > 1){
               $data['count'] = $ds['assetid'];
            }
            else{
               $data['count'] = 0;
            }
           endforeach;
        //  end  

            return view('products/inventory', $data);
        
        }
        if(!$this->request->getGet('q')){
        $builder1 = $db->table('masterlist');
        $builder1->select('masterlist.*')->orderBy('daterecieved', 'DESC');
        $data['masterlist'] = $builder1->get()->getResultArray();

        foreach($data as $d):
        endforeach;
        $data['num'] = count($d);
        // counting duplicates
        foreach($datas as $ds):
            if($ds['assetid'] > 1){
               $data['count'] = $ds['assetid'];
            }
            else{
               $data['count'] = 0;
            }
           endforeach;
        //  end  
        return view('products/inventory', $data);

        }
        
      
        

    }


    public function invoiceCreate(){
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        helper(['form', 'url']);
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->orderBy('id', 'DESC')->findAll();
        return view('products/invoiceCreate', $data);
    }


    public function invoice_add()
    {
        
            $productModel = new ProductM();
            $insert_data = array(
            'type' => $this->input->post('type'),
            'price' => $this->input->post('price'),
            'ram' => $this->input->post('ram'),
            'conditions' => $this->input->post('conditions'),
            'gen' => $this->input->post('gen'),
            'speed' => $this->input->post('speed'),
            'customer' => $this->input->post('customer'),
            'qty' => 1
            );
            $this->productModel->insert($insert_data);
            return redirect()->to(base_url('products/invoicelist'));
    }
    
    
    public function Setting()
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

        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        return view('/products/Setting',$cart4);

    }
    
    public function Settings()
    {
        
        
        return redirect()->to(base_url('SigninController/home'))->with('status', 'Column updated succesfully');

    }

    public function input()
    {
        return view('products/input');
    }
    public function create(){

        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        
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







        
        return view('/products/add_products', $cart4);
    }

    public function stock()
    {   
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $db      = \Config\Database::connect();
        $builder12 = $db->table('condition');
        $builder12->select('condition.*');
        $data['condition'] = $builder12->get()->getResult();

        $builder2 = $db->table('brand');
        $builder2->select('brand.*');
        $data['brand'] = $builder2->get()->getResult();

        $builder3 = $db->table('type');
        $builder3->select('type.*');
        $data['type'] = $builder3->get()->getResult();

     
        return view('products/stock' ,$data );
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

        $db      = \Config\Database::connect();
        $builder1 = $db->table('stockout');
        $builder1->select('stockout.*');
        $cart4['all'] = $builder1->get()->getResult();
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

        $cart4['user_data'] = $session->get('designation');

        $cart4['all'] = $builder1->get()->getResult();
        
            return view('products/stock_out', $cart4);
           

        } elseif(!$this->request->getGet('q')) {
            $cart4['user_data'] = $session->get('designation');

            $cart4['all'] = $builder1->get()->getResult();

            helper(['url', 'form']);

            $db      = \Config\Database::connect();
            $builder12 = $db->table('condition');
            $builder12->select('condition.*');
            $cart4['condition'] = $builder12->get()->getResult();

            $builder2 = $db->table('brand');
            $builder2->select('brand.*');
            $cart4['brand'] = $builder2->get()->getResult();

            $builder3 = $db->table('type');
            $builder3->select('type.*');
            $cart4['type'] = $builder3->get()->getResult();

            return view('products/stock_out', $cart4);
        }
        
    }


    public function faultyout()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');

        $db      = \Config\Database::connect();
        $builder12 = $db->table('condition');
        $builder12->select('condition.*');
        $cart4['condition'] = $builder12->get()->getResult();

        $builder2 = $db->table('brand');
        $builder2->select('brand.*');
        $cart4['brand'] = $builder2->get()->getResult();

        $builder3 = $db->table('type');
        $builder3->select('type.*');
        $cart4['type'] = $builder3->get()->getResult();

       return view('products/faultyout', $cart4);
    }

    public function invoice()
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
        $builder = $db->table('invoicecreate');
        $builder->select('invoicecreate.*');
        $data['invoicecreate'] = $builder->get()->getResult();

        // $productModel = new ProductModel();

        // $data['masterlist'] = $productModel->orderBy('id', 'ASC')->findAll();

        return view('products/invoice', $data);
    }
    public function warranty()
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
        $builder12 = $db->table('condition');
        $builder12->select('condition.*');
        $data['condition'] = $builder12->get()->getResult();

        $builder2 = $db->table('brand');
        $builder2->select('brand.*');
        $data['brand'] = $builder2->get()->getResult();

        $builder3 = $db->table('type');
        $builder3->select('type.*');
        $data['type'] = $builder3->get()->getResult();

        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $productModele = new ProductModel();
        $data['masterlist'] = $productModele->orderBy('id', 'DESC')->findAll();
        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('masterlist.type');
        return view('products/warranty', $data);

    }
    public function display()
    {
        $builder = $db->table('masterlist');
        $builder->select('masterlist.*');
        $builder->where('masterlist.type');
        $data3 = $builder->get()->getResult();
        
    }
    public function verifyCreate()
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
         $builder = $db->table('vproduct');
         $builder->select('vproduct.*');

         if($this->request->getMethod()=='post'){
            $builder = $db->table('vproduct');
            $builder->save($_POST);
      }

      $builder = $db->table('vproduct');
         $builder->select('vproduct.*')->orderBy('date','DESC');
        $data['invoicecreate'] = $builder->get()->getResult();
        return view('products/verifyCreate', $data);
    }
    
    public function SpreCreate()
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
         $builder = $db->table('export');
         $builder->select('export.*');

         if($this->request->getMethod()=='post'){
            $builder = $db->table('export');
            $builder->save($_POST);
      }

      $builder = $db->table('export');
         $builder->select('export.*');
         $data['user_data'] = $session->get('designation');

        $data['invoicecreate'] = $builder->get()->getResult();
        return view('products/spreadsheet', $data);
    }
    
    public function faultycreate()
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
         $builder1 = $db->table('faultyc');
         $builder1->select('faultyc.*')->orderBy("faultyn", "DESC");
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('faultyc.*');
        $builder1->like('fname', $q);
        $builder1->orLike('lname', $q);
        $builder1->orLike('faultyn', $q);
        $builder1->orLike('faulty', $q);
        $builder1->orLike('location', $q);
        $builder1->orLike('ref', $q);
        $builder1->orLike('date', $q);
        $builder1->orLike('document', $q);

        $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/faultyCreate', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder1->get()->getResult();
            return view('products/faultyCreate', $data);
        
        }
    }

    public function debitcreate()
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

        if(session()->get('designation') == 'manager'){
            $builder = $db->table('vendor');
            $builder->select('*, DATEDIFF(now(), date) as vendor');
            $builder->HAVING('vendor < 1');
            $data['invoicecreate'] = $builder->get()->getResult();
            return view('products/debitCreate', $data);
        }

        $db      = \Config\Database::connect();
        $builder1 = $db->table('vendor');
        $builder1->select('vendor.*')->orderBy('time', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('vendor.*');
        $builder1->like('fname', $q);
        $builder1->orLike('lname', $q);
        $builder1->orLike('id_no', $q);
        $builder1->orLike('phone', $q);
        $builder1->orLike('location', $q);
        $builder1->orLike('ref', $q);
        $builder1->orLike('date', $q);
        $builder1->orLike('document', $q);

        $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/debitCreate', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder1->get()->getResult();
            return view('products/debitCreate', $data);
        
        }

    }
    public function jobCreate()
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
        $builder = $db->table('jobcard');
        $builder->select('jobcard.*')->orderBy("date", "DESC");
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('jobcard.*');
        $builder1->like('date', $q);
        $builder1->orlike('customer', $q);
        $builder1->orLike('document', $q);

        $data['invoicecreate'] = $builder->get()->getResult();
        return view('products/jobCreate', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder->get()->getResult();
        return view('products/jobCreate', $data);
        
        }
        
    }

    public function deliveryCreate()
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

        // if(session()->get('designation') == 'manager'){

        // $builder = $db->table('product2');
        // $builder->select('date, DATEDIFF(now(), date) as vendor');
        // $builder->HAVING('vendor = 0 ');
        // $dats = $builder->get()->getResultArray();

        // $builder = $db->table('product2');
        // $builder->select('*');
        // $builder->where('date , DATEDIFF(now, date) ');
        // $dats = $builder->get()->getResultArray();

        // $builder13 = $db->table('product2');
        // $builder13->select('date, DATEDIFF(now(), date) as vendor');
        // $builder13->HAVING('vendor >= 1 ');
        // $dats13 = $builder13->get()->getResultArray();
        // if($dats){
        //     $datss = [
        //         'datsss' => 1,
        //     ];
        // }
        //  elseif($dats13){
        //     $datss = [
        //         'datsss' => 0,
        //     ];
        //  }
        //  else{
        //     $datss = [
        //         'datsss' => 0,
        //     ]; 
        //  }   
        // session()->set($datss);

        // }
    
        // return view('products/deliveryCreate', $data);
        // }
        $db      = \Config\Database::connect();
        $builder = $db->table('product2');
        $builder->select('product2.*')->orderBy("delvnote", "DESC");
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('product2.*');
        $builder1->like('username', $q);
        $builder1->orLike('delvnote', $q);
        $builder1->orLike('user_name', $q);
        $builder1->orLike('ref', $q);
        $builder1->orLike('date', $q);
        $builder1->orLike('document', $q);

        $data['invoicecreate'] = $builder->get()->getResult();
        return view('products/deliveryCreate', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder->get()->getResult();
        return view('products/deliveryCreate', $data);
        
        }

        
    }
    public function warrantyIn()
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
        $productModule = new WarrantyModel();
        $data['masterlist'] = $productModule->orderBy('id', 'DESC')->findAll();

        return view('products/warranty_in', $data);
    }
    public function deliver()
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
        $productModel = new InsertModel();
         $data['masterlist'] = $productModel->orderBy('id', 'DESC')->findAll();
        return view('products/deliver', $data);
    }
    //calling warranty form


    public function delvstore(){
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        helper('html');
        $del = rand(10000000, 99999999);
        $db      = \Config\Database::connect();
        $builder = $db->table('tmdelivery');
        $qty = $this->request->getVar('qty');
        $price = $this->request->getVar('unitprice');


        $total = $qty * $price;
            $data = [
            'description' => $this->request->getVar('description'),
            'unitprice' => $this->request->getVar('unitprice'),
             'unitprice'=> $price,
             'qty'=> $qty,
             'total'=> $total,

            'del' => $del,
        ];
    

            $builder->insert($data);

        
        
        
        return redirect()->to(base_url('ProductsCrud/manual'));
    }

    public function invstore()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        helper('html');
        $del = rand(10000000, 99999999);
        $db      = \Config\Database::connect();
        $builder = $db->table('tinvoicecreate');
        $qty = $this->request->getVar('qty');
        $price = $this->request->getVar('unitprice');


        $total = $qty * $price;
            $data = [
            'description' => $this->request->getVar('description'),
            'unitprice' => $this->request->getVar('unitprice'),
            'type' => $this->request->getVar('type'),
             'unitprice'=> $price,
             'qty'=> $qty,
             'total'=> $total,
            'del' => $del,
        ];
    

            $builder->insert($data);

        
        
        
        return redirect()->to(base_url('ProductsCrud/storeie'));
    }

    

    public function editinvoice($id)
    {
        $db      = \Config\Database::connect();
        $clear = $db->table("tinvoicecreate");
        $clear->select('tinvoicecreate.*');
        $clear->emptyTable();


        $builder = $db->table('tinvoicecreate1');
        $builder->select('tinvoicecreate1.*');
        $builder->where('tinvoicecreate1.random', $id);
        $data3 = $builder->get()->getResultArray();
        
        // echo '<pre>';
        // print_r($data3);
        // exit;

        $builder33 = $db->table("tinvoicecreate");
        $builder33->select('tinvoicecreate.*');
        $builder33->where('tinvoicecreate.random', $id);
        $data1 = $builder33->get()->getResultArray();

        foreach($data3 as $r) {
            if(!$data1){
            $db->table('tinvoicecreate')->insert($r);
            }

            // $builder3 = $db->table("tinvoicecreate");
            // $builder3->select('tinvoicecreate.*');
            // $builder3->where('tinvoicecreate.random', $id);
            // $builder3->delete();
            // $db->table('tinvoicecreate')->insert($r);
        }
        $delete = $db->table('tinvoicecreate1');
        $delete->select('tinvoicecreate1.*');
        $delete->where('tinvoicecreate1.random', $id);
        $delete->delete();

        $builder10 = $db->table('customerinv');
        $builder10->select('customerinv.*');
        $builder10->where('customerinv.random', $id);
        $data10 = $builder10->get()->getResultArray();

        $builder11 = $db->table("customerin");
        $builder11->select('customerin.*');
        $data11 = $builder11->get()->getResultArray();
       
        foreach($data10 as $c) {
            if(!$data1){
            $db->table('customerin')->insert($c);
            }
            else{
            $db->table('customerin')->update($c);
            }
        }
        $delete1 = $db->table('customerinv');
        $delete1->select('customerinv.*');
        $delete1->where('customerinv.random', $id);
        $delete1->delete();

        $delete1 = $db->table('invoicecreate');
        $delete1->select('invoicecreate.*');
        $delete1->where('invoicecreate.ref', $id);
        $delete1->delete();

        return redirect()->to(base_url('ProductsCrud/storeie'));
    }

    // insert data
    public function store() {
        helper('html');
        $del = rand(10000000, 99999999);
        $db      = \Config\Database::connect();
        $builder = $db->table('templist');
        require ('../vendor/autoload.php');
        $qty = $this->request->getVar('qty');
            $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'del' => $del,
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'brand' => $this->request->getVar('brand'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'model' => $this->request->getVar('model'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'datedelivered' => $this->request->getVar('datedelivered'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),
            'vendor' => $this->request->getVar('customer'),
            'total' => $qty,

        ];
        $assid = 0;

        $builder1 = $db->table('masterlist');
        $builder1->selectMax('id');
        $data1 = $builder1->get()->getResultArray();
        foreach($data1 as $d1):
         endforeach;
            if($d1['id']){
                $assid = 'ST'.$d1['id'] + 1;
                for ($i=0; $i <$qty; $i++) { 
                    $assid ++ ; 
                    $data['assetid'] = $assid;
                    $builder->insert($data);
                }
            }
            else{
                for ($i=0; $i <$qty; $i++) { 
                    $assid = 'ST'.rand(1000000, 9999999);
                    $data['assetid'] = $assid;
                    $builder->insert($data);
                  }
                }
        return redirect()->to(base_url('ProductsCrud/load'))->with('status', $qty.' '.'Items Inserted succesfully');
}
  
    public function load()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');

        $db      = \Config\Database::connect();
        $builder = $db->table('templist');
        $builder->select('templist.*');
        $data['templist'] = $builder->get()->getResult();

        $cart = array();
        $cart2 = array();
        $cart4 = array();
        foreach($data['templist'] as $p){
            $m = $p->del;
            $cart[] = $m; 
        }

        $data2['single'] = array_unique($cart);
        foreach($data2['single'] as $s){
        $singles = $s;
        $cart2 = 0;

        $builder = $db->table('templist');
        $builder->select('templist.*');
        $builder->where('templist.del', $singles);
        $data3 = $builder->get()->getResult();
        $cart2 = $data3;

        $array = json_decode(json_encode($cart2[0]), true);
        $cat[] = $array;
        $cart4['all'] = $cat;
        }
        if($cart4 != []){
        $cart4['user_data'] = $session->get('designation');

         $db      = \Config\Database::connect();
        $builder = $db->table('vendors');
        $builder->select('vendors.*');
        $cart4['customer'] = $builder->get()->getResult();



            return view('products/uploadCsv', $cart4);
        }else{
            $cart4['all'] = $cart;
        $cart4['user_data'] = $session->get('designation');

            $db      = \Config\Database::connect();
        $builder = $db->table('vendors');
        $builder->select('vendors.*');
        $cart4['customer'] = $builder->get()->getResult();
            return view('products/uploadCsv', $cart4);
        }
        
    }


    public function previousRCVDw()
    {
        

        $db      = \Config\Database::connect();
        $builder = $db->table('warrantyin');
        $builder->select('warrantyin.*')->orderBy('daterecieved', 'DESC');
        $data['templist'] = $builder->get()->getResult();

        $cart = array();
        $cart2 = array();
        $cart4 = array();

        foreach($data['templist'] as $p){
            $m = $p->del;
            $cart[] = $m; 
        }

        $data2['single'] = array_unique($cart);
        
        foreach($data2['single'] as $s){
        $singles = $s;
        $cart2 = 0;

        $builder = $db->table('warrantyin');
        $builder->select('warrantyin.*');
        $builder->where('warrantyin.del', $singles);
        $data3 = $builder->get()->getResult();
        $cart2 = $data3;

        $array = json_decode(json_encode($cart2[0]), true);
        $cat[] = $array;
        $cart4['all'] = $cat;
        }
        if($cart4 != []){
            $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        return view('products/previousw', $cart4);
    }else{
        $cart4['all'] = $cart;
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        return view('products/previousw', $cart4);
    }

    }

    public function previousRCVDf()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');


        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('faulty.*')->orderBy('daterecieved', 'DESC');
        $data['templist'] = $builder->get()->getResult();

        $cart = array();
        $cart2 = array();
        $cart4 = array();


        foreach($data['templist'] as $p){
            $m = $p->del;
            $cart[] = $m; 
        }

        $data2['single'] = array_unique($cart);
        
        foreach($data2['single'] as $s){
        $singles = $s;
        $cart2 = 0;

        $builder = $db->table('faulty');
        $builder->select('faulty.*');
        $builder->where('faulty.del', $singles);
        $data3 = $builder->get()->getResult();
        $cart2 = $data3;

        $array = json_decode(json_encode($cart2[0]), true);
        $cat[] = $array;
        $cart4['all'] = $cat;
        }
        if($cart4 != []){

        //  $cart4['all'] = $cart;

         $session = \Config\Services::session();

         $db      = \Config\Database::connect();
 
         $builder1 = $db->table('users');
         $builder1->select('users.*');
         $builder1->where('users.designation = "admin" ' );
         $sdata['hello'] = $builder1->get()->getResultArray();
         $session->set($sdata);
         $cart4['user_data'] = $session->get('designation');
        return view('products/previousf', $cart4);
    }else{

        $cart4['all'] = $cart;

        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        

        return view('products/previousf', $cart4);
    }
    }

    public function deljobc($l)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobcard');
        $builder->select('jobcard.*');
        $builder->where('jobcard.ref', $l);
        $builder->delete();
        return redirect()->back()->with('status', 'Job card deleted successfully');
    }


    public function previousRCVD(){
        // $tempModel = new TempModel();
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');

        $db      = \Config\Database::connect();
        $builder = $db->table('masterlist');
        $builder->select('masterlist.*')->orderBy('daterecieved', 'DESC');
        $data['templist'] = $builder->get()->getResult();

        $cart = array();
        $cart2 = array();
        $cart4 = array();


        foreach($data['templist'] as $p){
            $m = $p->del;
            $cart[] = $m; 
        }

        $data2['single'] = array_unique($cart);
        
        foreach($data2['single'] as $s){
        $singles = $s;
        $cart2 = 0;

        $builder = $db->table('masterlist');
        $builder->select('masterlist.*');
        $builder->where('masterlist.del', $singles);
        // $builder->groupBy(['gen']);
        $data3 = $builder->get()->getResult();
        $cart2 = $data3;

        $array = json_decode(json_encode($cart2[0]), true);
        $cat[] = $array;
        $cart4['all'] = $cat;
        }
        if($cart4 != []){
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $cart4['user_data'] = $session->get('designation');
        return view('products/previous', $cart4);
    }else{
        $cart4['all'] = $cart;
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        return view('products/previous', $cart4);
    }

    }

    //printing barcodes of each table
    //barcodes of warranty out table 
    public function printwbarcod($id)
    {
        date_default_timezone_set("Africa/Nairobi");
        $date = date("dm - ");
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');

        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("warrantyout");
        $builder->select('warrantyout.*');
        $builder->where('id', $id);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
         $examples = '<h5>Batch No:</h5>';
         $example = '<h3 >'.'<strong>'.$al['model'].'</strong>'.'</h3>';
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        
    
         $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'-'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> '.'</h5>'.'</div>'; ?>
         
       

        <form class="mb-5">
       
          <?php echo $example; ?>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          
          <?php //echo $examples; ?>
          
      </form>
   <?php endforeach; ?>
      <?php

    }
   //end of warranty out barcode.

   //warranty in barcode
   public function printwibarcod($id)
   {
    date_default_timezone_set("Africa/Nairobi");
    // $date = date("dm - ");
    require ('../vendor/autoload.php');
    $db = \Config\Database::connect();
    
    $builder = $db->table("warrantyin");
    $builder->select('warrantyin.*');
    $builder->where('id', $id);
    $data['items'] = $builder->get()->getResultArray();
    
    foreach($data as $l):
    endforeach;
    foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

     $examples = '<h5>Batch No:</h5>';
     $example = '<h3 >'.'<strong>'.$al['model'].'</strong>'.'</h3>';
    $barcode = new \Com\Tecnick\Barcode\Barcode();
    

     $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
     $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.'-'.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'-'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> '.'</h5>'.'</div>'; ?>
     
   

    <form class="mb-5">
   
      <?php echo $example; ?>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      
      <?php //echo $examples; ?>
      
  </form>
<?php endforeach; ?>
  <?php

}

public function printbarcodwo($id)
{
    date_default_timezone_set("Africa/Nairobi");
    require ('../vendor/autoload.php');
    $db = \Config\Database::connect();
    
    $builder = $db->table("warrantyout");
    $builder->select('warrantyout.*');
    $builder->where('assetid', $id);
    $data['items'] = $builder->get()->getResultArray();
    
    foreach($data as $l):
    endforeach;
    foreach($l as $al):
        $date = substr($al['datedelivered'],2,9);


        $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.'-'.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
        

    <form class="mb-5">
   
      <?php echo $example; ?>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      
      <?php //echo $examples; ?>
      
  </form>
<?php endforeach; ?>
  <?php
}



public function printbarcodwi($id)
{
    require ('../vendor/autoload.php');
    $db = \Config\Database::connect();
    
    $builder = $db->table("warrantyin");
    $builder->select('warrantyin.*');
    $builder->where('assetid', $id);
    $data['items'] = $builder->get()->getResultArray();
    
    foreach($data as $l):
    endforeach;
    foreach($l as $al):
        // $date = date("d/m/y");
        $date = substr($al['daterecieved'],2,9);
        $gen = substr($al['gen'],0,7);

        $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
        $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'<strong>'.$al['customer'].'</strong> <br/>'.'Batch #. <strong>'.$date.'-'.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'Problem: <strong>'.$al['problem'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
       
       <form >
         <?php echo $example; ?>
     </div>
         
     </form>

    <?php endforeach; ?>
    </br>

        <?php
}

    public function printbarcodf($id)
    {
        date_default_timezone_set("Africa/Nairobi");
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('assetid', $id);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

        $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
        
        <form class="mb-5">
       
          <?php echo $example; ?>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          
          <?php //echo $examples; ?>
          
      </form>
   <?php endforeach; ?>
      <?php
    }

    public function printbarcodfo($id)
    {
        date_default_timezone_set("Africa/Nairobi");
        // $date = date("my - ");
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("faultyout");
        $builder->select('faultyout.*');
        $builder->where('assetid', $id);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
        
        <form class="mb-5">
       
          <?php echo $example; ?>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          
          <?php //echo $examples; ?>
          
      </form>
   <?php endforeach; ?>
      <?php

    }
    
        public function printbarcodso($id)
        {
            date_default_timezone_set("Africa/Nairobi");
        // $date = date(" my- ");
            require ('../vendor/autoload.php');
            $db = \Config\Database::connect();
            
            $builder = $db->table("stockout");
            $builder->select('stockout.*');
            $builder->where('assetid', $id);
            $data['items'] = $builder->get()->getResultArray();
            
            foreach($data as $l):
            endforeach;
            foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

                $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
        
    
            <form class="mb-5">
           
              <?php echo $example; ?>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              
              <?php //echo $examples; ?>
              
          </form>
       <?php endforeach; ?>
          <?php
        }

        public function printbarcods($id)
        {
            date_default_timezone_set("Africa/Nairobi");
        // $date = date("my - ");
            require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $builder->where('assetid', $id);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
           
        <form class="mb-5">
       
          <?php echo $example; ?>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          
          <?php //echo $examples; ?>
          
      </form>
   <?php endforeach; ?>
      <?php
        }

        public function printbarcodce($id)
        {
            date_default_timezone_set("Africa/Nairobi");
        // $date = date("dm - ");
            require ('../vendor/autoload.php');
            $db = \Config\Database::connect();
            
            $builder = $db->table("credit");
            $builder->select('credit.*');
            $builder->where('assetid', $id);
            $data['items'] = $builder->get()->getResultArray();
            
            foreach($data as $l):
            endforeach;
            foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

                $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
                $barcode = new \Com\Tecnick\Barcode\Barcode();
                $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
                $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
               
           
    
            <form class="mb-5">
           
              <?php echo $example; ?>
              <br/>
              <br/>
              <br/>
              <br/>
              <br/>
              
              <?php //echo $examples; ?>
              
          </form>
       <?php endforeach; ?>
          <?php
        }

        public function printbarcodd($id)
        {
            date_default_timezone_set("Africa/Nairobi");
        // $date = date("dm - ");
            require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("debit");
        $builder->select('debit.*');
        $builder->where('assetid', $id);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
           
       

        <form class="mb-5">
       
          <?php echo $example; ?>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          
          <?php //echo $examples; ?>
          
      </form>
   <?php endforeach; ?>
      <?php
        }

    public function printbarcod($id)
    {
        date_default_timezone_set("Africa/Nairobi");
        // $date = date("my - ");
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("masterlist");
        $builder->select('masterlist.*');
        $builder->where('assetid', $id);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
           

        <form class="mb-5">
       
          <?php echo $example; ?>
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          
          <?php //echo $examples; ?>
          
      </form>
   <?php endforeach; ?>
      <?php

    }

    public function printbarcodepfi($l)
    {
        date_default_timezone_set("Africa/Nairobi");
        // $date = date("my - ");
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('del', $l);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
           
        <form >
          <?php echo $example; ?>
      </div>
          
      </form>

      </br></br>
   <?php endforeach; ?>

   </br></br></br></br>
   <?php
    
    }

    public function printbarcodef($l)
    {
        date_default_timezone_set("Africa/Nairobi");
        // $date = date("d/m/y - ");
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        $builder = $db->table("warrantyin");
        $builder->select('warrantyin.*');
        $builder->where('del', $l);
        $data['items'] = $builder->get()->getResultArray();
        
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);
            
            $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'<strong>'.$al['customer'].'</strong> <br/>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'Problem: <strong>'.$al['problem'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
           
           <form >
             <?php echo $example; ?>
         </div>
             
         </form>
    
        <?php endforeach; ?>
        </br>
    
            <?php
    }

    public function printbarcodver()
    {
        date_default_timezone_set("Africa/Nairobi");
        // $date = date("my - ");
        
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $data['items'] = $builder->get()->getResultArray();
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$date.$al['del'].'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
           
         <form >
          <?php echo $example; ?>
      </div>
          
      </form>

   <?php endforeach; ?>
</br>

      <?php

        // return view('products/barcodes');
    }


    public function printbarcode($l)
    {
        date_default_timezone_set("Africa/Nairobi");
        // $date = date("- my");
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        $builder = $db->table("masterlist");
        $builder->select('masterlist.*');
        $builder->where('del', $l);
        $data['items'] = $builder->get()->getResultArray();
        foreach($data as $l):
        endforeach;
        $num = 0;

        foreach($l as $al):
            // for($i)
        $date = substr($al['daterecieved'],2,9);

        $gen = substr($al['gen'],0,7);
         $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128',  $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$al['assetid'].'<br/> <hr>'.'Batch #. <strong>'.$al['del'].$date.'</strong>'. '<br/> '.' Processor: <strong>'.$al['cpu'].'</strong>'. '<br/> '.' Generation: <strong>'.$al['gen'].'</strong>'. '<br/> '.'Processor Speed: <strong>'.$al['speed'].'</strong>'.'<br/> '.'Memory: <strong>'.$al['ram'].'</strong>'.'<br/> '.'Hard Drive: <strong>'.$al['hdd'].'</strong>'.'<br/> '.'ODD: <strong>'.$al['odd'].'</strong>'.'<br/> '.'Screen Size: <strong>'.$al['screen'].'</strong>'.'<br/> '.'Comment: <strong>'.$al['comment'].'</strong> '.'<br/> <br/> '.'</h6>'.'</div>'; ?>
        <form >
          <?php echo $example; ?>
      </div>
          
      </form>
    <?php endforeach; ?>
        </br>
        <?php
        }

    public function printbarcode2wo($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("warrantyout");
        $builder->select('warrantyout.*');
        $builder->where('assetid', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

         $examples = '<h5>'.'<strong>'.$al['model'].'</strong>';
         $example = '<h5>';

        $barcode = new \Com\Tecnick\Barcode\Barcode();
         $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= '<strong>'.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
        
        <form >
          <?php echo $example; ?>     
          
      </div>
          
      </form>
   <?php endforeach; ?>
      <?php
    }


    public function printjobwi($l)
    {

        $random = rand(100000, 999999);
        $data =[
            'random' => $l,
        ];
        $db = \Config\Database::connect();

        // echo $l;
        // exit;

        $builder10 = $db->table("warrantyin");
        $builder10->select('*');
        $builder10->where('del', $l);
        $builder10->update(['random' =>  $l]);


        $builder100 = $db->table("warrantyin");
        $builder100->select('customer');
        $builder100->where('del', $l);
        $data100 = $builder100->get()->getResult();

        foreach($data100 as $d):
            $cus = $d->customer;
        endforeach;

        $builder1000 = $db->table("customer");
        $builder1000->select('customer.*');
        $builder1000->where('username', $cus);
        $data1000 = $builder1000->get()->getResultArray();

        foreach($data1000 as $r) { 
            $db->table('jobc')->insert($r);
        }

        $builder100000 = $db->table("jobc");
        $builder100000->select('*');
        $builder100000->where('username', $cus);
        $builder100000->update(['random' =>  $l]);
        
        $builder7 = $db->table('warrantyin');
        $builder7->select('warrantyin.*, jobc.*, sum(warrantyin.qty) as tqty');
        $builder7->join('jobc', ' warrantyin.random = jobc.random', "left");
        $builder7->where('warrantyin.random', $data['random']);
        // $builder7->groupBy(['conditions','type','gen', 'brand','model','cpu','ram', 'odd', 'screen','hdd', 'comment']);
        $data5['items'] = $builder7->get()->getResult();
        echo '<pre>';
        print_r($data5['items']);
        exit;

        $builder100000->emptyTable();

        return view('products/jobcardfpdf', $data5);
    }


    public function printbarcode2wi($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("warrantyin");
        $builder->select('warrantyin.*');
        $builder->where('del', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date  = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h5>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128', $al['del'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= '<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
            <form >
             <?php echo $example; ?>     
         </div>
         </form>
      <?php endforeach; ?>
         <?php
    }

    public function printbarcode2fo($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("faultyout");
        $builder->select('faultyout.*');
        $builder->where('assetid', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

         $examples = '<h3>'.'<strong>'.$al['model'].'</strong>'.'</h3>';
         $example = '<h5>';
        $barcode = new \Com\Tecnick\Barcode\Barcode();
         $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= '<strong>'.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
        

        <form >
          <?php echo $example; ?>     
          
      </div>
          
      </form>
   <?php endforeach; ?>
      <?php
    }

    public function printbarcode2f($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('assetid', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

        //  $examples = '<h3>'.'<strong>'.$al['model'].'</strong>'.'</h3>';
        //  $example = '<h5>';
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
        $barcode = new \Com\Tecnick\Barcode\Barcode();
        $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
        $example .= '<strong>'.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
       

        <form >
          <?php echo $example; ?>     
         
      </div>
          
      </form>
   <?php endforeach; ?>
      <?php
    }


    public function printbarcode2so($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("stockout");
        $builder->select('stockout.*');
        $builder->where('del', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

        //  $examples = '<h3>'.'<strong>'.$al['model'].'</strong>'.'</h3>';
        //  $example = '<h5>';
        // $barcode = new \Com\Tecnick\Barcode\Barcode();
         $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= '<strong>'.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
        

        <form >
          <?php echo $example; ?>     
      
      </div>
          
      </form>
   <?php endforeach; ?>
      <?php
        
    }

    public function printbarcode2pfi($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('del', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h5>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128', $al['del'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= '<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
            <form >
             <?php echo $example; ?>     
         </div>
         </form>
      <?php endforeach; ?>
         <?php
    }

    public function printbarcode2s($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $builder->where('assetid', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

            $example = '<h5>';
            $barcode = new \Com\Tecnick\Barcode\Barcode();
            $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
            $example .= '<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
            <form >
             <?php echo $example; ?>     
         </div>
         </form>
      <?php endforeach; ?>
         <?php
    }

    public function printbarcode2ce($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("credit");
        $builder->select('credit.*');
        $builder->where('assetid', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

         $examples = '<h3>'.'<strong>'.$al['model'].'</strong>'.'</h3>';
         $example = '<h5>';
         $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= '<strong>'.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
        
        <form >
          <?php echo $example; ?>     
          
      </div>
          
      </form>
   <?php endforeach; ?>
      <?php
    }

    public function printbarcode2ver()
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

         $examples = '<h3>'.'<strong>'.$al['model'].'</strong>'.'</h3>';
         $example = '<h5>';
         $example = '<h6>'.'<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'</br>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= '<strong>'.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
        

        <form >
          <?php echo $example; ?>     
          
         
      </div>
          
      </form>
   <?php endforeach; ?>
      <?php
        
    }


    public function printbarcode2($l)
    {
        require ('../vendor/autoload.php');
        $db = \Config\Database::connect();
        
        $builder = $db->table("masterlist");
        $builder->select('masterlist.*');
        $builder->where('del', $l);
        $data['items'] = $builder->get()->getResultArray();
        // $date = date('Y/m/d- ');
        foreach($data as $l):
        endforeach;
        foreach($l as $al):
        $date = substr($al['daterecieved'],2,9);

        //  $example = '<h5>'.'<strong>'.$al['model'].' - '.$al['brand'].'</strong>';
         $example = '<h5>';
         $barcode = new \Com\Tecnick\Barcode\Barcode();
         $bobj1 = $barcode->getBarcodeObj('C128', $al['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
         $example .= '<strong>'.$al['brand'].' - '.$al['model'].'</strong>'.'<br/>'.'<strong>'.$al['cpu'].'/'.$al['gen'].'</strong>'.'/'.'<strong>'.$al['speed'].'</strong>'.'/'.'<strong>'.$al['ram'].'</strong>'.'/'.'<strong>'.$al['hdd'].'</strong>'.'<br/>'.$bobj1->getSvgCode().'<br/>'.'A- '.$al['assetid'] .'</h5>'.'<br/>'; ?>
         <form >
          <?php echo $example; ?>     
      </div>
      </form>
   <?php endforeach; ?>
      <?php
        
    }

    public function sendtowarrantyin()
    {
        date_default_timezone_set("Africa/Nairobi");
        $date = date("Y/m/d");
        
        $db = \Config\Database::connect();
        
        $builder = $db->table("wtemplist");
        $builder->select('wtemplist.*');
        $data = $builder->get()->getResultArray();

        foreach($data as $r) { // loop over results
            $db->table('warrantyin')->insert($r);
        }

        $builder->where('del >=', 0);
        $builder->delete();


        $session = session();
       


        $data = [
         'designation' => $session->get('user_name'),
         'fname' => $session->get('fname'),
         'lname' => $session->get('lname'),
         'action' => 'Added new batch in warranty in'
        ];
 
         $db = \Config\Database::connect();
         $builder1 = $db->table("session");
         $builder1->select('session.*');
         $builder1->insert($data);

        return redirect()->to(base_url('Warranty/wload'))->with('status', 'Items stocked in successfully');

    }

    public function sendtofaulty()
    {
        date_default_timezone_set("Africa/Nairobi");
        $date = date("Y/m/d");
        
        $db = \Config\Database::connect();
        
        $builder = $db->table("tfaulty");
        $builder->select('tfaulty.*');
        $data = $builder->get()->getResultArray();

        foreach($data as $r) { 
        
            $db->table('faulty')->insert($r);
        }

        $builder->where('del >=', 0);
        $builder->delete();
        $session = session();

        $data = [
            'designation' => $session->get('user_name'),
            'fname' => $session->get('fname'),
            'lname' => $session->get('lname'),
            'action' => 'Added new batch in Faulty in'
           ];
    
            $db = \Config\Database::connect();
            $builder1 = $db->table("session");
            $builder1->select('session.*');
            $builder1->insert($data);
    
        return redirect()->to(site_url('/tload'))->with('status', 'Items pushed successfuly');
    }

    public function sssdelete($id)
    {
        date_default_timezone_set("Africa/Nairobi");
        $date = date("Y/m/d");
        
        $db = \Config\Database::connect();
        
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $builder->where('id', $id);
        $data = $builder->get()->getResultArray();

        // echo'<pre>';
        // print_r($data);

        foreach($data as $r) { // loop over results
            if(!$data){
                $db->table('faulty')->insert($r);
            }

           

        }
        // else{
        //     return redirect()->to(base_url('ProductsCrud/verify'))->with('status', 'Item already exists in masterlist');

        // }
        $builder->where('id', $id);
        
        $builder->delete();

        return redirect()->to(base_url('ProductsCrud/verify'))->with('status', 'Item pushed to faulty list');

    }

    public function ssdelete($id)
    {
        date_default_timezone_set("Africa/Nairobi");
        $date = date("Y/m/d");
        
        $db = \Config\Database::connect();
        
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $builder->where('id', $id);
        $data = $builder->get()->getResultArray();

        // echo'<pre>';
        // print_r($data);

        foreach($data as $r) { // loop over results
            if(!$data){
                $db->table('masterlist')->insert($r);
            }

           

        }
        // else{
        //     return redirect()->to(base_url('ProductsCrud/verify'))->with('status', 'Item already exists in masterlist');

        // }
        $builder->where('id', $id);
        
        $builder->delete();

        return redirect()->to(base_url('ProductsCrud/verify'))->with('status', 'Item pushed to masterlist ');

    }

    // sending everything to the masterlist 
    public function sendtomasterlist()
    {
        date_default_timezone_set("Africa/Nairobi");
        $date = date("Y/m/d");
        
        $db = \Config\Database::connect();

        $builder2 = $db->table('templist');
        $builder2->select('*');
        $num =  $builder2->countAll();
        if($num <= 0){
            return redirect()->back()->with('status', 'Cannot transfer null value');
        }


        $builder11 = $db->table("templist");
        $builder11->select('total');
        $builder11->where('del >=', 0);
        $data11 = $builder11->get()->getResultArray();
            foreach($data11 as $d11):
            endforeach;
            $total = $d11['total'];
        $builder = $db->table("templist");
        $builder->select('templist.*');
        $data = $builder->get()->getResultArray();

        foreach($data as $r) { // loop over results
            $db->table('masterlist')->insert($r);
        }

        $builder->where('del >=', 0);
        $builder->delete();

        $session = session();

        $data = [
            'designation' => $session->get('user_name'),
            'fname' => $session->get('fname'),
            'lname' => $session->get('lname'),
            'action' => 'Added new batch in master list'
           ];
    
            $db = \Config\Database::connect();
            $builder1 = $db->table("session");
            $builder1->select('session.*');
            $builder1->insert($data);
    
        return redirect()->to(base_url('ProductsCrud/load'))->with('status', $total.' '.'Items stocked in successfully');
    }
    public function deletetf($l)
    {
        $db = \Config\Database::connect();
        $recle11 = $db->table("tfaulty");
        $recle11->select('tfaulty.*');
        $recle11->where('tfaulty.del', $l);
        $recle111 = $recle11->get()->getResultArray();

        $db = \Config\Database::connect();
        $recle1 = $db->table("recycle");
        $recle1->select('recycle.*');
        $recle1->where('recycle.del', $l);
        $recle11 = $recle1->get()->getResultArray();

        foreach($recle111 as $r){

            if(!$recle11){
            $recle1->insert($r);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('del', $l);
                $builder11->update($r);
            }
        }

        $db = \Config\Database::connect();
        $builder = $db->table("tfaulty");
        $builder->select('tfaulty.*');
        $builder->where('tfaulty.del', $l);
        $builder->delete();

        
        return redirect()->to(base_url('Warranty/tload'))->with('status', 'Batch deleted succesfully');
    }

    public function deleteCSVw($l)
    {
        $db = \Config\Database::connect();
        $recle11 = $db->table("wtemplist");
        $recle11->select('wtemplist.*');
        $recle11->where('wtemplist.del', $l);
        $recle111 = $recle11->get()->getResultArray();

        $db = \Config\Database::connect();
        $recle1 = $db->table("recycle");
        $recle1->select('recycle.*');
        $recle1->where('recycle.del', $l);
        $recle11 = $recle1->get()->getResultArray();

        foreach($recle111 as $r){

            if(!$recle11){
            $recle1->insert($r);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('del', $l);
                $builder11->update($r);
            }
        }

        $db = \Config\Database::connect();
        $builder = $db->table("wtemplist");
        $builder->select('wtemplist.*');
        $builder->where('wtemplist.del', $l);
        $builder->delete();

        
        return redirect()->to(base_url('Warranty/wload'))->with('status', 'Batch deleted succesfully');
    }
    // deleting uploaded csv 
    public function deleteCSV($l)
    {
        $db = \Config\Database::connect();
        $recle11 = $db->table("templist");
        $recle11->select('templist.*');
        $recle11->where('templist.del', $l);
        $recle111 = $recle11->get()->getResultArray();

        $db = \Config\Database::connect();
        $recle1 = $db->table("recycle");
        $recle1->select('recycle.*');
        $recle1->where('recycle.del', $l);
        $recle11 = $recle1->get()->getResultArray();

        foreach($recle111 as $r){

            if(!$recle11){
            $recle1->insert($r);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('del', $l);
                $builder11->update($r);
            }
        }

        $db = \Config\Database::connect();
        $builder = $db->table("templist");
        $builder->select('templist.*');
        $builder->where('templist.del', $l);
        $builder->delete();

        
        return redirect()->to(base_url('ProductsCrud/load'))->with('status', 'Batch deleted succesfully');
    }

    public function deleteRCVDw($l)
    {
        $db = \Config\Database::connect();
        $recle11 = $db->table("warrantyin");
        $recle11->select('warrantyin.*');
        $recle11->where('warrantyin.del', $l);
        $recle111 = $recle11->get()->getResultArray();

        $db = \Config\Database::connect();
        $recle1 = $db->table("recycle");
        $recle1->select('recycle.del');
        $recle1->where('recycle.del', $l);
        $recle13 = $recle1->get()->getResultArray();

        foreach($recle111 as $r){

            if(!$recle13){
            $recle1->insert($r);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('del', $l);
                $builder11->update($r);
            }
        }
        $db = \Config\Database::connect();
        $builder = $db->table("warrantyin");
        $builder->select('warrantyin.*');
        $builder->where('warrantyin.del', $l);
        $builder->delete();

        $session = session();

       $data = [
        'designation' => $session->get('user_name'),
        'fname' => $session->get('fname'),
        'lname' => $session->get('lname'),
        'action' => 'Deleted a batch in warranty in'
       ];

        $db = \Config\Database::connect();
        $builder1 = $db->table("session");
        $builder1->select('session.*');
        $builder1->insert($data);

        return redirect()->to(base_url('ProductsCrud/previousRCVDw'))->with('status', 'Item deleted succesfully');
    }
    public function deleteRCVDf($l)
    {
        $db = \Config\Database::connect();
        $recle11 = $db->table("faulty");
        $recle11->select('faulty.*');
        $recle11->where('faulty.del', $l);
        $recle111 = $recle11->get()->getResultArray();

        $db = \Config\Database::connect();
        $recle1 = $db->table("recycle");
        $recle1->select('recycle.*');
        $recle1->where('recycle.del', $l);
        $recle13 = $recle1->get()->getResultArray();

        foreach($recle111 as $r){

            if(!$recle13){
            $recle1->insert($r);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('del', $l);
                $builder11->update($r);
            }
        }

        $db = \Config\Database::connect();
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('faulty.del', $l);
        $builder->delete();


        $session = session();

        $data = [
            'designation' => $session->get('user_name'),
            'fname' => $session->get('fname'),
            'lname' => $session->get('lname'),
            'action' => 'Deleted batch'.$l.'in faulty '
           ];
    
            $db = \Config\Database::connect();
            $builder1 = $db->table("session");
            $builder1->select('session.*');
            $builder1->insert($data);
            // return redirect()->back()->with('status', 'items deleted successfully');
        return redirect()->to(base_url('ProductsCrud/previousRCVDf'))->with('status', 'Item deleted succesfully');

    }

    public function deleteRCVD($l)
    {

        $db = \Config\Database::connect();
        $recle11 = $db->table("masterlist");
        $recle11->select('*');
        $recle11->where('masterlist.del', $l);
        $recle111 = $recle11->get()->getResultArray();

        $db = \Config\Database::connect();
        $recle1 = $db->table("recycle");
        $recle1->select('*');
        $recle1->where('recycle.del', $l);
        $recle13 = $recle1->get()->getResultArray();
        foreach($recle111 as $r){

            if(!$recle13){
            $recle1->insert($r);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('del', $l);
                $builder11->update($r);
            }
        }

                $db = \Config\Database::connect();
                $builder112 = $db->table("masterlist");
                $builder112->select('masterlist.*');
                $builder112->where('masterlist.del', $l);
                $builder112->delete();


        $session = session();

        $data = [
            'designation' => $session->get('user_name'),
            'fname' => $session->get('fname'),
            'lname' => $session->get('lname'),
            'action' => 'Deleted batch'.$l.'in masterlist'
           ];
    
            $db = \Config\Database::connect();
            $builder1 = $db->table("session");
            $builder1->select('session.*');
            $builder1->insert($data);
        
        return redirect()->to(base_url('ProductsCrud/previousRCVD'))->with('status', 'Item deleted succesfully');
    }


    public function multipleRCVDw($l)
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
        $builder->where('warrantyin.del' ,$l );
        $data['users_obj'] = $builder->get()->getResultArray();

        $db      = \Config\Database::connect();
        
        $builder1 = $db->table('condition');
        $builder1->select('condition.*');
        $data['condition'] = $builder1->get()->getResult();

        $builder2 = $db->table('brand');
        $builder2->select('brand.*');
        $data['brand'] = $builder2->get()->getResult();

        $builder3 = $db->table('type');
        $builder3->select('type.*');
        $data['type'] = $builder3->get()->getResult();

        $builder4 = $db->table('Gen');
        $builder4->select('Gen.*');
        $data['gen'] = $builder4->get()->getResult();

        $builder5 = $db->table('Cpu');
        $builder5->select('Cpu.*');
        $data['cpu'] = $builder5->get()->getResult();

        $builder6 = $db->table('Speed');
        $builder6->select('Speed.*');
        $data['speed'] = $builder6->get()->getResult();

        $builder7 = $db->table('Ram');
        $builder7->select('Ram.*');
        $data['ram'] = $builder7->get()->getResult();

        $builder8 = $db->table('Hdd');
        $builder8->select('Hdd.*');
        $data['hdd'] = $builder8->get()->getResult();

        $builder9 = $db->table('Screen');
        $builder9->select('Screen.*');
        $data['screen'] = $builder9->get()->getResult();

        $builder10 = $db->table('customer');
        $builder10->select('customer.*');
        $data['customer'] = $builder10->get()->getResult();

        return view('/products/edit_mproductwi', $data);
    }

    public function multipleRCVDf($id){
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);

        $db      = \Config\Database::connect();

        $builder = $db->table('faulty');
        $builder->select('faulty.*');
        $builder->where('faulty.del' ,$id );
        $data['users_obj'] = $builder->get()->getResultArray();

        

        $data['user_data'] = $session->get('designation');

        // echo '<pre>';
        // print_r($data['user_obj']);

        return view('/products/edit_mproductf', $data);

    }

    public function multipleRCVD($id){
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);

        $productModel = new ProductModel();
        $data['user_obj'] = $productModel->where('del', $id)->first();
        $data['user_data'] = $session->get('designation');

        return view('/products/edit_mproduct', $data);

    }
    public function editRCVD($del)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("masterlist");


        $l = $this->request->getVar('del');
        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'brand' => $this->request->getVar('brand'),
            'model' => $this->request->getVar('model'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),

            'status' => $this->request->getVar('status'),
            'customer' => $this->request->getVar('customer'),
        ];
      
        // $builder->select('masterlist.*');
        $builder->where('del', $del);
        $builder->update($data);
        return redirect()->to(base_url('ProductsCrud/previousRCVD'))->with('status', 'Data updated succesfully');
    }
    public function editRCVDwi($del)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("warrantyin");

        $l = $this->request->getVar('del');
        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'brand' => $this->request->getVar('brand'),
            'model' => $this->request->getVar('model'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),
            'status' => $this->request->getVar('status'),
            'customer' => $this->request->getVar('customer'),
            'total' => $this->request->getVar('total'),
        ];
        $builder->where('del', $del);
        $builder->update($data);
        return redirect()->to(base_url('ProductsCrud/previousRCVDw'))->with('status', 'Data updated succesfully');
    }

    public function editRCVDf($del)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("faulty");

        $l = $this->request->getVar('del');
        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'brand' => $this->request->getVar('brand'),
            'model' => $this->request->getVar('model'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),
            'status' => $this->request->getVar('status'),
            'vendor' => $this->request->getVar('vendor'),
        ];
        $builder->where('del', $del);
        $builder->update($data);
        return redirect()->to(base_url('ProductsCrud/previousRCVDf'))->with('status', 'Data updated succesfully');
    }

   
    public function verify(){
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
                return redirect()->to(site_url('/verify'));
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
            return redirect()->to(site_url('/verify'));

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
                return redirect()->to(site_url('/verify'));
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
            return redirect()->to(site_url('/verify'));

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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
            }
            return redirect()->to(site_url('/verify'));

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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
            return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
            return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
            return redirect()->to(site_url('/verify'));

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
                return redirect()->to(site_url('/verify'));
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
                return redirect()->to(site_url('/verify'));
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
            return redirect()->to(site_url('/verify'));

        }
        else{
            // return redirect()->back();

        }

        if($this->request->getVar('replace')){
            $x = $this->request->getVar('replace');
            $s = session()->get('random');
                
            $builder111 = $db->table('verify');
            $builder111->selectMax('id');
            $datas = $builder111->get()->getResultArray();
            foreach($datas as $ds):
                endforeach;

            $builde11 = $db->table('verify');
            $builde11->select('random');
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
        return view('products/verify', $data);
    }


    public function okf($id)
    {
        $status =  [ 'status' => 'irrepairable'];
        $db      = \Config\Database::connect();
        $builder1 = $db->table("faulty");
        // $builder1->select('warrantyin.assetid');
        $builder1->where('faulty.assetid', $id);
        $builder1->update(['status' =>  $status]);
        return redirect()->back()->with('status', 'changed to irrepairable');

    }

    public function clear()
    {
        $db      = \Config\Database::connect();
        $sess = session()->get('user_name');
        $builder1 = $db->table("verify");
        $builder1->select("verify.*");
        $builder1->where('terms', $sess);
        $builder1->delete();
        return redirect()->back()->with('status', 'cleared');

    }

    public function ok($id)
    {
        $status =  [ 'status' => 'irrepairable'];
        $db      = \Config\Database::connect();
        $builder1 = $db->table("warrantyin");
        $builder1->where('warrantyin.assetid', $id);
        $builder1->update(['status' =>  $status]);
        return redirect()->back()->with('status', 'changed to irrepairable');

    }
    public function fixedf($id)
    {
        $status =  [ 'status' => 'fixed'];
        $db      = \Config\Database::connect();
        $builder1 = $db->table("faulty");
        $builder1->where('faulty.assetid', $id);
        $builder1->update(['status' =>  $status]);
        return redirect()->back();
    }

    public function fixed($id)
    {
        $status =  [ 'status' => 'fixed'];
        $db      = \Config\Database::connect();
        $builder1 = $db->table("warrantyin");
        // $builder1->select('warrantyin.assetid');
        $builder1->where('warrantyin.assetid', $id);
        $builder1->update(['status' =>  $status]);
        return redirect()->back();
    }

    public function wipf($id)
    {
        $status =  [ 'status' => 'wip'];
        $db      = \Config\Database::connect();
        $builder1 = $db->table("faulty");
        // $builder1->select('warrantyin.assetid');
        $builder1->where('faulty.assetid', $id);
        $builder1->update(['status' =>  $status]);
        return redirect()->back();
    }

    public function wip($id)
    {
        $status =  [ 'status' => 'wip'];
        $db      = \Config\Database::connect();
        $builder1 = $db->table("warrantyin");
        // $builder1->select('warrantyin.assetid');
        $builder1->where('warrantyin.assetid', $id);
        $builder1->update(['status' =>  $status]);
        return redirect()->back();
    }

    public function smverify()
    {
        $session = \Config\Services::session();
        $data = [

            'memo' => $this->request->getVar('memo'),
            'session' =>$session->get('user_name'),

        ];
        $db      = \Config\Database::connect();
        $db->table('verified')->insert($data);

        return redirect()->to(site_url('/verify'));
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
            //  return redirect()->to(base_url('ProductsCrud/verify'));
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
                 return redirect()->to('ProductsCrud/verify');
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
                     return redirect()->to('ProductsCrud/verify');
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
                    return redirect()->to('ProductsCrud/verify');
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
                    return redirect()->to('ProductsCrud/verify');
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
                    return redirect()->to('ProductsCrud/verify');
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
                    return redirect()->to('ProductsCrud/verify');
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
                return redirect()->to('ProductsCrud/verify');
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
                    return redirect()->to('ProductsCrud/verify');
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
                //  return redirect()->to('ProductsCrud/verify');
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
                // return redirect()->to('ProductsCrud/verify');
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
                // return redirect()->to('ProductsCrud/verify');
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
                //  return redirect()->to('ProductsCrud/verify');
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
                // return redirect()->to('ProductsCrud/verify');
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
                //  return redirect()->to('ProductsCrud/verify');
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
                // return redirect()->to('ProductsCrud/verify');
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
                // return redirect()->to('ProductsCrud/verify');
            }

         else{
         return redirect()->to('ProductsCrud/verify'); 
         

         }
         return redirect()->to('ProductsCrud/verify'); 
        
         // }
       }
         $db->table('barcodes')->emptyTable();
         }
         $db->table('barcodes')->emptyTable();
         return redirect()->to('ProductsCrud/verify'); 
     }
    public function verifieds() {
    $db      = \Config\Database::connect();
    $session = \Config\Services::session();
    $sess = $session->get('user_name');
    $builder = $db->table("verify");
    $builder->select('verify.*');
    $data1 = $builder->get()->getResultArray();
    $builder1 = $db->table("verified");
    $builder1->select('verified.*');
    $builder1->where('session', $session);
    $data2['items'] = $builder1->get()->getResultArray();

    
    foreach($data1 as $r) { 
        $builder1 = $db->table("verified");
        $builder1->select('verified.*');
        $builder1->where('session', $sess);
        $builder1->update($r);
    }
    
    $data = [
            
        'random' => $this->request->getVar('random'),
    ];
    $builder3 = $db->table('verify');
    $builder3->select('verify.* sum(verify.qty) as tqty');
    $builder->groupBy(['conditions','type','gen', 'brand','model','cpu','ram', 'odd', 'screen','hdd', 'comment']);
    $data5['items'] = $builder3->get()->getResult();
    $num = $builder3->countAll();

    if($num < 1){
        return redirect()->back()->with('status', 'Kindly scan items to view details');
    }
    return View('/products/verifypdfs', $data5);

}
    public function verified() {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $data5['user_data'] = $session->get('designation');

        $data = [
            'memo' => $this->request->getVar('memo'),
            'random' => $this->request->getVar('random'),
            'session' => $session->get('user_name'),

        ];

        $asset = $db->table("verify");
        $asset->select('verify.assetid');
        $asset1 = $asset->get()->getResultArray();
        foreach($asset1 as $ass1){

        $builder45 = $db->table("verified");
        $builder45->select('verified.assetid');
        $builder45->where('assetid', $ass1 );
        $builder45->delete();
        }

        $builder = $db->table("verify");
        $builder->select('verify.*');
        $data1 = $builder->get()->getResultArray();
        $num223 = $builder->countAll();
        foreach($data1 as $r) { // loop over results
            $db->table('verified')->insert($r);
        }
        $builder1122 = $db->table("verified");
        $builder1122->select('verified.*');
        $builder1122->where('random', $data['random']);

        $builder1122->update(['session'=> $data['session']]);
        $builder1122->update(['memo' => $data['memo']]);


        $builder223 = $db->table('verified');
        $builder223->select('verified.* , sum(verified.qty) as tqty');
        $builder223->where('verified.random', $data['random']);
        $builder223->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
        $data5['items'] = $builder223->get()->getResult();
        
        
        if($num223 <= 0){
            return redirect()->back()->with('status', 'Kindly scan items to view summary');
        }
        else{
            return View('/products/verifypdf', $data5);

        }
    
    }


    
    public function deletecredit($id)
    {       
            $db = \Config\Database::connect();
            $builder2 = $db->table("credit");
            $builder2->select('credit.*');
            $builder2->where('credit.random', $id);
            $data1 = $builder2->get()->getResultArray();


            $builder = $db->table("ccredit");
            $builder->select('ccredit.*');
            $builder->where('ccredit.ref', $id);
            $data2 = $builder->get()->getResultArray();


            $builder3 = $db->table("warrantyin");
            $builder3->select('warrantyin.*');
            $builder3->where('warrantyin.random', $id);
            $data3 = $builder3->get()->getResultArray();

            $builder3 = $db->table("warrantyin");
            $builder3->where('warrantyin.random', $id);
            $builder3->delete();

            foreach($data1 as $r) { 
          
            if(!$data3){
                $db->table('warrantyin')->insert($r);
            }
            else{

                return redirect()->back()->with('status', 'we could not delete this item');

            }
            
            }
            $builder2 = $db->table("credit");
            $builder2->where('credit.random', $id);
            $builder2->delete();
            // $builder3->update($data);

            
            $builder = $db->table("ccredit");
            $builder->where('ccredit.ref', $id);
            $builder->delete();

            return redirect()->to(base_url('ProductsCrud/creditadd'))->with('status', 'credit note deleted succesfully');
    }

    //delete warranty note
    public function deletewarranty($id)
    {
            $db = \Config\Database::connect();
            $builder = $db->table("customer3");
            $builder->select('customer3.*');
            $builder->where('customer3.ref', $id);
            $data = $builder->get()->getResultArray();

            $builder1 = $db->table("warrantyin");
            $builder1->select('warrantyin.*');
            $builder1->where('warrantyin.random', $id);
            $data1 = $builder1->get()->getResultArray();

           
       
            $builder2 = $db->table("warrantyout");
            $builder2->select('warrantyout.*');
            $builder2->where('warrantyout.random', $id);
            $data2 = $builder2->get()->getResultArray();

            //  echo '<pre>';
            //  print_r($data1);
            //  print_r($data2);
            //  print_r($data);


            $builder1 = $db->table("warrantyin");
            $builder1->where('warrantyin.random', $id);
            $builder1->delete();

            foreach($data2 as $r) { 
          
            if(!$data1){
                $db->table('warrantyin')->insert($r);
            }
            
            }
            $builder2 = $db->table("warrantyout");
            $builder2->where('warrantyout.random', $id);
            $builder2->delete();


            
            $builder = $db->table("customer3");
            $builder->where('customer3.ref', $id);
            $builder->delete();
        return redirect()->to(base_url('ProductsCrud/warrantyadd'))->with('status', 'Warranty note deleted succesfully');

    }

    // return back deleted item to materlist
    public function sdelete($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("verify");
        // $builder->select('verify.*');
        $builder->where('verify.id', $id);
        

        $builder->delete();

        
        return redirect()->to('ProductsCrud/verify')->with('status', 'Item returned to masterlist');
    }

    //delete veirfied
    public function deleteD($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("vproduct");
        $builder->select('vproduct.*');
        $builder->where('vproduct.random', $id);
        $builder->delete();
        
        return redirect()->to(base_url('ProductsCrud/verifyCreate'))->with('status', 'Delivery note deleted succesfully');
    }
    public function faultyd($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("warrantyout");
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.random', $id);
        $data2 = $builder->get()->getResultArray();


        

        $builder1 = $db->table("faulty");
        $builder1->select('faulty.*');
        $builder1->where('faulty.random', $id);
        $data1 = $builder1->get()->getResultArray();


        foreach($data2 as $r) { // loop over results
          
            if(!$data1){
                // echo'<pre>';
                // print_r($r); 
                
                $db->table('faulty')->insert($r);
            }
           
            }
            $builder = $db->table("warrantyout");
            $builder->where('warrantyout.random', $id);
            $builder->delete();
            return redirect()->to(base_url('Warranty/warrantyout'))->with('status', 'Item pushed to faulty stock');


    }
    public function deletefaultynote($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("faultyout");
        $builder->select('faultyout.*');
        $builder->where('faultyout.random', $id);
        $data2 = $builder->get()->getResultArray();

        $data = [
            'datedelivered' => '',
            'customer' => '',
        ];

        $builder1 = $db->table("faulty");
        $builder1->select('faulty.*');
        $builder1->where('faulty.random', $id);
        $data1 = $builder1->get()->getResultArray();

        $builder3 = $db->table("faultyc");
        $builder3->select('faultyc.*');
        $builder3->where('faultyc.ref', $id);
        $data3 = $builder3->get()->getResultArray();

        $builder = $db->table("faulty");
        $builder->where('faulty.random', $id);
        $builder->delete();

        foreach($data2 as $r) {
          
            if(!$data1){

                $db->table('faulty')->insert($r);
                $builder111 = $db->table("faulty");
                $builder111->where('faulty.random', $id);
                $builder111->update($data);
            }
            
            }
            $builder = $db->table("faultyout");
            $builder->where('faultyout.random', $id);
            $builder->delete();
            $builder3->where('faultyc.ref', $id);
           $builder3->delete();

           return redirect()->back()->with('status', 'faulty note deleted successfully');
    }

    public function deleteDeliverynote($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("stockout");
        $builder->select('stockout.*');
        $builder->where('stockout.random', $id);
        $data2 = $builder->get()->getResultArray();

        $data =[

            'datedelivered' => '',
            'customer' => '',
        ];

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.random', $id);
        $data1 = $builder1->get()->getResultArray();

        $builder3 = $db->table("product2");
        $builder3->select('product2.*');
        $builder3->where('product2.ref', $id);
        $data3 = $builder3->get()->getResultArray();


            $builder = $db->table("masterlist");
            $builder->where('masterlist.random', $id);
            $builder->delete();

        foreach($data2 as $r) { // loop over results
          
            if(!$data1){

                
                $db->table('masterlist')->insert($r);
                $builder11 = $db->table("masterlist");
                $builder11->where('masterlist.random', $id);
                $builder11->update($data);
                
            }
            
            }
            $builder = $db->table("stockout");
            $builder->where('stockout.random', $id);
            $builder->delete();


            
    
            $builder3->where('product2.ref', $id);
           $builder3->delete();
        return redirect()->to(base_url('ProductsCrud/deliveryCreate'))->with('status', 'Delivery note deleted succesfully');
    }
    public function deletedebit($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("debit");
        $builder->select('debit.*');
        $builder->where('debit.random', $id);
        $builder->delete();
         
    }

    public function deleteDebitnote($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("debit");
        $builder->select('debit.*');
        $builder->where('debit.random', $id);
        $data2 = $builder->get()->getResultArray();

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.random', $id);
        $data1 = $builder1->get()->getResultArray();

        $builder3 = $db->table("vendor");
        $builder3->select('vendor.*');
        $builder3->where('vendor.ref', $id);
        $data3 = $builder3->get()->getResultArray();


        $builder = $db->table("masterlist");
            $builder->where('masterlist.random', $id);
            $builder->delete();

        foreach($data2 as $r) {           
            if(!$data1){

                
                $db->table('masterlist')->insert($r);
                
            }
           
            
            }
            $builder = $db->table("debit");
            $builder->where('debit.random', $id);
            $builder->delete();


            
    
            $builder3->where('vendor.ref', $id);
           $builder3->delete();
        return redirect()->back()->with('status', 'Debit note deleted succesfully');


        // echo'<pre>';
        // print_r($data2);
        // print_r($data3);

    }



    public function deleteSp($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("export");
        $builder->select('export.*');
        $builder->where('export.id', $id);
        $builder->delete();
        
        return redirect()->to(site_url('spreadsheet-create'));
    }


    public function regular() 
    {
    
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $tempModel = new TempModel();
        $data['masterlist'] = $tempModel->orderBy('id', 'DESC')->findAll();
        if($this->request->getGet('q')) {
            $q=$this->request->getGet('q');
            $data['masterlist'] = $tempModel->like('assetid', $q)->findAll();
            helper(['url', 'form']);
            // echo '<pre>';
            // print_r($data);
            return view('/user/techpanel', $data);
        } elseif(!$this->request->getGet('q')) {
            $data['masterlist'] = $tempModel->findAll();
            // $data['masterlist'] = $tempModel->like('name', $q)->findAll();

        //     helper(['url', 'form']);
        return view('/user/techpanel',$data );
        }
    }

    // displays the tech panel view 
    public function techview($id = null){
        $tempModel = new TempModel();
        $data['masterlist'] = $tempModel->where('id', $id)->first();
        return view('/user/techview', $data);
    }
    
    public function faultyouts()
    {
        $session = \Config\Services::session();
        $datedelivered = $this->request->getVar('datedelivered');
        $db      = \Config\Database::connect();

        $data =[
            $x = 'A000',
            'faultyn' => 'A000',
            ];
            $db      = \Config\Database::connect();
            $increment = $db->table("faultyc");
            $increment->selectMax('faultyc.faultyn');
            $increment1 = $increment->get()->getResultArray();
            $inc = $increment1[0]['faultyn'];
    
            if($x = $inc){
            $incc1 = $db->table("customerfo");
            $incc1->selectMax('customerfo.faultyn');
            $sss1 = $incc1->get()->getResultArray();
            $nn = $sss1[0]['faultyn'];
            if(!$nn){
                $x = $inc;
                for($i = 0; $i < 1; $i++) {
                    $x++;
                    $incs =[ $x, ];
            $incc = $db->table("customerfo");
            $incc->select('customerfo.*');
            $incc->where('customerfo.faultyn');
            $sss = $incc->get()->getResultArray();
            $incc->update(['faultyn' => $incs]);
        }
    }  
        }else{
         
            for($i = 0; $i < 1; $i++) {
            $x = $x++;
            $incc = $db->table("customerfo");
            $incc->select('customerfo.*');
            $incc->where('customerfo.faultyn');
            $incc->update(['faultyn' => $data['faultyn']]);
            $incc->update(['faultyn' => $data['faultyn']]);
            }
        }
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data5['user_data'] = $session->get('designation');
        
        $db      = \Config\Database::connect();
        $data = [
            'random' => $this->request->getVar('random'),
            'username' => $this->request->getVar('username'),
            'datedelivered' =>  date("Y/m/d"),
        ];
        $builder44 = $db->table("customerfo");
        $builder44->select('customerfo.username');
        $data44 = $builder44->get()->getResultArray();
        

        foreach($data44 as $dat44):
        $builder10000 = $db->table("tfaultyout");
        $builder10000->select('tfaultyout.*');
        $data1000 = $builder10000->get()->getResultArray();
        $builder10000->update(['customer' => $dat44]);
         endforeach;

        $db      = \Config\Database::connect();
        $builder999 = $db->table("tfaultyout");
        $builder999->select('tfaultyout.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder9999 = $db->table("customerfo");
        $builder9999->select('customerfo.assetid');
        $num9999 = $builder9999->countAll();
        if($num9999 < 1){
            return redirect()->back()->with('status', 'kindly fill the vendor details and retry');
        }
        $db      = \Config\Database::connect();
        $builder899 = $db->table("tfaultyout");
        $builder899->select('tfaultyout.assetid');
        $data899 = $builder899->get()->getResultArray();

        foreach($data899 as $mast):
        $db      = \Config\Database::connect();
        $builder8999 = $db->table("faulty");
        $builder8999->select('faulty.assetid');
        $builder8999->where('faulty.assetid', $mast);
        $builder8999->delete();
        endforeach;


         // updating datedelivered
         if(!$datedelivered){
            
            $builder100 = $db->table("tfaultyout");
            $builder100->select('tfaultyout.*');
            $data100 = $builder100->get()->getResultArray();
            $builder100->update(['random' => $data['random']]);
            $builder100->update(['datedelivered' => $data['datedelivered']]);
    
            }
            else{
            
                $builder100 = $db->table("tfaultyout");
                $builder100->select('tfaultyout.*');
                $data100 = $builder100->get()->getResultArray();
                $builder100->update(['random' => $data['random']]);
                $builder100->update(['datedelivered' => $datedelivered]);
            }

       

        $builder101 = $db->table("customerfo");
        $builder101->select('customerfo.*');
        $data101 = $builder101->get()->getResultArray();
        $builder101->update(['random' => $data['random']]);



        $builder = $db->table("tfaultyout");
        $builder->select('tfaultyout.*');
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("faultyout");
        $builder1->select('faultyout.*');
        $data2['items'] = $builder1->get()->getResultArray();

        

        $builder4 = $db->table("customerfo");
        $builder4->select('customerfo.*');
        $data4 = $builder4->get()->getResultArray();

        $builder3 = $db->table("tcustomerfo");
        $builder3->select('tcustomerfo.*');
        $data3 = $builder3->get()->getResultArray();
        
        foreach($data1 as $r) { 
            $db->table('faultyout')->insert($r);
        }
        
        foreach($data4 as $c) { 
            $db->table('tcustomerfo')->insert($c);
        }

        $builder7 = $db->table('tfaultyout');
        $builder7->select('tfaultyout.*, tcustomerfo.*, sum(tfaultyout.qty) as tqty');
        $builder7->join('tcustomerfo', ' tfaultyout.random = tcustomerfo.random', "left");
        $builder7->where('tfaultyout.random', $data['random']);
        $builder7->groupBy(['conditions','type','gen', 'brand','model','cpu','ram', 'odd', 'screen','hdd', 'comment']);
        $data5['items'] = $builder7->get()->getResult();
        $num = $builder7->countAll();

        if($num < 1){
            return redirect()->back()->with('status', 'kindly fill the fields and retry');
        }

                $builder->emptyTable();
                $builder4->emptyTable();

               return View('/products/faultyoutpdf', $data5);


    }

    public function editfaultyouts($id)
    {
        $db      = \Config\Database::connect();
        $clear = $db->table("tfaultyout");
        $clear->select('tfaultyout.*');
        $clear->emptyTable();

        $builder = $db->table('faultyout');
        $builder->select('faultyout.*');
        $builder->where('faultyout.random', $id);
        $data3 = $builder->get()->getResultArray();

        $builder33 = $db->table("tfaultyout");
        $builder33->select('tfaultyout.*');
        $data1 = $builder33->get()->getResultArray();
        foreach($data3 as $r) {
            if(!$data1){
            $db->table('tfaultyout')->insert($r);
            $db->table('faulty')->insert($r);
            }
            else{
            $db->table('tfaultyout')->update($r);
            $db->table('faulty')->update($r);

            }
        }
        $delete = $db->table('faultyout');
        $delete->select('faultyout.*');
        $delete->where('faultyout.random', $id);
        $delete->delete();

        $builder10 = $db->table('tcustomerfo');
        $builder10->select('tcustomerfo.*');
        $builder10->where('tcustomerfo.random', $id);
        $data10 = $builder10->get()->getResultArray();

        $builder11 = $db->table("customerfo");
        $builder11->select('customerfo.*');
        $data11 = $builder11->get()->getResultArray();
       
        foreach($data10 as $c) {
            if(!$data1){
            $db->table('customerfo')->insert($c);
            }
            else{
            $db->table('customerfo')->update($c);
            }
        }
        $delete1 = $db->table('tcustomerfo');
        $delete1->select('tcustomerfo.*');
        $delete1->where('tcustomerfo.random', $id);
        $delete1->delete();

        $delete1 = $db->table('faultyc');
        $delete1->select('faultyc.*');
        $delete1->where('faultyc.ref', $id);
        $delete1->delete();
        return redirect()->to(site_url('/fualty-note'));
    }

    public function faultyclear()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table("tfaultyout");
        $builder->select('tfaultyout.*');
        $data1 = $builder->get()->getResultArray();

        $builder4 = $db->table("customerfo");
        $builder4->select('customerfo.*');
        $data4 = $builder4->get()->getResultArray();

        $builder->emptyTable();
        $builder4->emptyTable();

        return redirect()->to(site_url('fualty-note'))->with('status', 'Cleared');
    }
    public function debitout()
    {
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();
        $datedelivered = $this->request->getVar('datedelivered');

        $data = [
            'user_name' => $session->get('user_name'),
            'random' => $this->request->getVar('random'),
            'lname' => $this->request->getVar('lname'),
            'datedelivered' =>  date("Y/m/d"),
            $x = 'AA000',
            'debitno' => 'AA000',
        ];

    $db      = \Config\Database::connect();
        $increment = $db->table("vendor");
        $increment->selectMax('vendor.debitno');
        $increment1 = $increment->get()->getResultArray();
        $inc = $increment1[0]['debitno'];

        if($x = $inc){
        $incc1 = $db->table("tvendors");
        $incc1->selectMax('tvendors.debitno');
        $sss1 = $incc1->get()->getResultArray();
        $nn = $sss1[0]['debitno'];
        if(!$nn){
            $x = $inc;
            for($i = 0; $i < 1; $i++) {
                $x++;
                $incs =[ $x, ];
        $incc = $db->table("tvendors");
        $incc->select('tvendors.*');
        $incc->where('tvendors.debitno');
        $sss = $incc->get()->getResultArray();
        $incc->update(['debitno' => $incs]);
    }
}  
    }else{
     
        for($i = 0; $i < 1; $i++) {
        $x = $x++;
        $incc = $db->table("tvendors");
        $incc->select('tvendors.*');
        $incc->where('tvendors.debitno');
        $incc->update(['debitno' => $data['debitno']]);
        $incc->update(['debitno' => $data['debitno']]);
        }
    }

        $builder44 = $db->table("tvendors");
        $builder44->select('tvendors.username');
        $data44 = $builder44->get()->getResultArray();

        foreach($data44 as $dat44):
        $builder10000 = $db->table("tdebit");
        $builder10000->select('tdebit.*');
        $data1000 = $builder10000->get()->getResultArray();
        $builder10000->update(['vendor' => $dat44]);
        endforeach;



        $db      = \Config\Database::connect();
        $builder999 = $db->table("tdebit");
        $builder999->select('tdebit.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder9999 = $db->table("tvendors");
        $builder9999->select('tvendors.assetid');
        $num9999 = $builder9999->countAll();
        if($num9999 < 1){
            return redirect()->back()->with('status', 'kindly fill the vendor details and retry');
        }


        $db      = \Config\Database::connect();
        $builder899 = $db->table("tdebit");
        $builder899->select('tdebit.assetid');
        $data899 = $builder899->get()->getResultArray();

        foreach($data899 as $mast):
        $db      = \Config\Database::connect();
        $builder8999 = $db->table("masterlist");
        $builder8999->select('masterlist.assetid');
        $builder8999->where('masterlist.assetid', $mast);
        $builder8999->delete();
        endforeach;


         // updating datedelivered
         if(!$datedelivered){
            
            $builder80 = $db->table("tdebit");
            $builder80->select('tdebit.*');
            $data80 = $builder80->get()->getResultArray();
            $builder80->update(['random' => $data['random']]);
            $builder80->update(['datedelivered' => $data['datedelivered']]);
    
            }
            else{
            
            $builder80 = $db->table("tdebit");
            $builder80->select('tdebit.*');
            $data80 = $builder80->get()->getResultArray();
            $builder80->update(['random' => $data['random']]);
            $builder80->update(['datedelivered' => $datedelivered]);
            }

        $builder81 = $db->table("tvendors");
        $builder81->select('tvendors.*');
        $data81 = $builder81->get()->getResultArray();
        $builder81->update(['random' => $data['random']]);
        $builder81->update(['user_name' => $data['user_name']]);



        $builder = $db->table("tdebit");
        $builder->select('tdebit.*');
        $data1 = $builder->get()->getResultArray();


        $builder1 = $db->table("debit");
        $builder1->select('debit.*');
        $data2 = $builder1->get()->getResult();

        foreach($data1 as $r) { 

            $db->table('debit')->insert($r);
        }
        
        $builder4 = $db->table("tvendors");
        $builder4->select('tvendors.*');
        $data4 = $builder4->get()->getResultArray();

        $builder3 = $db->table("tvendors1");
        $builder3->select('tvendors1.*');
        $data3 = $builder3->get()->getResultArray();

        foreach($data4 as $c) { 
            $db->table('tvendors1')->insert($c);
        }

        $builder7 = $db->table('tdebit');
        $builder7->select('tdebit.*, tvendors.*, sum(tdebit.qty) as tqty' );
        $builder7->join('tvendors', ' tdebit.random = tvendors.random', "left");
        $builder7->where('tvendors.random', $data['random']);
        $builder7->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
        $data5['items'] = $builder7->get()->getResult();
        $num = $builder->countAll();


        // echo'<pre>';

        if($num < 1){
            return redirect()->back()->with('status', 'kindly fill the fields and retry');
        }
        $builder7->emptyTable();
        $builder->emptyTable();
        $builder4->emptyTable();
        return View('/products/debitpdf', $data5);
    }

    public function debitdelete($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("tdebit");
        $builder->select('tdebit.*');
        $builder->where('assetid' , $id);
        $builder->delete();
        return redirect()->to(base_url('ProductsCrud/debitnote'))->with('status', 'item deleted');
    }

    public function debitclear()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table("tdebit");
        $builder->select('tdebit.*');
        $builder->emptyTable();
        $builder4 = $db->table("tvendors");
        $builder4->select('tvendors.*');
        $builder4->emptyTable();
        return redirect()->to('ProductsCrud/debitnote')->with('status' , 'cleared successfully');
    }

    public function editdebit($id)
    {
        

        $db      = \Config\Database::connect();
        $clear = $db->table("tdebit");
        $clear->select('tdebit.*');
        $clear->emptyTable();

        $builder = $db->table('debit');
        $builder->select('debit.*');
        $builder->where('debit.random', $id);
        $data3 = $builder->get()->getResultArray();

        $builder33 = $db->table("tdebit");
        $builder33->select('tdebit.*');
        $data1 = $builder33->get()->getResultArray();
        foreach($data3 as $r) {
            if(!$data1){
            $db->table('tdebit')->insert($r);
            $db->table('masterlist')->insert($r);
            }
            else{
            $db->table('tdebit')->update($r);
            $db->table('masterlist')->update($r);
            }
        }
        $delete = $db->table('debit');
        $delete->select('debit.*');
        $delete->where('debit.random', $id);
        $delete->delete();

        $builder10 = $db->table('tvendors1');
        $builder10->select('tvendors1.*');
        $builder10->where('tvendors1.random', $id);
        $data10 = $builder10->get()->getResultArray();

        $builder11 = $db->table("tvendors");
        $builder11->select('tvendors.*');
        $data11 = $builder11->get()->getResultArray();
       
        foreach($data10 as $c) {
            if(!$data11){
            $db->table('tvendors')->insert($c);
            }
            // else{
            // $db->table('tvendors')->update($c);
            // }
        }
        $delete1 = $db->table('tvendors1');
        $delete1->select('tvendors1.*');
        $delete1->where('tvendors1.random', $id);
        $delete1->delete();

        $delete1 = $db->table('vendor');
        $delete1->select('vendor.*');
        $delete1->where('vendor.ref', $id);
        $delete1->delete();
        return redirect()->to(base_url('/ProductsCrud/debitnote'));
    }
 
    public function delvout() {
        $session = \Config\Services::session();
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
        
            $qty1 = 0;
            $qty2 = 0;
            $qty3 = 0;
            $qty4 = 0;
            $qty5 = 0;
            $qty6 = 0;
            $desc1 = '';
            $desc2 = '';
            $desc3 = '';
            $desc4 = '';
            $desc5 = '';
            $desc6 = '';
            if($this->request->getVar('desc1')){$data5['desc1' ] =  $this->request->getVar('desc1');}else{
                $data5['desc1' ] = 'null';
            }
            if($this->request->getVar('desc3')){$data5['desc3' ] =  $this->request->getVar('desc3');}else{
                $data5['desc3' ] = 'null';
            }
            if($this->request->getVar('desc4')){$data5['desc4' ] =  $this->request->getVar('desc4');}else{
                $data5['desc4' ] = 'null';
            }
            if($this->request->getVar('desc5')){$data5['desc5' ] =  $this->request->getVar('desc5');}else{
                $data5['desc5' ] = 'null';
            }
            if($this->request->getVar('desc6')){$data5['desc6' ] =  $this->request->getVar('desc6');}else{
                $data5['desc6' ] = 'null';
            }
            if($this->request->getVar('desc2')){$data5['desc2' ] =  $this->request->getVar('desc2');}else{
                $data5['desc2' ] = 'null';
            }
            if($this->request->getVar('qty1')){$data5['qty1' ] =  $this->request->getVar('qty1');}else{
                $data5['qty1' ] = 0; 
            }
            if($this->request->getVar('qty2')){ $data5['qty2' ] =  $this->request->getVar('qty2');}else{
                $data5['qty2' ] = 0;
            }
            if($this->request->getVar('qty3')){ $data5['qty3' ] =  $this->request->getVar('qty3');}else{
                $data5['qty3' ] = 0;
            }if($this->request->getVar('qty4')){ $data5['qty4' ] =  $this->request->getVar('qty4');}else{
                $data5['qty4' ] = 0;
            }if($this->request->getVar('qty5')){ $data5['qty5' ] =  $this->request->getVar('qty5');}else{
                $data5['qty5' ] = 0;
            }if($this->request->getVar('qty6')){ $data5['qty6' ] =  $this->request->getVar('qty6');}else{
                $data5['qty6' ] = 0;
            }
       
        $db      = \Config\Database::connect();
            $increment = $db->table("product2");
            $increment->selectMax('product2.delvnote');
            $increment1 = $increment->get()->getResultArray();
            $inc = $increment1[0]['delvnote'];

            if($x = $inc){
            $incc1 = $db->table("dcustomer");
            $incc1->selectMax('dcustomer.delvnote');
            $sss1 = $incc1->get()->getResultArray();
            $nn = $sss1[0]['delvnote'];
            if(!$nn){
                $x = $inc;
                for($i = 0; $i < 1; $i++) {
                    $x++;
                    $incs =[ $x, ];
            $incc = $db->table("dcustomer");
            $incc->select('dcustomer.*');
            $incc->where('dcustomer.delvnote');
            $sss = $incc->get()->getResultArray();
            $incc->update(['delvnote' => $incs]);
        }
    }  
        }else{
         
            for($i = 0; $i < 1; $i++) {
            $x = $x++;
            // echo '<pre>';
            // print_r($x);
            $incc = $db->table("dcustomer");
            $incc->select('dcustomer.*');
            $incc->where('dcustomer.delvnote');
            $incc->update(['delvnote' => $data['delvnote']]);
            $incc->update(['delvnote' => $data['delvnote']]);
            }
        }

        $db      = \Config\Database::connect();
        $builder44 = $db->table("dcustomer");
        $builder44->select('dcustomer.username');
        $data44 = $builder44->get()->getResultArray();
        

        foreach($data44 as $dat44):
        $builder10000 = $db->table("tempinsert");
        $builder10000->select('tempinsert.*');
        $data1000 = $builder10000->get()->getResultArray();
        $builder10000->update(['customer' => $dat44]);
        endforeach;

        $builder999 = $db->table("tempinsert");
        $builder999->select('tempinsert.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder9999 = $db->table("dcustomer");
        $builder9999->select('dcustomer.assetid');
        $num9999 = $builder9999->countAll();
        if($num9999 < 1){
            return redirect()->back()->with('status', 'kindly fill the customer details and retry');
        }

        $db      = \Config\Database::connect();
        $builder899 = $db->table("tempinsert");
        $builder899->select('tempinsert.assetid');
        $data899 = $builder899->get()->getResultArray();
        foreach($data899 as $mast):

        $db      = \Config\Database::connect();
        $builder8999 = $db->table("masterlist");
        $builder8999->select('masterlist.assetid');
        $builder8999->where('masterlist.assetid', $mast);
        $builder8999->delete();
        endforeach;

        // updating datedelivered
        if(!$datedelivered){
            $builder89 = $db->table("tempinsert");
            $builder89->select('tempinsert.*');
            $data89 = $builder89->get()->getResultArray();
            $builder89->update(['random' => $data['random']]);
            $builder89->update(['datedelivered' => $data['datedelivered']]);
        }
        else{
        $builder89 = $db->table("tempinsert");
        $builder89->select('tempinsert.*');
        $data89 = $builder89->get()->getResultArray();
        $builder89->update(['random' => $data['random']]);
        $builder89->update(['datedelivered' => $datedelivered]);
        }

        $builder90 = $db->table("dcustomer");
        $builder90->select('dcustomer.*');
        $data90 = $builder90->get()->getResultArray();
        $builder90->update(['random' => $data['random']]);
        $builder90->update(['user_name' => $data['user_name']]);


        $builder8 = $db->table("tempinsert");
        $builder8->select('tempinsert.*');
        $data1 = $builder8->get()->getResultArray();


        $builder1 = $db->table("stockout");
        $builder1->select('stockout.*');
        $data2['items'] = $builder1->get()->getResultArray();

        
        foreach($data1 as $r) { 
            $db->table('stockout')->insert($r);
        }

        $builder4 = $db->table("dcustomer");
        $builder4->select('dcustomer.*');
        $data4 = $builder4->get()->getResultArray();

        
        $builder3 = $db->table("product");
        $builder3->select('product.*');
        $data3 = $builder3->get()->getResultArray();

        foreach($data4 as $c) { 
            $db->table('product')->insert($c);
        }

        $builder = $db->table("tempinsert");
        $builder->select('tempinsert.*');
        $builder->select('tempinsert.random');


        $builder10 = $db->table('tempinsert');
        $builder10->select('tempinsert.*, dcustomer.*, sum(tempinsert.qty) as tqty ');
        $builder10->join('dcustomer', ' tempinsert.random = dcustomer.random', "left");
        $builder10->where('tempinsert.random', $data['random']);
        $builder10->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
        $data5['items'] = $builder10->get()->getResult();
        // echo '<pre>';
        // print_r($data5['items']);
        // exit;
        $num = $builder10->countAll();

        if($num < 1){
            return redirect()->back()->with('status', 'kindly fill the fields and retry');
        }

        
        $builder->emptyTable();
        $builder->emptyTable();
        $builder4->emptyTable();
        return View('/products/deliverypdf', $data5);

    }


    public function ddeleted($id)
    {
        $db      = \Config\Database::connect();

        $builder1 = $db->table("tmdelivery");
        $builder1->select('tmdelivery.*');
        $builder1->where('tmdelivery.del', $id);
        $builder1->delete();

        return redirect()->to('ProductsCrud/manual')->with('status', 'Item removed');
    }

    public function ddeletei($id)
    {
        $db      = \Config\Database::connect();

        $builder1 = $db->table("tinvoicecreate");
        $builder1->select('tinvoicecreate.*');
        $builder1->where('tinvoicecreate.del', $id);
        $builder1->delete();

        return redirect()->to('ProductsCrud/storeie')->with('status', 'Item removed');

    }
    public function masterlistp($id)
    {
       
        $db      = \Config\Database::connect();
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $builder->where('verify.assetid', $id);
        $data = $builder->get()->getResultArray();

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $id);
        $data1 = $builder1->get()->getResultArray();

        $builder2 = $db->table("stockout");
        $builder2->select('stockout.*');
        $builder2->where('stockout.assetid', $id);
        $data2 = $builder2->get()->getResultArray();

        $builder3 = $db->table("warrantyin");
        $builder3->select('warrantyin.*');
        $builder3->where('warrantyin.assetid', $id);
        $data3 = $builder3->get()->getResultArray();

        $builder4 = $db->table("faulty");
        $builder4->select('faulty.*');
        $builder4->where('faulty.assetid', $id);
        $data4 = $builder4->get()->getResultArray();

        $builder6 = $db->table("faultyout");
        $builder6->select('faultyout.*');
        $builder6->where('faultyout.assetid', $id);
        $data6 = $builder6->get()->getResultArray();

        $builder7 = $db->table("warrantyout");
        $builder7->select('warrantyout.*');
        $builder7->where('warrantyout.assetid', $id);
        $data7 = $builder7->get()->getResultArray();

        $builder2->where('stockout.assetid', $id);
        $builder2->delete();

        $builder1->where('masterlist.assetid', $id);
        $builder1->delete();

        $builder3->where('warrantyin.assetid', $id);
        $builder3->delete();

        $builder4->where('faulty.assetid', $id);
        $builder4->delete();

        $builder6->where('faultyout.assetid', $id);
        $builder6->delete();  

        $builder7->where('warrantyout.assetid', $id);
        $builder7->delete();


        foreach($data as $r) { 
          
        if(!$data1){
            $db->table('masterlist')->insert($r);
        }else{
            $db->table('masterlist')->update($r);

        }
        
        $builder->where('verify.assetid', $id);
        $builder->delete();

        }
        return redirect()->back()->with('status', 'Item pushed to master list');
    }

    public function faultyall()
    {
        $masterlis =['faulty'];

        $db      = \Config\Database::connect();
        $builder999 = $db->table("verify");
        $builder999->select('verify.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder201 = $db->table("verify");
        $builder201->select('verify.assetid');
        $data1 = $builder201->get()->getResultArray();
        foreach($data1 as $d1):
        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $d1['assetid']);
        $builder1->delete();

        $builder2 = $db->table("stockout");
        $builder2->select('stockout.*');
        $builder2->where('stockout.assetid', $d1['assetid']);
        $builder2->delete();

        $builder3 = $db->table("warrantyin");
        $builder3->select('warrantyin.*');
        $builder3->where('warrantyin.assetid', $d1['assetid']);
        $builder3->delete();

        $builder4 = $db->table("faulty");
        $builder4->select('faulty.*');
        $builder4->where('faulty.assetid', $d1['assetid']);
        $builder4->delete();

        $builder6 = $db->table("faultyout");
        $builder6->select('faultyout.*');
        $builder6->where('faultyout.assetid', $d1['assetid']);
        $builder6->delete();

        $builder7 = $db->table("warrantyout");
        $builder7->select('warrantyout.*');
        $builder7->where('warrantyout.assetid', $d1['assetid']);
        $builder7->delete();
        endforeach;

        $builder = $db->table("verify");
        $builder->select('verify.*');
        $data = $builder->get()->getResultArray();

        $builder11 = $db->table("faulty");
        $builder11->select('faulty.*');
        $builder11->where('faulty.assetid', $d1['assetid']);
        $data11 = $builder11->get()->getResult();

        $counts = 0;

        foreach($data as $r) { 
            $counts += 1;
            if(!$data11){
                $db->table('faulty')->insert($r);
            }else{
                $db->table('faulty')->update($r);
            }
        }
        $builder->emptyTable();
        return redirect()->back()->with('status', $counts.' '.'Item(s) pushed to Faulty list');
    }

    public function masterlistall()
    {

        $db      = \Config\Database::connect();
        $builder999 = $db->table("verify");
        $builder999->select('verify.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder201 = $db->table("verify");
        $builder201->select('verify.assetid');
        $data1 = $builder201->get()->getResultArray();
        foreach($data1 as $d1):

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $d1['assetid']);
        $builder1->delete();

        $builder2 = $db->table("stockout");
        $builder2->select('stockout.*');
        $builder2->where('stockout.assetid', $d1['assetid']);
        $builder2->delete();

        $builder3 = $db->table("warrantyin");
        $builder3->select('warrantyin.*');
        $builder3->where('warrantyin.assetid', $d1['assetid']);
        $builder3->delete();

        $builder4 = $db->table("faulty");
        $builder4->select('faulty.*');
        $builder4->where('faulty.assetid', $d1['assetid']);
        $builder4->delete();

        $builder6 = $db->table("faultyout");
        $builder6->select('faultyout.*');
        $builder6->where('faultyout.assetid', $d1['assetid']);
        $builder6->delete();

        $builder7 = $db->table("warrantyout");
        $builder7->select('warrantyout.*');
        $builder7->where('warrantyout.assetid', $d1['assetid']);
        $builder7->delete();
       
        endforeach;

        $builder11 = $db->table("warrantyin");
        $builder11->select('warrantyin.*');
        $builder11->where('warrantyin.assetid', $d1['assetid']);
        $data11 = $builder11->get()->getResult();

        $db      = \Config\Database::connect();
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $data = $builder->get()->getResultArray();

        $counts = 0;

        foreach($data as $r) { 
        $counts += 1;

            if(!$data11){
                $db->table('masterlist')->insert($r);
            }
            else{
                $db->table('masterlist')->update($r);
            }
        }
        $builder->emptyTable();

        return redirect()->back()->with('status', $counts.' '.'Item(s) pushed to Master list');

    }


    public function faultyvp($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("verify");
        $builder->select('verify.*');
        $builder->where('verify.assetid', $id);
        $data = $builder->get()->getResultArray();

        $builder80 = $db->table("faulty");
        $builder80->select('faulty.*');
        $builder80->where('faulty.assetid', $id);
        $builder80->delete();


        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $id);
        $data1 = $builder1->get()->getResultArray();

        $builder2 = $db->table("stockout");
        $builder2->select('stockout.*');
        $builder2->where('stockout.assetid', $id);
        $data2 = $builder2->get()->getResultArray();
        

        $builder3 = $db->table("warrantyin");
        $builder3->select('warrantyin.*');
        $builder3->where('warrantyin.assetid', $id);
        $data3 = $builder3->get()->getResultArray();

        $builder4 = $db->table("faulty");
        $builder4->select('faulty.*');
        $builder4->where('faulty.assetid', $id);
        $data4 = $builder4->get()->getResultArray();

        $builder6 = $db->table("faultyout");
        $builder6->select('faultyout.*');
        $builder6->where('faultyout.assetid', $id);
        $data6 = $builder6->get()->getResultArray();

        $builder7 = $db->table("warrantyout");
        $builder7->select('warrantyout.*');
        $builder7->where('warrantyout.assetid', $id);
        $data7 = $builder7->get()->getResultArray();

        

        $builder3->where('warrantyin.assetid', $id);
        $builder3->delete();

        $builder1->where('masterlist.assetid', $id);
        $builder1->delete();

        $builder6->where('faultyout.assetid', $id);
        $builder6->delete();  

        $builder7->where('warrantyout.assetid', $id);
        $builder7->delete();

        $builder2->where('stockout.assetid', $id);
        $builder2->delete();

        foreach($data as $r) { 
          
        // if(!$data4){
            $db->table('faulty')->insert($r);
        // }
        // else{
        //     return redirect()->back()->with('status', 'Item already exist in Faulty list');
        // }
    }
        $builder->where('verify.assetid', $id);
        $builder->delete();

        

        return redirect()->back()->with('status', 'Item pushed to faulty list');
    }


    public function masterpr($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("recycle");
        $builder->select('recycle.*');
        $builder->where('recycle.assetid', $id);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $id);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) { 
          
        if(!$data2){
            $db->table('masterlist')->insert($r);
        }
        else{
            return redirect()->back()->with('status', 'Item already exist in master list');
            $builder->where('recycle.assetid', $id);
        $builder->delete(); 
        }
        $builder->where('recycle.assetid', $id);
        $builder->delete();
        }
        return redirect()->back()->with('status', 'Item pushed to master list');
    }

    public function masterp($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('faulty.assetid', $id);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $id);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) { // loop over results
          
        if(!$data2){
            $db->table('masterlist')->insert($r);
        }
        
        $builder->where('faulty.assetid', $id);
        $builder->delete();
        }
        return redirect()->back()->with('status', 'Item pushed to master list');
    }


    public function faultypr($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('faulty.assetid', $id);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("recycle");
        $builder1->select('recycle.*');
        $builder1->where('recycle.assetid', $id);
        $data2 = $builder1->get()->getResultArray();

        foreach($data2 as $r) { 
          
        if(!$data1){
            $db->table('faulty')->insert($r);
        }

        else{
            return redirect()->back()->with('status', 'Item already exist in faulty list');
            $builder1->where('recycle.assetid', $id);
            $builder1->delete();
        }
        
        $builder1->where('recycle.assetid', $id);
        $builder1->delete();
        }
        return redirect()->back()->with('status', 'Item pushed to faulty list');
    }

    public function faultyp($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->where('faulty.assetid', $id);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $id);
        $data2 = $builder1->get()->getResultArray();

        foreach($data2 as $r) { // loop over results
          
        if(!$data1){
            $db->table('faulty')->insert($r);
        }
        
        $builder1->where('masterlist.assetid', $id);
        $builder1->delete();
        }
        return redirect()->back()->with('status', 'Item pushed to faulty list');
    }

    // return back to masterlist from delivery note
    public function ddelete($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("tempinsert");
        $builder->select('tempinsert.*');
        $builder->where('tempinsert.assetid', $id);
        $data1 = $builder->get()->getResultArray();

        // echo'<pre>';
        // print_r($data1);

        $builder1 = $db->table("masterlist");
        $builder1->select('masterlist.*');
        $builder1->where('masterlist.assetid', $id);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) { // loop over results
          
        if(!$data2){
            $db->table('masterlist')->insert($r);


        }
        // $builder1->update(['random' => $data['random']]);
        $builder->where('tempinsert.assetid', $id);
        $builder->delete();
        }
        return redirect()->to('ProductsCrud/delv')->with('status', 'Item returned to masterlist');
    }

    public function dfdelete($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table("tfaultyout");
        $builder->select('tfaultyout.*');
        $builder->where('tfaultyout.assetid', $id);
        $builder->delete();
        return redirect()->to(site_url('/fualty-note'));        
    }

    public function inv()
    {
       
        helper(['form', 'url']);
        $vendorModel = new VendorModel();
        $productModel = new InsertModel();
        $data['masterlist'] = $productModel->orderBy('id', 'DESC')->findAll();
        $data['vendor'] = $vendorModel->orderBy('id', 'DESC')->findAll();
        return view('products/deliver', $data);
    }


    public function summary($document)
    {
        $filename = "uploads/delvdocuments/".$document;
        return redirect()->to(base_url($filename));
    }

    
    public function fetchdebit($ref)
    {
        $filename = "uploads/debitdocuments/".$ref.".pdf";
        return redirect()->to(base_url($filename));
    }
    public function fetchcredit($ref)
    {
        $filename = "uploads/creditdocs/".$ref.".pdf";
        return redirect()->to(base_url($filename));
    }

    public function fetchwarranty($ref)
    {
        $filename = "uploads/warrantydocs/".$ref.".pdf";
        return redirect()->to(base_url($filename));
    }

    public function fetchinvoices($ref)
    {
        $filename = "uploads/delvdocuments/".$ref;
        return redirect()->to(base_url($filename));
    }
  
    public function fetchjobc($ref)
    {
        $filename = "uploads/jobcdocuments/".$ref.".pdf";
        return redirect()->to(base_url($filename));
    }
    public function fetchdelivery($ref)
    {
        $filename = "uploads/delvdocuments/".$ref;
        return redirect()->to(base_url($filename));
    }

    public function fetchspreadsheet($ref)
    {
        $filename = "upload/".$ref.".xlsx";
        return redirect()->to(base_url($filename));
    }

    //invoice page ************
    public function invvsub()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'serialno' => $this->request->getPost('serialno'),
            'random' => $this->request->getPost('random'),
            // $random,
        ];

        $builder = $db->table("masterlist");
        $builder->select('stockout.*');
        $builder->where('stockout.assetid', $data['serialno']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("tempinvoice");
        $builder1->select('tempinvoice.*');
        $builder1->where('tempinvoice.assetid', $data['serialno']);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) { // loop over results
          
        if(!$data2){
            $db->table('tempinsert')->insert($r);


        }
        $builder1->update(['random' => $data['random']]);
        $builder->delete(['assetid' => $data['serialno']]); 
        }
        
        // sleep(6);

        return redirect()->to('ProductsCrud/delv'); 
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

        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $builder2 = $db->table('customer');
        $builder2->select('customer.*')->orderBy('username', 'ASC');        

        $db      = \Config\Database::connect();
        $builder = $db->table('tcredit');
        $builder->select('tcredit.*');

        $builder1 = $db->table('tcustomer4');
        $builder1->select('tcustomer4.*');

        $data['customer'] = $builder1->get()->getResult();
        $data['customers'] = $builder2->get()->getResult();

        $data['masterlist'] = $builder->get()->getResult();

        return view('products/cnote', $data);
    }

    //warranty operations
    public function warrant()
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
        $builder = $db->table('warrantyi');
        $builder->select('warrantyi.*');
        $builder1 = $db->table('customer1');
        $builder1->select('customer1.*');

        $data['customer'] = $builder1->get()->getResult();
        $data['masterlist'] = $builder->get()->getResult();

        $db      = \Config\Database::connect();
        $builder5 = $db->table('customer');
        $builder5->select('customer.*')->orderBy('username', 'ASC');;
        $data['customers'] = $builder5->get()->getResult();



        return view('products/wnote', $data);
    }

    public function creditsub()
    {
        $data = [
            'assetid' => $this->request->getPost('assetid'),
            'random' => $this->request->getPost('random'),
        ];
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();

        $builder9011 = $db->table("tcustomer4");
        $builder9011->select('tcustomer4.*');
        $data9011 = $builder9011->get()->getResult();
        $num9011 =$builder9011->countAll();
    
        if($num9011 < 1){
        // $builder = $db->table("warrantyin");
        // $builder->select('warrantyin.*');
        // $builder->where('warrantyin.assetid', $data['assetid']);
        // $data1 = $builder->get()->getResultArray();

        // $builder1 = $db->table("tcredit");
        // $builder1->select('tcredit.*');
        // $builder1->where('tcredit.assetid', $data['assetid']);
        // $data2 = $builder1->get()->getResultArray();

        
    
        // foreach($data1 as $r) { 
              
        // if(!$data2){
        //     $db->table('tcredit')->insert($r);
        // }
    
        //     $builder1->update(['random' => $data['random']]);
        // }
        return redirect()->to(base_url('ProductsCrud/credit'))->with('status', 'Kindly fill customer details first and retry');
    
            }

        else{  

        $builder9012 = $db->table("tcustomer4");
        $builder9012->select('tcustomer4.username');
        $data9012 = $builder9012->get()->getResultArray();

        foreach($data9012 as $cust):
        endforeach;
        
        $customer = $db->table("warrantyin");
        $customer->select('warrantyin.customer');
        $customer->where('warrantyin.assetid', $data['assetid']);
        $customer1= $customer->get()->getResultArray();
        if($customer1){

        foreach($customer1 as $custom):
        endforeach;

        $customer100 = $db->table("tcredit");
        $customer100->select('tcredit.customer');
        $customer111= $customer100->get()->getResultArray();
        foreach($customer111 as $customs):
        endforeach;
        
        if($cust['username'] == $custom['customer'] ){

            $builder8080 = $db->table("warrantyin");
            $builder8080->select('warrantyin.*');
            $builder8080->where('warrantyin.assetid', $data['assetid']);
            $data8080 = $builder8080->get()->getResultArray();
    
            $builder8081 = $db->table("tcredit");
            $builder8081->select('tcredit.*');
            $builder8081->where('tcredit.assetid', $data['assetid']);
            $data8081 = $builder8081->get()->getResultArray();
        
            foreach($data8080 as $r) { 
                  
            if(!$data8081){
                $db->table('tcredit')->insert($r);
            }
        
                $builder8081->update(['random' => $data['random']]);
            }
            return redirect()->back();
        
                }
            }
                return redirect()->to(base_url('/ProductsCrud/credit'))->with('status', 'Ensure correct item is selectred and retry');

    }


    }

    public function deletew($id)
    {
        
        $db      = \Config\Database::connect();
        $builder = $db->table("warrantyi");
        $builder->select('warrantyi.*');
        $builder->where('id', $id);
        $builder->delete(); 
        return redirect()->back()->with('status', 'Item deleted succesfully');
        
    }

    public function warrantysub2()
    {
     
        $db      = \Config\Database::connect();
        $customer = $db->table("warrantyin");
        $customer->select('warrantyin.*');
        $customer1= $customer->get()->getResultArray();

        $total = $qty * $price;
        $data = [
        'description' => $this->request->getVar('description'),
        'unitprice' => $this->request->getVar('unitprice'),
         'unitprice'=> $price,
         'qty'=> $qty,
         'total'=> $total,

        'del' => $del,
    ];
    for ($i=0; $i <$qty; $i++) { 
       $assid = rand(10000000, 99999999);
        $data['assetid'] = $assid;

        $builder->insert($data);

    }
    }

    public function warrantysub()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'serialno' => $this->request->getPost('serialno'),
            'random' => $this->request->getPost('random'),
        ];


        $builder9011 = $db->table("customer1");
        $builder9011->select('customer1.*');
        $data9011 = $builder9011->get()->getResult();
        $num9011 =$builder9011->countAll();
    
        if($num9011 < 1){
        // $builder = $db->table("warrantyin");
        // $builder->select('warrantyin.*');
        // $builder->where('warrantyin.assetid', $data['serialno']);
        // $data1 = $builder->get()->getResultArray();

        // $builder1 = $db->table("warrantyi");
        // $builder1->select('warrantyi.*');
        // $builder1->where('warrantyi.assetid', $data['serialno']);
        // $data2 = $builder1->get()->getResultArray();
    
        // foreach($data1 as $r) { 
              
        // if(!$data2){
        //     $db->table('warrantyi')->insert($r);
        // }
    
        //     $builder1->update(['random' => $data['random']]);
        // }
        return redirect()->to('ProductsCrud/warrant')->with('status', 'Kindly fill customer details first');
    
            }

        else{  

        $builder9012 = $db->table("customer1");
        $builder9012->select('customer1.username');
        $data9012 = $builder9012->get()->getResultArray();

        foreach($data9012 as $cust):
        endforeach;
        
        $customer = $db->table("warrantyin");
        $customer->select('warrantyin.customer');
        $customer->where('warrantyin.assetid', $data['serialno']);
        $customer1= $customer->get()->getResultArray();

        if($customer1){
        foreach($customer1 as $custom):
        endforeach;

        $customer10 = $db->table("warrantyi");
        $customer10->select('warrantyi.customer');
        $customer11= $customer10->get()->getResultArray();
        foreach($customer11 as $customs):
        endforeach;
        
        if($cust['username'] == $custom['customer'] ){

            $builder8080 = $db->table("warrantyin");
            $builder8080->select('warrantyin.*');
            $builder8080->where('warrantyin.assetid', $data['serialno']);
            $data8080 = $builder8080->get()->getResultArray();
    
            $builder8081 = $db->table("warrantyi");
            $builder8081->select('warrantyi.*');
            $builder8081->where('warrantyi.assetid', $data['serialno']);
            $data8081 = $builder8081->get()->getResultArray();
        
            foreach($data8080 as $r) { 
                  
            if(!$data8081){
                $db->table('warrantyi')->insert($r);
            }
        
                $builder8081->update(['random' => $data['random']]);
            }
            return redirect()->back();
        }
                }
       
                return redirect()->back()->with('status', 'Ensure correct item is selected and retry');

    }

}

    public function creditsub1()
    {
        $session = \Config\Services::session();

        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'username' => $this->request->getPost('username'),
            'user_name' => $session->get('user_name'),
            'random' => $this->request->getPost('random'),
            'credit' => $this->request->getPost('credit'),

        ];

        
        $builder1111 = $db->table("customer");
        $builder1111->select('customer.*');
        $builder1111->where('customer.username', $data['username']);
        $data1111 = $builder1111->get()->getResultArray();

        $builder9011 = $db->table("tcredit");
        $builder9011->select('tcredit.*');
        $data9011 = $builder9011->get()->getResult();
        $num9011 =$builder9011->countAll();

        if($num9011 < 1){

        $builder = $db->table("customer");
        $builder->select('customer.*');
        $builder->where('customer.username', $data['username']);
        $data1 = $builder->get()->getResultArray();


        $builder1 = $db->table("tcustomer4");
        $builder1->select('tcustomer4.*');
        $num = $builder1->countAll();
        $builder1->where('tcustomer4.username', $data['username']);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) { 
          
        if($num < 1){
            $db->table('tcustomer4')->insert($r);
        }
        elseif(!$data2){
            $db->table('tcustomer4')->update($r);
        }
        $builder1->update(['random' => $data['random']]);
        $builder1->update(['user_name' => $data['user_name']]);
        $builder1->update(['credit' => $data['credit']]);

        }
        return redirect()->to(site_url('/credit'))->with('status', 'Added successfully'); 
    }

    else{

        $builderss1 = $db->table("tcustomer4");
        $builderss1->select('tcustomer4.*');
        $numss = $builderss1->countAll();
        $builderss1->where('tcustomer4.username', $data['username']);
        $datass2 = $builderss1->get()->getResultArray();

        $builder901 = $db->table("tcredit");
        $builder901->select('tcredit.customer');
        $builder901->where('customer', $data['username']);
        $data901 = $builder901->get()->getResult();
        foreach($data901 as $da901){

            if($data['username'] = $da901){
                foreach($data1111 as $r1) { 
                if($numss < 1){
                    $db->table('tcustomer4')->insert($r1);
                }
                elseif(!$datass2){
                    $db->table('tcustomer4')->update($r1);
                }
                $builderss1->update(['random' => $data['random']]);
                $builderss1->update(['user_name' => $data['user_name']]);

                $builderss1->update(['credit' => $data['credit']]);

                }
                return redirect()->to(site_url('/credit')); 
                }
        }
            return redirect()->to(site_url('/credit'))->with('status', 'Ensure correct customer is selectred and retry');

    }


    }

  

    public function invosub()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'username' => $this->request->getPost('username'),
            'random' => $this->request->getPost('random'),
            'invoice' => $this->request->getPost('invoice'),
        ];
        $builder = $db->table("customer");
        $builder->select('customer.*');
        $builder->where('customer.username', $data['username']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("customerin");
        $builder1->select('customerin.*');
        $num = $builder1->countAll();
        $builder1->where('customerin.username', $data['username']);
        $data2 = $builder1->get()->getResultArray();


        foreach($data1 as $r) { 
          
        if($num < 1 ){
            $db->table('customerin')->insert($r);
        }
        elseif(!$data2){
            $db->table('customerin')->update($r);

        }
        $builder1->update(['random' => $data['random']]);
        $builder1->update(['invoice' => $data['invoice']]);

        }

        return redirect()->to('ProductsCrud/storeie')->with('status', 'customer added successfully'); 
    }



    

    public function debitsub1()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'username' => $this->request->getPost('username'),
            'random' => $this->request->getPost('random'),
            'debit' => $this->request->getPost('debit'),

        ];

        $builder = $db->table("vendors");
        $builder->select('vendors.*');
        $builder->where('vendors.username', $data['username']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("tvendors");
        $builder1->select('tvendors.*');
        $num = $builder1->countAll();
        $builder1->where('tvendors.username', $data['username']);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) {           
        if($num < 1 ){
            $db->table('tvendors')->insert($r);
        }
        elseif(!$data2){
            $db->table('tvendors')->update($r);

        }
        $builder1->update(['random' => $data['random']]);
        $builder1->update(['debit' => $data['debit']]);

        }
        return redirect()->to('ProductsCrud/debitnote'); 
        
    }

    public function faultysub1()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'username' => $this->request->getPost('username'),
            'faulty' => $this->request->getPost('faulty'),

            
        ];

        $builder = $db->table("customer");
        $builder->select('customer.*');
        $builder->where('customer.username', $data['username']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("customerfo");
        $builder1->select('customerfo.*');
        $num = $builder1->countAll();
        $builder1->where('customerfo.username', $data['username']);
        $data2 = $builder1->get()->getResultArray();

        $count = 1;
        foreach($data1 as $r) { 
          
        if($num < 1 ){
            $db->table('customerfo')->insert($r);
            $builder1->update(['faulty' => $data['faulty']]);

        }
        elseif(!$data2){
            $db->table('customerfo')->update($r);
            $builder1->update(['faulty' => $data['faulty']]);

                
       
        }
       
    }
        return redirect()->to('ProductsCrud/fualtynote'); 
    }

    public function dsubm(){

        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'username' => $this->request->getPost('username'),
            'random' => $this->request->getPost('random'),
            'deliver' => $this->request->getPost('deliver'),

        ];

        $builder = $db->table("customer");
        $builder->select('customer.*');
        $builder->where('customer.username', $data['username']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("dcustomer");
        $builder1->select('dcustomer.*');
        $num = $builder1->countAll();
        $builder1->where('dcustomer.username', $data['username']);
        $data2 = $builder1->get()->getResultArray();

        $count = 1;
        foreach($data1 as $r) { // loop over results
          
        if($num < 1 ){
            $db->table('dcustomer')->insert($r);
            $builder1->update(['deliver' => $data['deliver']]);

        }
        elseif(!$data2){
            $db->table('dcustomer')->update($r);
            $builder1->update(['deliver' => $data['deliver']]);

                
        }

        $builder1->update(['random' => $data['random']]);
        }
        return redirect()->to('ProductsCrud/manual'); 

        
    }

    public function dsub()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $sess = session()->get('user_name');
        $data = [
            'username' => $this->request->getPost('username'),
            'random' => $this->request->getPost('random'),
            

        ];
        $data22 = [
            'deliver' => $this->request->getPost('deliver'),
            'vendor' => $sess,
        ];

        // echo '<pre>';
        // print_r($data22);
        // exit;

        $builder = $db->table("customer");
        $builder->select('customer.*');
        $builder->where('customer.username', $data['username']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("dcustomer");
        $builder1->select('dcustomer.*');
        $num = $builder1->countAll();
        $builder1->where('dcustomer.username', $data['username']);
        $data2 = $builder1->get()->getResultArray();

        $count = 1;
        foreach($data1 as $r) { // loop over results
          
        if($num < 1 ){
            $db->table('dcustomer')->insert($r);
            $builder1->update($data22);

        }
        elseif(!$data2){
            $db->table('dcustomer')->update($r);
            $builder1->update($data22);
        }

        $builder1->update(['random' => $data['random']]);
        }
        return redirect()->to('ProductsCrud/delv'); 

        
    }

    public function manual(){
        
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $db      = \Config\Database::connect();
        $builder5 = $db->table('customer');
        $builder5->select('customer.*');
        $data['customers'] = $builder5->get()->getResult();

        $db      = \Config\Database::connect();
        $builder = $db->table('tmdelivery');
        $builder->select('tmdelivery.*');

        $builder1 = $db->table('dcustomer');
        $builder1->select('dcustomer.*');

        $data['customer'] = $builder1->get()->getResult();
        $data['masterlist'] = $builder->get()->getResult();


        return view('products/manual', $data);

    }

    public function warrantysub1()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'username' => $this->request->getPost('username'),
            'random' => $this->request->getPost('random'),
            'warranty' => $this->request->getPost('warranty'),

        ];

        
        $builder1111 = $db->table("customer");
        $builder1111->select('customer.*');
        $builder1111->where('customer.username', $data['username']);
        $data1111 = $builder1111->get()->getResultArray();

        $builder9011 = $db->table("warrantyi");
        $builder9011->select('warrantyi.*');
        $data9011 = $builder9011->get()->getResult();
        $num9011 =$builder9011->countAll();

        if($num9011 < 1){

        $builder = $db->table("customer");
        $builder->select('customer.*');
        $builder->where('customer.username', $data['username']);
        $data1 = $builder->get()->getResultArray();


        $builder1 = $db->table("customer1");
        $builder1->select('customer1.*');
        $num = $builder1->countAll();
        $builder1->where('customer1.username', $data['username']);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) { 
          
        if($num < 1){
            $db->table('customer1')->insert($r);
        $builder1->update(['random' => $data['random']]);
            
        $builder1->update(['warranty' => $data['warranty']]);
        }
        elseif(!$data2){
            $db->table('customer1')->update($r);
        }
        $builder1->update(['random' => $data['random']]);
        $builder1->update(['warranty' => $data['warranty']]);


        }
        return redirect()->to('ProductsCrud/warrant'); 
    }

    else{

        $builderss1 = $db->table("customer1");
        $builderss1->select('customer1.*');
        $numss = $builderss1->countAll();
        $builderss1->where('customer1.username', $data['username']);
        $datass2 = $builderss1->get()->getResultArray();

        $builder901 = $db->table("warrantyi");
        $builder901->select('warrantyi.customer');
        $builder901->where('customer', $data['username']);
        $data901 = $builder901->get()->getResult();
        foreach($data901 as $da901){

            if($data['username'] = $da901){
                foreach($data1111 as $r1) { 
                if($numss < 1){
                    $db->table('customer1')->insert($r1);
                }
                elseif(!$datass2){
                    $db->table('customer1')->update($r1);
                }
                $builderss1->update(['random' => $data['random']]);
                }
                return redirect()->to('ProductsCrud/warrant'); 
        
                }

        }
            return redirect()->back()->with('status', 'Ensure correct customer is selectred and retry');

    }
    }
    public function cout()
    {
        $db      = \Config\Database::connect();
        $session = \Config\Services::session();
        $datedelivered = $this->request->getVar('datedelivered');
        $data = [
            'user_name' => $session->get('user_name'),
            'random' => $this->request->getVar('random'),
            'lname' => $this->request->getVar('lname'),
            'credit' => $this->request->getVar('credit'),
            'datedelivered' =>  date("Y/m/d"),
            $x = 'AAA000',
           'ccredit' => 'AA000',
        ];
        $db      = \Config\Database::connect();
        $increment = $db->table("ccredit");
        $increment->selectMax('ccredit.ccredit');
        $increment1 = $increment->get()->getResultArray();
        $inc = $increment1[0]['ccredit'];

        if($x = $inc){
        $incc1 = $db->table("tcustomer4");
        $incc1->selectMax('tcustomer4.ccredit');
        $sss1 = $incc1->get()->getResultArray();
        $nn = $sss1[0]['ccredit'];
        if(!$nn){
            $x = $inc;
            for($i = 0; $i < 1; $i++) {
                $x++;
                $incs =[ $x, ];
        $incc = $db->table("tcustomer4");
        $incc->select('tcustomer4.*');
        $incc->where('tcustomer4.ccredit');
        $sss = $incc->get()->getResultArray();
        $incc->update(['ccredit' => $incs]);
    }
}  
    }else{
     
        for($i = 0; $i < 1; $i++) {
        $x = $x++;
        $incc = $db->table("tcustomer4");
        $incc->select('tcustomer4.*');
        $incc->where('tcustomer4.ccredit');
        $incc->update(['ccredit' => $data['ccredit']]);
        $incc->update(['ccredit' => $data['ccredit']]);
        }
    }

        $builder44 = $db->table("tcustomer4");
        $builder44->select('tcustomer4.username');
        $data44 = $builder44->get()->getResultArray();

        foreach($data44 as $dat44):
        $builder10000 = $db->table("tcredit");
        $builder10000->select('tcredit.*');
        $data1000 = $builder10000->get()->getResultArray();
        $builder10000->update(['customer' => $dat44]);
        endforeach;


        $db      = \Config\Database::connect();
        $builder999 = $db->table("tcredit");
        $builder999->select('tcredit.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->to(site_url('/credit'))->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder9999 = $db->table("tcustomer4");
        $builder9999->select('tcustomer4.assetid');
        $num9999 = $builder9999->countAll();
        if($num9999 < 1){
            return redirect()->to(site_url('/credit'))->with('status', 'kindly fill the customer details and retry');
        }

        $db      = \Config\Database::connect();
        $builder899 = $db->table("tcredit");
        $builder899->select('tcredit.assetid');
        $data899 = $builder899->get()->getResultArray();

        foreach($data899 as $mast):

        $db      = \Config\Database::connect();
        $builder8999 = $db->table("warrantyin");
        $builder8999->select('warrantyin.assetid');
        $builder8999->where('warrantyin.assetid', $mast);
        $builder8999->delete();
        endforeach;

        // updating datedelivered
        if(!$datedelivered){
            
        $builder11= $db->table("tcredit");
        $builder11->select('tcredit.*');
        $data11  = $builder11->get()->getResultArray();
        $builder11->update(['random' => $data['random']]);
        $builder11->update(['datedelivered' => $data['datedelivered']]);

        }
        else{
        
        $builder11= $db->table("tcredit");
        $builder11->select('tcredit.*');
        $data11  = $builder11->get()->getResultArray();
        $builder11->update(['random' => $data['random']]);
        $builder11->update(['datedelivered' => $datedelivered]);
        }




        $builder5= $db->table("tcredit");
        $builder5->select('tcredit.*');
        $data1  = $builder5->get()->getResultArray();

        $builder1 = $db->table("credit");
        $builder1->select('credit.*');
        $data2= $builder1->get()->getResultArray();

        $builder4 = $db->table("tcustomer4");
        $builder4->select('tcustomer4.*');
        $data4 = $builder4->get()->getResultArray();


        $builder3 = $db->table("tcustomer");
        $builder3->select('tcustomer.*');
        $data3 = $builder3->get()->getResultArray();

        foreach($data1 as $r) { 
            $db->table('credit')->insert($r);
        }
        
        foreach($data4 as $c) { 
            $db->table('tcustomer')->insert($c);
        }

        $builder = $db->table('tcredit');
        $builder->select('tcredit.*, tcustomer4.*, sum(tcredit.qty) as tqty');
        $builder->join('tcustomer4', ' tcredit.random = tcustomer4.random', "left");
        $builder->where('tcredit.random', $data['random']);
        $builder->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
        $data5['items'] = $builder->get()->getResult();
        $num = $builder->countAll();

        if($num < 1)
        {
            return redirect()->to(site_url('/credit'))->with('status', 'kindly fill the fields and retry');
        }

        // echo '<pre>';
        // print_r($data5);
        // exit;
        
        $builder5->emptyTable();
        $builder4->emptyTable();
        return View('/products/cpdf', $data5);

            }



    public function wout()
    {
        $db      = \Config\Database::connect();
        
        $session = \Config\Services::session();
        $datedelivered = $this->request->getVar('datedelivered');
        $data = [
            
            'random' => $this->request->getVar('random'),
            'lname' => $this->request->getVar('lname'),
            'user_name' => $session->get('user_name'),
            'datedelivered' =>  date("Y/m/d"),
            $x = 'AA000',
            'wnote' => 'AA000',
        ];

         $db      = \Config\Database::connect();
            $increment = $db->table("customer3");
            $increment->selectMax('customer3.wnote');
            $increment1 = $increment->get()->getResultArray();
            $inc = $increment1[0]['wnote'];

            if($x = $inc){
            $incc1 = $db->table("customer1");
            $incc1->selectMax('customer1.wnote');
            $sss1 = $incc1->get()->getResultArray();
            $nn = $sss1[0]['wnote'];
            if(!$nn){
                $x = $inc;
                for($i = 0; $i < 1; $i++) {
                    $x++;
                    $incs =[ $x, ];
            $incc = $db->table("customer1");
            $incc->select('customer1.*');
            $incc->where('customer1.wnote');
            $sss = $incc->get()->getResultArray();
            $incc->update(['wnote' => $incs]);
        }
    }  
        }else{
         
            for($i = 0; $i < 1; $i++) {
            $x = $x++;
            $incc = $db->table("customer1");
            $incc->select('customer1.*');
            $incc->where('customer1.wnote');
            $incc->update(['wnote' => $data['wnote']]);
            $incc->update(['wnote' => $data['wnote']]);
            }
        }

        $builder44 = $db->table("customer1");
        $builder44->select('customer1.username');
        $data44 = $builder44->get()->getResultArray();

        foreach($data44 as $dat44):
        $builder10000 = $db->table("warrantyi");
        $builder10000->select('warrantyi.*');
        $data1000 = $builder10000->get()->getResultArray();
        $builder10000->update(['customer' => $dat44]);
        endforeach;

        $db      = \Config\Database::connect();
        $builder999 = $db->table("warrantyi");
        $builder999->select('warrantyi.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder9999 = $db->table("customer1");
        $builder9999->select('customer1.assetid');
        $num9999 = $builder9999->countAll();
        if($num9999 < 1){
            return redirect()->back()->with('status', 'kindly fill the customer details and retry');
        }


        $db      = \Config\Database::connect();
        $builder899 = $db->table("warrantyi");
        $builder899->select('warrantyi.assetid');
        $data899 = $builder899->get()->getResultArray();

        foreach($data899 as $mast):

        $db      = \Config\Database::connect();
        $builder8999 = $db->table("warrantyin");
        $builder8999->select('warrantyin.assetid');
        $builder8999->where('warrantyin.assetid', $mast);
        $builder8999->delete();
        endforeach;

        // updating datedelivered
        if(!$datedelivered){
        
        $builder100 = $db->table("warrantyi");
        $builder100->select('warrantyi.*');
        $data100 = $builder100->get()->getResultArray();
        $builder100->update(['random' => $data['random']]);
        $builder100->update(['datedelivered' => $data['datedelivered']]);
        }
        else{
        
        $builder100 = $db->table("warrantyi");
        $builder100->select('warrantyi.*');
        $data100 = $builder100->get()->getResultArray();
        $builder100->update(['random' => $data['random']]);
        $builder100->update(['datedelivered' => $datedelivered]);
        }

        $builder101 = $db->table("customer1");
        $builder101->select('customer1.*');
        $data101 = $builder101->get()->getResultArray();
        $builder101->update(['random' => $data['random']]);
        $builder101->update(['user_name' => $data['user_name']]);

        $builder = $db->table("warrantyi");
        $builder->select('warrantyi.*');
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("warrantyout");
        $builder1->select('warrantyout.*');
        $data2['items'] = $builder1->get()->getResultArray();

        $builder4 = $db->table("customer1");
        $builder4->select('customer1.*');
        $data4 = $builder4->get()->getResultArray();

        $builder3 = $db->table("customer2");
        $builder3->select('customer2.*');
        $data3 = $builder3->get()->getResultArray();
        
        foreach($data1 as $r) { 
            $db->table('warrantyout')->insert($r);
        }
        
        foreach($data4 as $c) { 
            $db->table('customer2')->insert($c);
        }

        $builder9 = $db->table('warrantyout');
        $builder9->select('warrantyout.*, customer2.*, sum(warrantyout.qty) as tqty');
        $builder9->join('customer2', ' warrantyout.random = customer2.random', "left");
        $builder9->where('warrantyout.random', $data['random']);
        $builder9->groupBy(['type','odd','comment', 'conditions','gen','model','cpu','speed', 'ram', 'hdd']);
        $data9['items'] = $builder9->get()->getResult();
        $num = $builder9->countAll();

        if($num < 1)
        {
            return redirect()->back()->with('status', 'kindly fill the fields and retry');
        }

        $builder->emptyTable();
        $builder4->emptyTable();

        return View('/products/wpdf', $data9);

    }

    public function editdelivery($id)
    {
        $sess = session()->get('user_name');
        $db      = \Config\Database::connect();
        $check = $db->table("mdelivery");
        $check->select('description');
        $checks = $check->get()->getResultArray();
        if($checks){

            $db      = \Config\Database::connect();
            $clear = $db->table("tmdelivery");
            $clear->select('tmdelivery.*');
            $clear->where('terms', $sess);
            $clear->delete();
    
    
            $builder = $db->table('mdelivery');
            $builder->select('mdelivery.*');
            $builder->where('mdelivery.random', $id);
            $data3 = $builder->get()->getResultArray();
    
    
            $builder13 = $db->table('tmdelivery');
            $builder13->select('tmdelivery.*');
            $builder13->where('tmdelivery.random', $id);
            $data13 = $builder13->get()->getResultArray();
    
            foreach($data3 as $r) {
                $db->table('tmdelivery')->insert($r);
            }
            
    
            $builder10 = $db->table('product');
            $builder10->select('product.*');
            $builder10->where('product.random', $id);
            $data10 = $builder10->get()->getResultArray();
    
            $builder11 = $db->table("dcustomer");
            $builder11->select('dcustomer.*');
            $builder11->where('dcustomer.random', $id);
            $data11 = $builder11->get()->getResultArray();
           
            foreach($data10 as $c) {
                if(!$data11){
                $db->table('dcustomer')->insert($c);
                }
                else{
                $db->table('dcustomer')->update($c);
                }
            }
    
    
            $delete1 = $db->table('product');
            $delete1->select('product.*');
            $delete1->where('product.random', $id);
            $delete1->delete();
    
            $delete1 = $db->table('product2');
            $delete1->select('product2.*');
            $delete1->where('product2.ref', $id);
            $delete1->delete();
    
    
            return redirect()->to(base_url('/ProductsCrud/manual'));
        }

        $db      = \Config\Database::connect();
        $clear = $db->table("tempinsert");
        $clear->select('tempinsert.*');
        $clear->where('terms', $sess);
        $clear->delete();

        $deletew = $db->table('masterlist');
        $deletew->select('masterlist.*');
        $deletew->where('masterlist.random', $id);
        $deletew->delete();

        $builder = $db->table('stockout');
        $builder->select('stockout.*');
        $builder->where('stockout.random', $id);
        $data3 = $builder->get()->getResultArray();

        $builder14 = $db->table('stockout');
        $builder14->select('stockout.*');
        $builder14->where('stockout.random', $id);
        $data14 = $builder14->get()->getResultArray();

        $builder13 = $db->table('masterlist');
        $builder13->select('masterlist.*');
        $builder13->where('masterlist.random', $id);
        $data13 = $builder13->get()->getResultArray();

        $builder33 = $db->table("tempinsert");
        $builder33->select('tempinsert.*');
        $data1 = $builder33->get()->getResultArray();

        foreach($data3 as $r) {
            if(!$data1){
            $db->table('tempinsert')->insert($r);
            }
            
        }

        $update = [
            'customer' => '',
            'terms' => $sess
        ];

        $builder113 = $db->table('tempinsert');
        $builder113->select('tempinsert.*');
        $builder113->where('tempinsert.random', $id);
        // $data113  = $builder113->get()->getResultArray();
        $builder113->update($update);
        // echo '<pre>';
        // print_r($data113);
        // exit;

        foreach($data14 as $s) {
        if(!$data13){
        $db->table('masterlist')->insert($s);
        }
        else{
        $db->table('masterlist')->update($s);

        }
        }

        

        $builder10 = $db->table('product');
        $builder10->select('product.*');
        $builder10->where('product.random', $id);
        $data10 = $builder10->get()->getResultArray();

        $builder11 = $db->table("dcustomer");
        $builder11->select('dcustomer.*');
        $builder11->where('dcustomer.random', $id);
        $data11 = $builder11->get()->getResultArray();
       
        foreach($data10 as $c) {
            if(!$data11){
            $db->table('dcustomer')->insert($c);
            }
            else{
            $db->table('dcustomer')->update($c);
            }
            
            $db->table('dcustomer')->update(['vendor' => $sess]);
        }


        $delete1 = $db->table('product');
        $delete1->select('product.*');
        $delete1->where('product.random', $id);
        $delete1->delete();

        $delete1 = $db->table('product2');
        $delete1->select('product2.*');
        $delete1->where('product2.ref', $id);
        $delete1->delete();

        $delete = $db->table('stockout');
        $delete->select('stockout.*');
        $delete->where('stockout.random', $id);
        $delete->delete();

        return redirect()->to(base_url('/ProductsCrud/delv'));
    }

    public function editcredit($id)
    {
        $db      = \Config\Database::connect();
        $clear = $db->table("tcredit");
        $clear->select('tcredit.*');
        $clear->emptyTable();

        $deletew = $db->table('warrantyin');
        $deletew->select('warrantyin.*');
        $deletew->where('warrantyin.random', $id);
        $deletew->delete();

        $builder = $db->table('credit');
        $builder->select('credit.*');
        $builder->where('credit.random', $id);
        $data3 = $builder->get()->getResultArray();

        $builder14 = $db->table('credit');
        $builder14->select('credit.*');
        $builder14->where('credit.random', $id);
        $data14 = $builder14->get()->getResultArray();

        $builder13 = $db->table('warrantyin');
        $builder13->select('warrantyin.*');
        $builder13->where('warrantyin.random', $id);
        $data13 = $builder13->get()->getResultArray();

        $builder33 = $db->table("tcredit");
        $builder33->select('tcredit.*');
        $data1 = $builder33->get()->getResultArray();

        foreach($data3 as $r) {
            if(!$data1){
            $db->table('tcredit')->insert($r);
            }
            else{
            $db->table('tcredit')->update($r);
            }
        }
        foreach($data14 as $s) {
            if(!$data13){
            $db->table('warrantyin')->insert($s);
            }
            else{
            $db->table('warrantyin')->update($s);

            }
        }

        $builder10 = $db->table('tcustomer');
        $builder10->select('tcustomer.*');
        $builder10->where('tcustomer.random', $id);
        $data10 = $builder10->get()->getResultArray();

        $builder11 = $db->table("tcustomer4");
        $builder11->select('tcustomer4.*');
        $builder11->where('tcustomer4.random', $id);
        $data11 = $builder11->get()->getResultArray();
       
        foreach($data10 as $c) {
            if(!$data11){
            $db->table('tcustomer4')->insert($c);
            }
            else{
            $db->table('tcustomer4')->update($c);
            }
        }


        $delete1 = $db->table('tcustomer');
        $delete1->select('tcustomer.*');
        $delete1->where('tcustomer.random', $id);
        $delete1->delete();

        $delete1 = $db->table('ccredit');
        $delete1->select('ccredit.*');
        $delete1->where('ccredit.ref', $id);
        $delete1->delete();

        $delete = $db->table('credit');
        $delete->select('credit.*');
        $delete->where('credit.random', $id);
        $delete->delete();

        return redirect()->to(site_url('/credit'));
    }

    public function editwarranty1($id)
    {
        $db      = \Config\Database::connect();
        $clear = $db->table("warrantyi");
        $clear->select('warrantyi.*');
        $clear->emptyTable();

        $builder = $db->table('warrantyout');
        $builder->select('warrantyout.*');
        $builder->where('warrantyout.random', $id);
        $data3 = $builder->get()->getResultArray();

        $builder33 = $db->table("warrantyi");
        $builder33->select('warrantyi.*');
        $data1 = $builder33->get()->getResultArray();

        foreach($data3 as $r) {
            if(!$data1){
            $db->table('warrantyi')->insert($r);
            $db->table('warrantyin')->insert($r);
            }
            else{
            $db->table('warrantyi')->update($r);
            $db->table('warrantyin')->update($r);

            }
        }
        $delete = $db->table('warrantyout');
        $delete->select('warrantyout.*');
        $delete->where('warrantyout.random', $id);
        $delete->delete();

        $builder10 = $db->table('customer2');
        $builder10->select('customer2.*');
        $builder10->where('customer2.random', $id);
        $data10 = $builder10->get()->getResultArray();

        $builder11 = $db->table("customer1");
        $builder11->select('customer1.*');
        $data11 = $builder11->get()->getResultArray();
       
        foreach($data10 as $c) {
            if(!$data1){
            $db->table('customer1')->insert($c);
            }
            else{
            $db->table('customer1')->update($c);
            }
        }
        $delete1 = $db->table('customer2');
        $delete1->select('customer2.*');
        $delete1->where('customer2.random', $id);
        $delete1->delete();

        $delete1 = $db->table('customer3');
        $delete1->select('customer3.*');
        $delete1->where('customer3.ref', $id);
        $delete1->delete();

        return redirect()->to(site_url('/warrant'));
    }

    public function warrantyclear()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table("warrantyi");
        $builder->select('warrantyi.*');
        $builder->emptyTable();

        $builder4 = $db->table("customer1");
        $builder4->select('customer1.*');
        $builder4->emptyTable();
        return redirect()->to('ProductsCrud/warrant')->with('status' , 'cleared successfully');
    }


    public function delvclear()
    {
        $db      = \Config\Database::connect();
        $sess = session()->get('user_name');
        $builder = $db->table("dcustomer");
        $builder->select('dcustomer.*');
        $builder->emptyTable();
        $builder4 = $db->table("tempinsert");
        $builder4->select('tempinsert.*');
        $builder4->where('terms', $sess);
        $builder4->delete();
        return redirect()->to('ProductsCrud/delv')->with('status' , 'cleared successfully');
    }


    

    public function creditclear()
    {
        $db      = \Config\Database::connect();

        $builder = $db->table("tcredit");
        $builder->select('tcredit.*');
        $builder->emptyTable();
        $builder4 = $db->table("tcustomer4");
        $builder4->select('tcustomer4.*');
        $builder4->emptyTable();
        return redirect()->to(site_url('/credit'))->with('status' , 'cleared successfully');
    }


    public function fualtynote()
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
        $builder5 = $db->table('customer');
        $builder5->select('customer.*')->orderBy('username', 'ASC');;
        $data['customer'] = $builder5->get()->getResult();

        $db      = \Config\Database::connect();
        $builder = $db->table('tfaultyout');
        $builder->select('tfaultyout.*');
        $data['masterlist'] = $builder->get()->getResult();
        // $data['user_data'] = $session->get('designation');

            $db      = \Config\Database::connect();
            $builder6 = $db->table('customerfo');
            $builder6->select('customerfo.*');        
            $data['customers'] = $builder6->get()->getResult();

        return view('products/fualtynote', $data);
    }

    public function debitnote()
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
        $submit = [
            'fname' => $this->request->getPost('fname'),
            'random' => $this->request->getPost('random'),
        ];
        $db      = \Config\Database::connect();
        $builder5 = $db->table('vendors');
        $builder5->select('vendors.*')->orderBy('username', 'ASC');;
        $data['customers'] = $builder5->get()->getResult();

        $db      = \Config\Database::connect();
        $builder = $db->table('tdebit');
        $builder->select('tdebit.*')->orderBy('id', 'DESC');
        $data['masterlist'] = $builder->get()->getResult();
        $db      = \Config\Database::connect();
        $builder6 = $db->table('tvendors');
        $builder6->select('tvendors.*');        
        $data['customer'] = $builder6->get()->getResult();
        return view('products/debit', $data);
    }

    public function delv()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
        $sess = session()->get('user_name');

        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $builder5 = $db->table('customer');
        $builder5->select('customer.*')->orderBy('username', 'ASC');
        $data['customers'] = $builder5->get()->getResult();

        $db      = \Config\Database::connect();
        $builder = $db->table('tempinsert');
        $builder->select('tempinsert.*');
        $builder->where('terms', $sess);

        $builder1 = $db->table('dcustomer');
        $builder1->select('dcustomer.*');
        $builder1->where('vendor', $sess);
        $data['customer'] = $builder1->get()->getResult();
        $data['masterlist'] = $builder->get()->getResult();
        $data['num'] = count($data['masterlist']);
        return view('products/deliver', $data);
    }
    public function delvs()
    {
        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('masterlist');   
        $query = $builder->like('assetid', $this->request->getVar('term'))
                    ->select('')
                    ->limit(10)->get();
        $data = $query->getResult();
        foreach($data as $d){

        }
 
        echo json_encode($data);
    }

    public function faultysub()
    {
        try{
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'serialno' => $this->request->getPost('serialno'),
            'random' => $this->request->getPost('random'),
        ];
        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $builder->like('assetid', $data['serialno']);
        $builder->orLike('random', $data['serialno']);
        $data1 = $builder->get()->getResultArray();
        $builder1 = $db->table("tfaultyout");
        $builder1->select('tfaultyout.*');
        $builder1->where('tfaultyout.assetid', $data['serialno']);
        $data2 = $builder1->get()->getResultArray();
        foreach($data1 as $r) {           
        if(!$data2){
            $db->table('tfaultyout')->insert($r);
        }
        else{
            $db->table('tfaultyout')->update($r);
        }
        $builder1->update(['random' => $data['random']]);
        // $builder->delete(['assetid' => $data['serialno']]); 
        }
        return redirect()->to('ProductsCrud/fualtynote');
    } catch (\Exception $e) {
        // exit($e->getMessage());
        return redirect()->to('ProductsCrud/fualtynote');
    }
    }

    public function debitsub()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'serialno' => $this->request->getPost('serialno'),
            'random' => $this->request->getPost('random'),
        ];
        $builder = $db->table("masterlist");
        $builder->select('masterlist.*');
        $builder->where('masterlist.assetid', $data['serialno']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("tdebit");
        $builder1->select('tdebit.*');
        $builder1->where('tdebit.assetid', $data['serialno']);
        $data2 = $builder1->get()->getResultArray();

        foreach($data1 as $r) {
            if(!$data2){
            $db->table('tdebit')->insert($r);
        }
        
        $builder1->update(['random' => $data['random']]);
        }

        return redirect()->to('ProductsCrud/debitnote'); 

    }
   
    public function delvsub()
    {
        try{
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'serialno' => $this->request->getPost('serialno'),
            'random' => $this->request->getPost('random'),
        ];

        $builder = $db->table("masterlist");
        $builder->select('masterlist.*');
        $builder->where('assetid', $data['serialno']);
        // $builder->orLike('random', $data['serialno']);
        $data1 = $builder->get()->getResultArray();
        $data22 = [
            'random' => $this->request->getPost('random'),
            'terms' => session()->get('user_name')
        ];

        $builder1 = $db->table("tempinsert");
        $builder1->select('*');
        $builder1->where('assetid', $data['serialno']);
        $data2 = $builder1->get()->getResult();

        foreach($data1 as $r) {           
        if(!$data2){
            $db->table('tempinsert')->insert($r);
        }
        else{
            $db->table('tempinsert')->insert($r);
        }
        $builder1->update($data22);
        }
        return redirect()->to('ProductsCrud/delv');


    } catch (\Exception $e) {
        // exit($e->getMessage());
        return redirect()->to('ProductsCrud/delv');
  
    }

    }
  
    
    public function deliverr(Type $var = null)
    {
        if($this->request->getMethod()=='post'){
            $productM = new ProductM(); 
            $productM->save($_POST); 
          }
          return $this->response->redirect(site_url('/delivery-create'));
    }
    //   invoice panel
    
    public function storeie()
    {
        $submit = [
            'fname' => $this->request->getPost('fname'),
            'random' => $this->request->getPost('random'),
        ];
        $db      = \Config\Database::connect();
        $builder = $db->table('tinvoicecreate');
        $builder->select('tinvoicecreate.*');

        $builder = $db->table('customer');
        $builder->select('customer.*');
        $data['customers'] = $builder->get()->getResult();

        $builder14 = $db->table('type');
        $builder14->select('*');
        $data['type'] = $builder14->get()->getResult();
        
        $builder7 = $db->table('customerin');
        $builder7->select('customerin.*');
        $data['customer'] = $builder7->get()->getResult();

        $builder = $db->table('tinvoicecreate');
        $builder->select('tinvoicecreate.*');
        $data['masterlist'] = $builder->get()->getResultArray();

        $session = \Config\Services::session();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');
            return view('products/invoiceCreate', $data);
    }

    public function invsub()
    {
        helper(['form', 'url']);
        $db      = \Config\Database::connect();
        $data1 = array();
        $data = [
            'random' => $this->request->getVar('random'),
            'serialno' => $this->request->getPost('serialno'),
        ];
        $builder = $db->table("stockout");
        $builder->select('stockout.*, product.*, sum(stockout.qty) as tqty');
        $builder->join('product', ' stockout.random = product.random', "right");
        $builder->where('stockout.random', $data['random']);
        $data1 = $builder->get()->getResultArray();

        $builder1 = $db->table("tempinvoice");
        $builder1->select('tempinvoice.*');
        $data2 = $builder1->get()->getResultArray();
        foreach($data1 as $r) { 
        if(!$data2){
            $db->table('tempinvoice')->insert($r);
        }
    
    }
        return redirect()->to('ProductsCrud/storeie');
    }

    public function faulty()
    {
        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data1['user_data'] = $session->get('designation');


        $db      = \Config\Database::connect();
        $builder12 = $db->table('condition');
        $builder12->select('condition.*');
        $data1['condition'] = $builder12->get()->getResult();

        $builder2 = $db->table('brand');
        $builder2->select('brand.*');
        $data1['brand'] = $builder2->get()->getResult();

        $builder3 = $db->table('type');
        $builder3->select('type.*');
        $data1['type'] = $builder3->get()->getResult();


        $db      = \Config\Database::connect();

        $builder = $db->table("faulty");
        $builder->select('faulty.*');
        $data1['faulty'] = $builder->get()->getResult();
        return View('/products/faulty', $data1);
    }

    // manual delivery fpdf
    public function mdelvout(){
        $session = \Config\Services::session();
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
        $db      = \Config\Database::connect();
        $increment = $db->table("product2");
        $increment->selectMax('product2.delvnote');
        $increment1 = $increment->get()->getResultArray();
        $inc = $increment1[0]['delvnote'];

        if($x = $inc){
        $incc1 = $db->table("dcustomer");
        $incc1->selectMax('dcustomer.delvnote');
        $sss1 = $incc1->get()->getResultArray();
        $nn = $sss1[0]['delvnote'];
            if(!$nn){
                $x = $inc;
                for($i = 0; $i < 1; $i++) {
                    $x++;
                    $incs =[ $x, ];
        $incc = $db->table("dcustomer");
        $incc->select('dcustomer.*');
        $incc->where('dcustomer.delvnote');
        $sss = $incc->get()->getResultArray();
        $incc->update(['delvnote' => $incs]);
        }
    }  
        }else{
         
            for($i = 0; $i < 1; $i++) {
            $x = $x++;
            $incc = $db->table("dcustomer");
            $incc->select('dcustomer.*');
            $incc->where('dcustomer.delvnote');
            $incc->update(['delvnote' => $data['delvnote']]);
            $incc->update(['delvnote' => $data['delvnote']]);
            }
        }

        $db      = \Config\Database::connect();
        $builder999 = $db->table("tmdelivery");
        $builder999->select('tmdelivery.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder9999 = $db->table("dcustomer");
        $builder9999->select('dcustomer.delvnote');
        $num9999 = $builder9999->countAll();
        if($num9999 < 1){
            return redirect()->back()->with('status', 'kindly fill the customer details and retry');
        }
        $db      = \Config\Database::connect();
        $builder103 = $db->table("tmdelivery");
        $builder103->select('tmdelivery.*');
        $data103 = $builder103->get()->getResultArray();
        $builder103->update(['random' => $data['random']]);

        $builder134 = $db->table("dcustomer");
        $builder134->select('dcustomer.*');
        $data134 = $builder134->get()->getResultArray();
        $builder134->update(['random' => $data['random']]);
        $builder134->update(['user_name' => $data['user_name']]);


        $builder33 = $db->table("tmdelivery");
        $builder33->select('tmdelivery.*');
        $data1 = $builder33->get()->getResultArray();

        $builder10 = $db->table("mdelivery");
        $builder10->select('mdelivery.*');
        $data10 = $builder10->get()->getResult();

       

        foreach($data1 as $r) {
           
            $db->table('mdelivery')->insert($r);
        }

        $builder4 = $db->table("dcustomer");
        $builder4->select('dcustomer.*');
        $data4 = $builder4->get()->getResultArray();
        
        $builder3 = $db->table("product");
        $builder3->select('product.*');
        $data3 = $builder3->get()->getResultArray();

        foreach($data4 as $c) { 
            $db->table('product')->insert($c);
        }
        $builder4->emptyTable();
        
        $builder = $db->table('mdelivery');
        $builder->select('mdelivery.*, product.*, ');
        $builder->join('product', ' mdelivery.random = product.random', "left");
        $builder->where('mdelivery.random', $data['random']);
        $builder->groupBy('description');
        $builder->orderBy('mdelivery.id', 'ASC');
        $data5['items'] = $builder->get()->getResult();
        $num = $builder->countAll();


        if($num < 1){
            return redirect()->back()->with('status', 'kindly fill the fields and retry');
        }
        $builder->emptyTable();
        $builder33->emptyTable();
        return View('/products/manualpdf', $data5);

    }
    
    // creating invoice fpdf
    public function invout()
    {

        // isLoggedIn
        $session = \Config\Services::session();
        $data = [
            'user_name' => $session->get('user_name'),
            'random' => $this->request->getVar('random'),
            $x = 'AA000',

            'invno' => 'AA000',
        ];
            $db      = \Config\Database::connect();
            $increment = $db->table("invoicecreate");
            $increment->selectMax('invoicecreate.invno');
            $increment1 = $increment->get()->getResultArray();
            $inc = $increment1[0]['invno'];

            if($x = $inc){
            $incc1 = $db->table("customerin");
            $incc1->selectMax('customerin.invno');
            $sss1 = $incc1->get()->getResultArray();
            $nn = $sss1[0]['invno'];
            if(!$nn){
                $x = $inc;
                for($i = 0; $i < 1; $i++) {
                    $x++;
                    $incs =[ $x, ];
            $incc = $db->table("customerin");
            $incc->select('customerin.*');
            $incc->where('customerin.invno');
            $sss = $incc->get()->getResultArray();
            $incc->update(['invno' => $incs]);
        }
    }  
        }else{
         
            for($i = 0; $i < 1; $i++) {
            $x = $x++;
            $incc = $db->table("customerin");
            $incc->select('customerin.*');
            $incc->where('customerin.invno');
            $incc->update(['invno' => $data['invno']]);
            $incc->update(['invno' => $data['invno']]);
            }
    }
        $db      = \Config\Database::connect();
        $builder999 = $db->table("tinvoicecreate");
        $builder999->select('tinvoicecreate.assetid');
        $num999 = $builder999->countAll();
        if($num999 < 1){
            return redirect()->back()->with('status', 'kindly scan items and retry');
        }

        $db      = \Config\Database::connect();
        $builder9999 = $db->table("customerin");
        $builder9999->select('customerin.assetid');
        $num9999 = $builder9999->countAll();
        if($num9999 < 1){
            return redirect()->back()->with('status', 'kindly fill the customer details and retry');
        }
        $db      = \Config\Database::connect();
        $builder103 = $db->table("tinvoicecreate");
        $builder103->select('tinvoicecreate.*');
        $data103 = $builder103->get()->getResultArray();
        $builder103->update(['random' => $data['random']]);

        $builder134 = $db->table("customerin");
        $builder134->select('customerin.*');
        $data134 = $builder134->get()->getResultArray();
        $builder134->update(['random' => $data['random']]);
        $builder134->update(['user_name' => $data['user_name']]);


        $builder33 = $db->table("tinvoicecreate");
        $builder33->select('tinvoicecreate.*');
        $data1 = $builder33->get()->getResultArray();

        $builder10 = $db->table("tinvoicecreate1");
        $builder10->select('tinvoicecreate1.*');
        $data10 = $builder10->get()->getResult();

        foreach($data1 as $r) {
            
            $db->table('tinvoicecreate1')->insert($r);
        }

        $builder34 = $db->table("customerin");
        $builder34->select('customerin.*');
        $data2 = $builder34->get()->getResultArray();

        $builder2 = $db->table("customerinv");
        $builder2->select('customerinv.*');
        $data2 = $builder2->get()->getResultArray();

        $builder3 = $db->table("customerin");
        $builder3->select('customerin.*');
        $data3 = $builder3->get()->getResultArray();
        
        foreach($data3 as $r) { 

            $db->table('customerinv')->insert($r);
        }
        $builder3->emptyTable();
        
        $builder = $db->table('tinvoicecreate');
        $builder->select('tinvoicecreate.*, customerinv.*, ');
        $builder->join('customerinv', ' tinvoicecreate.random = customerinv.random', "left");
        $builder->where('tinvoicecreate.random', $data['random']);
        $builder->groupBy('description');
        $builder->orderBy('tinvoicecreate.id', 'ASC');
        $data5['items'] = $builder->get()->getResult();
        $num = $builder->countAll();


        if($num < 1){
            return redirect()->back()->with('status', 'kindly fill the fields and retry');
        }
        $builder->emptyTable();
        $builder33->emptyTable();
        $builder3->emptyTable();
        return View('/products/invoicepdf', $data5);
    }

    public function deleteve($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("vproduct");
        $builder->select('vproduct.*');
        $builder->where('vproduct.document', $id);
        $builder->delete();
        
        return redirect()->back()->with('status', 'Item deleted succesfully');
    }

    // deleting invoice
    public function deleteInvoice($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("invoicecreate");
        $builder->select('invoicecreate.*');
        $builder->where('invoicecreate.id', $id);
        $builder->delete();
        
        return redirect()->to(base_url('ProductsCrud/invoicePage'))->with('status', 'Invoice deleted succesfully');
    }

    public function warrantyadd() {

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
         $builder1 = $db->table('customer3');
         $builder1->select('customer3.*')->orderBy('wnote', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('customer3.*');
        $builder1->like('fname', $q);
        $builder1->orLike('lname', $q);
        $builder1->orLike('location', $q);
        $builder1->orLike('ref', $q);
        $builder1->orLike('date', $q);
        $builder1->orLike('document', $q);

        $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/warrantyadd', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder1->get()->getResult();
            return view('products/warrantyadd', $data);
        
        }
    }
    public function creditadd()
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
        $builder1 = $db->table('ccredit');
        $builder1->select('ccredit.*')->orderBy('ccredit', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('ccredit.*');
        $builder1->like('fname', $q);
        $builder1->orlike('ccredit', $q);
        $builder1->orlike('credit', $q);
        $builder1->orLike('lname', $q);
        $builder1->orLike('location', $q);
        $builder1->orLike('ref', $q);
        $builder1->orLike('date', $q);
        $builder1->orLike('document', $q);

        $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/creditadd', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/creditadd', $data);
        
        }

    }

    public function storei() {
        
        if($this->request->getMethod()=='post'){
          $productM = new ProductM(); 
          $productM->save($_POST); 
        }
        return $this->response->redirect(site_url('/invoice-page'));
    }
    public function invoicePage()
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
        $builder1 = $db->table('invoicecreate');
        $builder1->select('invoicecreate.*')->orderBy('invno', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('invoicecreate.*');
        $builder1->like('fname', $q);
        $builder1->orLike('lname', $q);
        $builder1->orLike('invno', $q);
        $builder1->orLike('phone', $q);
        $builder1->orLike('location', $q);
        $builder1->orLike('ref', $q);
        $builder1->orLike('date', $q);
        $builder1->orLike('document', $q);
        $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/invoice', $data);
           
        } elseif(!$this->request->getGet('q')) {
            $data['invoicecreate'] = $builder1->get()->getResult();
        return view('products/invoice', $data);
        
        }

    }

    public function invoiceView()
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
        $productM = new ProductM();
        $data['invoicecreate'] = $productM->orderBy('id', 'DESC')->findAll();
        return view('products/invoice_view', $data);
    }
    public function invoiceViewid($id = null){
        helper(['form', 'url']);
        $productM = new ProductM();
        $data['invoicecreate'] = $productM->where('id', $id)->first();
        return view('products/invoice_viewed', $data);
    }
    
    public function singleProductf($id)
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
        $builder->select('faulty.*');
        $builder->where('id', $id);
        $data['user_obj'] = $builder->get()->getResult();
        return view('/products/edit_productf', $data);
    }

    public function singleProduct($id){
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $productModel = new ProductModel();
        $data['user_obj'] = $productModel->where('id', $id)->first();
        return view('/products/edit_product', $data);
    }


    public function singleProductw($id){
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $data['user_data'] = $session->get('designation');

        $builder = $db->table('warrantyin');
        $builder->select('*');
        $builder->where('id', $id);
        $data['user_obj'] = $builder->get()->getResultArray();

        $db      = \Config\Database::connect();
        
        $builder1 = $db->table('condition');
        $builder1->select('condition.*');
        $data['condition'] = $builder1->get()->getResult();

        $builder2 = $db->table('brand');
        $builder2->select('brand.*');
        $data['brand'] = $builder2->get()->getResult();

        $builder3 = $db->table('type');
        $builder3->select('type.*');
        $data['type'] = $builder3->get()->getResult();

        $builder4 = $db->table('Gen');
        $builder4->select('Gen.*');
        $data['gen'] = $builder4->get()->getResult();

        $builder5 = $db->table('Cpu');
        $builder5->select('Cpu.*');
        $data['cpu'] = $builder5->get()->getResult();

        $builder6 = $db->table('Speed');
        $builder6->select('Speed.*');
        $data['speed'] = $builder6->get()->getResult();

        $builder7 = $db->table('Ram');
        $builder7->select('Ram.*');
        $data['ram'] = $builder7->get()->getResult();

        $builder8 = $db->table('Hdd');
        $builder8->select('Hdd.*');
        $data['hdd'] = $builder8->get()->getResult();

        $builder9 = $db->table('Screen');
        $builder9->select('Screen.*');
        $data['screen'] = $builder9->get()->getResult();

        $builder10 = $db->table('customer');
        $builder10->select('customer.*');
        $data['customer'] = $builder10->get()->getResult();
        // exit;
        return view('/products/edit_productw', $data);
    }

    public function updatef()
    {
        $db      = \Config\Database::connect();
        $id = $this->request->getVar('id');

        $builder = $db->table('faulty');
        $builder->select('faulty.*');

        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'assetid' => $this->request->getVar('assetid'),
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'brand' => $this->request->getVar('brand'),
            'model' => $this->request->getVar('model'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'daterecieved' => $this->request->getVar('daterecieved'),
            'datedelivered' => $this->request->getVar('datedelivered'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),

            'status' => $this->request->getVar('status'),
            'customer' => $this->request->getVar('customer'),
        ];
        $builder->where('id', $id);
        $builder->update($data);
        return $this->response->redirect(site_url('/fualty-stock'));
    }
    public function update(){
        // $productModel = new ProductModel();
        $id = $this->request->getVar('id');
        
        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'assetid' => $this->request->getVar('assetid'),
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'brand' => $this->request->getVar('brand'),
            'model' => $this->request->getVar('model'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'daterecieved' => $this->request->getVar('daterecieved'),
            'datedelivered' => $this->request->getVar('datedelivered'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),
            'status' => $this->request->getVar('status'),
            'customer' => $this->request->getVar('customer'),
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('masterlist');
        $builder->select('masterlist.*');
        $builder->where('id', $id);
        $builder->update($data);
        // $productModel->update($id, $data);
        return $this->response->redirect(site_url('/stock-view'));
    }


    public function updatew(){
        // $productModel = new ProductModel();
        $id = $this->request->getVar('id');
        
        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'assetid' => $this->request->getVar('assetid'),
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'brand' => $this->request->getVar('brand'),
            'model' => $this->request->getVar('model'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'daterecieved' => $this->request->getVar('daterecieved'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),
            'status' => $this->request->getVar('status'),
            'customer' => $this->request->getVar('customer'),
        ];

        $db      = \Config\Database::connect();
        $builder = $db->table('warrantyin');
        $builder->select('warrantyin.*');
        $builder->where('id', $id);
        $builder->update($data);
        return $this->response->redirect(site_url('/warranty'));
    }

    public function delete($id){
        $productModel = new ProductModel();

        $db      = \Config\Database::connect();
        $builder = $db->table('masterlist');
        $builder->select('masterlist.*');
        $builder->where('assetid', $id);
        $data = $builder->get()->getResultArray();

        $builder12 = $db->table('recycle');
        $builder12->select('*');
        $builder12->where('assetid' , $id);
        $data12 = $builder12->get()->getResult();

        foreach($data as $d){
            if(!$data12)
            {
                $builder12->insert($d);
                // Wp283894
            }
            else{
                $builder122 = $db->table('recycle');
                $builder122->select('*');
                $builder122->where('assetid' , $id);
                $builder122->update($d);
            }
        }
        $builder12->update(['tbl' => 'masterlist']);
        $builder = $db->table('masterlist');
        $builder->select('masterlist.*');
        $builder->where('assetid', $id);
        $builder->delete();

        return redirect()->back()->with('status', 'Deleted succesfully');
    } 
    public function deletef($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('faulty');
        $builder->select('*');
        $builder->where('assetid', $id);
        $data = $builder->get()->getResultArray();
        
        $builder1 = $db->table('recycle');
        $builder1->select('*');
        $builder1->where('assetid', $id);
        $data1 = $builder1->get()->getResultArray();

        foreach($data as $d){
            if(!$data1){
                $builder1->insert($d);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('assetid', $id);
                $builder11->update($d);
            }
        }

        $builder = $db->table('faulty');
        $builder->select('*');
        $builder->where('assetid', $id);
        $builder->delete(); 
        return redirect()->back()->with('status', 'Item deleted successfully');


    }

    public function deletefo($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('faultyout');
        $builder->select('*');
        $builder->where('assetid', $id);
        $data = $builder->get()->getResultArray();
        
        $builder1 = $db->table('recycle');
        $builder1->select('*');
        $builder1->where('assetid', $id);
        $data1 = $builder1->get()->getResultArray();

        foreach($data as $d){
            if(!$data1){
                $builder1->insert($d);
            }
            else{
                $builder11 = $db->table('recycle');
                $builder11->select('*');
                $builder11->where('assetid', $id);
                $builder11->update($d);
            }
        }

        $builder = $db->table('faultyout');
        $builder->select('*');
        $builder->where('assetid', $id);
        $builder->delete(); 
        return redirect()->back()->with('status', 'Item deleted successfully');
    }

     public function deletem($id = null){
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->where('id', $id)->delete($id);
        return redirect()->to(base_url('ProductsCrud/inventoryView'))->with('status', 'Deleted succesfully');
      
    }  

    function action()
    {
        if($this->request->getVar('action'))
        {
            $action = $this->request->getVar('action');

            if($action == 'get_type')
            {
                $productModel = new ProductModel();

                $typedata = $productModel->where('type', $this->request->getVar('type'))->findAll();

                echo json_encode($typedata);
            }

            if($action == 'get_gen')
            {
                $productModel = new ProductModel();
                $gendata = $productModel->where('gen', $this->request->getVar('gen'))->findAll();

                echo json_encode($gendata);
            }
        }
    }
    public function multiple(){
        $productModel = new ProductModel();
        $db      = \Config\Database::connect();
        $builder = $db->table('masterlist');
        $query   = $builder->get(2, 4);
        $data['masterlist'] = $productModel->orderBy('id', 'ASC')->findAll();

        return view('products/multiple', $data);
    }  
    public function multiples()
    {
      $rand = rand(10000, 99999);
      $TempModel = new TempModel();
        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'screen' => $this->request->getVar('screen'),
            'hdd' => $this->request->getVar('hdd'),
            'vendor' => $this->request->getVar('vendor'),
            'qty' => $this->request->getVar('qty'),
        ];
        

        for ($i=0; $i <$data['qty'] ; $i++) { 
           
            $rand     = $this->request->$_POST('assetid');
            $tempModel->insert($data);
           
        }
        
        return $this->response->redirect(site_url('/products-form'));
    }
    public function deletes($id){
        $db      = \Config\Database::connect();
        $builder= $db->table('warrantyin');
        $builder->select('*');
        $builder->where('id', $id);
        $builder->delete();
        return redirect()->back()->with('status', 'deleted successfully');
    }
}