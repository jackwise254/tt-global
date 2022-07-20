<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
// use App\Models\Barcode39;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Libraries\Barcode39;

  
class Warranty extends Controller
{
    public function index()
    {
        $session = session();
        echo "Hello : ".$session->get('name');
    }
      //loading warranty csv page
      public function wload()
      {
          
          $db      = \Config\Database::connect();
          $builder = $db->table('wtemplist');
          $builder->select('wtemplist.*');
          $data['wtemplist'] = $builder->get()->getResult();
  
          $cart = array();
          $cart2 = array();
          $cart4 = array();
  
  
          foreach($data['wtemplist'] as $p){
              $m = $p->del;
              $cart[] = $m; 
          }
  
          $data2['single'] = array_unique($cart);
          
          foreach($data2['single'] as $s){
          $singles = $s;
          $cart2 = 0;
  
          $builder = $db->table('wtemplist');
          $builder->select('wtemplist.*');
          $builder->where('wtemplist.del', $singles);
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

            
            $db      = \Config\Database::connect();
            $builder = $db->table('customer');
            $builder->select('customer.*');
             $cart4['user_data'] = $session->get('designation');

            $cart4['customer'] = $builder->get()->getResult();
              return view('products/wuploadCsv', $cart4);
          }else{
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $cart4['user_data'] = $session->get('designation');
              $cart4['all'] = $cart;
              $db      = \Config\Database::connect();
                $builder = $db->table('customer');
                $builder->select('customer.*');
                 $cart4['user_data'] = $session->get('designation');

                $cart4['customer'] = $builder->get()->getResult();
              return view('products/wuploadCsv', $cart4);
          }
          
      }

      //calling warranty in form
      public function wcreate(){

        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');
        
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

        $builder10 = $db->table('customer');
        $builder10->select('customer.*');
        $cart4['customer'] = $builder10->get()->getResult();

        return view('/products/add_wproducts', $cart4);



    }

        public function wstore() {
        helper('html');
        $del = rand(10000000, 99999999);
        $db      = \Config\Database::connect();
        $builder = $db->table('wtemplist');
        require ('../vendor/autoload.php');
        $qty = $this->request->getVar('qty');
            $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'del' => $del,
            'random' => $del,
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
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('comment'),
            'customer' => $this->request->getVar('customer'),
        ];

        for ($i=0; $i <$qty; $i++) { 
           $assid = 'Wp'.rand(100000, 999999);
            $data['assetid'] = $assid;
            $builder->insert($data);
       
        }

       
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
          
            $db->table('wicustomer')->insert($r);
        }

        $builder1000 = $db->table("wicustomer");
        $builder1000->select('wicustomer.*');
        $builder1000->where('username', $data1['username']);
        $builder1000->update(['random' => $data5['random']]);
       
        return redirect()->to(base_url('Warranty/wload'))->with('status', 'Products Inserted succesfully');
}

//warranty out form
public function warrantyout()
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
        $builder1 = $db->table('warrantyout');
        $builder1->select('warrantyout.*');
        $data['warrantyout'] = $builder1->get()->getResult();

    
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('warrantyout.*');
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


        $data['warrantyout'] = $builder1->get()->getResult();
        
       return view('products/warrantyout', $data);
           

        } elseif(!$this->request->getGet('q')) {
            $data['masterlist'] = $builder1->get()->getResult();

            helper(['url', 'form']);
            return view('products/warrantyout', $data);
        }
    }

//faulty stock operations
public function load()
      {
          $db      = \Config\Database::connect();
          $builder = $db->table('wtemplist');
          $builder->select('wtemplist.*');
          $data['wtemplist'] = $builder->get()->getResult();
  
          $cart = array();
          $cart2 = array();
          $cart4 = array();
  
  
          foreach($data['wtemplist'] as $p){
              $m = $p->del;
              $cart[] = $m; 
          }
  
          $data2['single'] = array_unique($cart);
          
          foreach($data2['single'] as $s){
          $singles = $s;
          $cart2 = 0;
  
          $builder = $db->table('wtemplist');
          $builder->select('wtemplist.*');
          $builder->where('wtemplist.del', $singles);
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
              return view('products/wuploadCsv', $cart4);
          }else{
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $cart4['user_data'] = $session->get('designation');
              $cart4['all'] = $cart;
              return view('products/faultyCsv', $cart4);
          }
          
      }

      //calling warranty in form
      public function create(){
        $session = \Config\Services::session();

        $db      = \Config\Database::connect();

        $builder1 = $db->table('users');
        $builder1->select('users.*');
        $builder1->where('users.designation = "admin" ' );
        $sdata['hello'] = $builder1->get()->getResultArray();
        $session->set($sdata);
        $cart4['user_data'] = $session->get('designation');

        $db      = \Config\Database::connect();
        $builder = $db->table('dropdown');
        $builder->select('dropdown.*');
        $cart4['masterlist'] = $builder->get()->getResult();

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

        return view('/products/add_faulty', $cart4);
    }

    public function tload()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tfaulty');
        $builder->select('tfaulty.*');
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

        $builder = $db->table('tfaulty');
        $builder->select('tfaulty.*');
        $builder->where('tfaulty.del', $singles);
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

            $db      = \Config\Database::connect();
            $builder = $db->table('vendors');
            $builder->select('vendors.*');
            $cart4['customer'] = $builder->get()->getResult();

            return view('products/loadfaulty', $cart4);
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


            $db      = \Config\Database::connect();
        $builder = $db->table('vendors');
        $builder->select('vendors.*');
        $cart4['customer'] = $builder->get()->getResult();
        }
        return view('/products/loadfaulty', $cart4);
    }

        public function store() {
        helper('html');
        $del = rand(10000000, 99999999);
        $db      = \Config\Database::connect();
        $builder = $db->table('tfaulty');
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
            'daterecieved' => $this->request->getVar('daterecieved'),
            'datedelivered' => $this->request->getVar('datedelivered'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'problem' => $this->request->getVar('problem'),
            'vendor' => $this->request->getVar('vendor'),
        ];

        for ($i=0; $i <$qty; $i++) { 
           $assid = 'Fp'.rand(100000, 999999);
            $data['assetid'] = $assid;
            
            

            $builder->insert($data);
       
        }
       
        return redirect()->to(base_url('Warranty/tload'))->with('status', 'Products Inserted succesfully');
}
        public function summary()
        {
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
        return view('/summary/warrantyin', $data);
        }

        //   type = 'desktop' AND conditions ='New'
        public function debit()
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
        $builder1 = $db->table('debit');
        $builder1->select('debit.*')->orderBy('daterecieved', 'DESC');
        if($this->request->getGet('q')) {
         $q=$this->request->getGet('q');
        $builder1->select('debit.*');
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
        return view('/stockin/debit', $data);
           
        } elseif(!$this->request->getGet('q')) {
          $data['user_data'] = $session->get('designation');
          $data['Ndesktop'] = $builder1->get()->getResult();
      return view('/stockin/debit', $data);

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

            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "New" AND type="desktop"' );
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
            return view('/stockin/Ndesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Ndesktop'] = $builder->get()->getResult();
            return view('/stockin/Ndesktop', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Used" AND type="desktop"' );
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
           return view('/stockin/Udesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Udesktop'] = $builder->get()->getResult();
            return view('/stockin/Udesktop', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Refurb" AND type="desktop"' );
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
            return view('/stockin/Rdesktop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rdesktop'] = $builder->get()->getResult();
            return view('/stockin/Rdesktop', $data);
           }

        }

        // new lcd
        public function Nlcd()
        {
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "New" AND type="Lcd"' );
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
            return view('/stockin/Nlcd', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rdesktop'] = $builder->get()->getResult();
            return view('/stockin/Nlcd', $data);
           }

        }
        // end

         // Refurb lcd
         public function Rlcd()
         {
             $session = \Config\Services::session();
 
             $db      = \Config\Database::connect();
     
             $builder1 = $db->table('users');
             $builder1->select('users.*');
             $builder1->where('users.designation = "admin" ' );
             $sdata['hello'] = $builder1->get()->getResultArray();
             $session->set($sdata);
             $data['user_data'] = $session->get('designation');
             
             $builder = $db->table('masterlist');
             $builder->select('masterlist.*')->orderBy('time', 'DESC');
             $builder->where('masterlist.conditions = "Refurb" AND type="Lcd"' );
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
             return view('/stockin/Rlcd', $data);
               
            } elseif(!$this->request->getGet('q')) {
             $data['user_data'] = $session->get('designation');
             $data['Rdesktop'] = $builder->get()->getResult();
             return view('/stockin/Rlcd', $data);
            }
 
         }
         // end

          // Used lcd
          public function Ulcd()
          {
              $session = \Config\Services::session();
  
              $db      = \Config\Database::connect();
      
              $builder1 = $db->table('users');
              $builder1->select('users.*');
              $builder1->where('users.designation = "admin" ' );
              $sdata['hello'] = $builder1->get()->getResultArray();
              $session->set($sdata);
              $data['user_data'] = $session->get('designation');
              
              $builder = $db->table('masterlist');
              $builder->select('masterlist.*')->orderBy('time', 'DESC');
              $builder->where('masterlist.conditions = "Used" AND type="Lcd"' );
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
              return view('/stockin/Ulcd', $data);
                
             } elseif(!$this->request->getGet('q')) {
              $data['user_data'] = $session->get('designation');
              $data['Rdesktop'] = $builder->get()->getResult();
              return view('/stockin/Ulcd', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "New" AND type="laptop"' );
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
            return view('/stockin/Nlaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Nlaptop'] = $builder->get()->getResult();
            return view('/stockin/Nlaptop', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Used" AND type="laptop"' );
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
           return view('/stockin/Ulaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Ulaptop'] = $builder->get()->getResult();
            return view('/stockin/Ulaptop', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Refurb" AND type="laptop"' );
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
            return view('/stockin/Rlaptop', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rlaptop'] = $builder->get()->getResult();
            return view('/stockin/Rlaptop', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "New" AND type="allinone"' );
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
            return view('/stockin/Nallinone', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Nallinone'] = $builder->get()->getResult();
            return view('/stockin/Nallinone', $data);
           }

        }

        public function smartphone()
        {
            
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="smartphone"' );
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
            return view('/stockin/smartphone', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Nallinone'] = $builder->get()->getResult();
            return view('/stockin/smartphone', $data);
           }

        }

        public function tablet()
        {
            
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="Tablet"' );
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
            return view('/stockin/tablet', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Nallinone'] = $builder->get()->getResult();
            return view('/stockin/tablet', $data);
           }

        }

        public function others()
        {
            
            $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="Others"' );
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
            return view('/stockin/others', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Nallinone'] = $builder->get()->getResult();
            return view('/stockin/others', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Used" AND type="allinone"' );
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
          return view('/stockin/Uallinone', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
        $data['Uallinone'] = $builder->get()->getResult();
          return view('/stockin/Uallinone', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Refurb" AND type="allinone"' );

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
            return view('/stockin/Rallinone', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['Rallinone'] = $builder->get()->getResult();
            return view('/stockin/Rallinone', $data);
           }

        }

        public function ram()
        {
        
          $session = \Config\Services::session();

            $db      = \Config\Database::connect();
    
            $builder1 = $db->table('users');
            $builder1->select('users.*');
            $builder1->where('users.designation = "admin" ' );
            $sdata['hello'] = $builder1->get()->getResultArray();
            $session->set($sdata);
            $data['user_data'] = $session->get('designation');
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="ram"' );


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
           return view('/stockin/ram', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['ram'] = $builder->get()->getResult();
          return view('/stockin/ram', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="hdd"' );


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
           return view('/stockin/hdd', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['hdd'] = $builder->get()->getResult();
            return view('/stockin/hdd', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="sdd"' );


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
           $data['ssd'] = $builder1->get()->getResult();
           return view('/stockin/ssd', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['ssd'] = $builder1->get()->getResult();
            return view('/stockin/ssd', $data);
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
            
            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="printers"' );
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
           return view('/stockin/printers', $data);
              
           } elseif(!$this->request->getGet('q')) {
            $data['user_data'] = $session->get('designation');
            $data['printer'] = $builder->get()->getResult();
            return view('/stockin/printers', $data);
           }

        }
        

        public function printersp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="printer"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
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

        public function ssdsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="sdd"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'ssd'.$idd. '.xlsx';
      
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
          $filename = "upload/".'ssd'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function hddsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.type="hdd"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'hdd'.$idd. '.xlsx';
      
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
          $filename = "upload/".'hdd'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function ramsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
          $builder->select('masterlist.*')->orderBy('time', 'DESC');
          $builder->where('masterlist.type="ram"' );
          
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

        public function Rallinonesp()
        {
          $db      = \Config\Database::connect();

            $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Refurb" AND type="allinone"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Rallinonesp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Rallinonesp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function Oallinonesp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
          $builder->select('masterlist.*')->orderBy('time', 'DESC');
          $builder->where('masterlist.conditions = "Used" AND type="allinone"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Oallinonesp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Oallinonesp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function Nallinonesp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "New" AND type="allinone"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Nallinonesp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Nallinonesp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function Rlaptopsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Refurb" AND type="laptop"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Rlaptopsp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Rlaptopsp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function Olaptopsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "Used" AND type="laptop"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'UsedLaptop'.$idd. '.xlsx';
      
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
          $filename = "upload/".'UsedLaptop'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function Nlaptopsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
            $builder->select('masterlist.*')->orderBy('time', 'DESC');
            $builder->where('masterlist.conditions = "New" AND type="laptop"' );
          
        $users = $builder->get()->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Nlaptopsp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Nlaptopsp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }

        public function Rdesktopsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
          $builder->select('masterlist.*')->orderBy('time', 'DESC');
          $builder->where('masterlist.conditions = "Refurb" AND type="desktop"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Rdesktopsp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Rdesktopsp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }



        public function Odesktopsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
          $builder->select('masterlist.*')->orderBy('time', 'DESC');
          $builder->where('masterlist.conditions = "Used" AND type="desktop"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Odesktopsp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Odesktopsp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }


        public function Ndesktopsp()
        {
          $db      = \Config\Database::connect();
          $builder = $db->table('masterlist');
          $builder->select('masterlist.*')->orderBy('time', 'DESC');
          $builder->where('masterlist.conditions = "New" AND type="desktop"' );
          
        $users = $builder->get()->getResult();
      
        //   $users = $query->getResult();
        $idd = rand(1000, 9999);
        $fileName = 'Ndesktopsp'.$idd. '.xlsx';
      
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
          $filename = "upload/".'Ndesktopsp'.$idd.".xlsx";
          return redirect()->to(base_url($filename));
      
        }
  

}