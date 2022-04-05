<?php 
namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\ProductM;
use App\Models\TempModel;
use CodeIgniter\Controller;
use App\Libraries\Zend;
use App\Libraries\fpdf;
class ProductsCrud extends Controller
{
    public function __construct(){
      
        // $this->$zend = new Zend();
        // $this->load->library('csvimport');
        // $this->load->model('ProductModel');       
    }
    public function __destruct(){
        // $this->$zend = new Main();
    }
    public function index(){
        helper(['form', 'url']);
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->orderBy('id', 'DESC')->findAll();
        return view('products/products', $data);

    }
    public function inventoryView(){
        helper(['form', 'url']);
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->orderBy('id', 'DESC')->findAll();
        return view('products/inventory', $data);
    }
    public function invoiceCreate(){
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
    public function Qty()
    {   
        $productModel = new ProductM();
     
        $data = array([ 'id' => $productModel['id'],
            'type'=> $productModel['type'],
            'ram' => $productModel['ram'],
            'hdd' => $productModel['hdd'],
            'gen' => $productModel['gen'],
            'conditions' => $productModel['conditions'],
            'price' => $productModel['price'],
            'amount' => $productModel['price'] * $productModel['qty'],
            'qty' =>$productModel['qty']
        ]);
        $this->$productModel->update($data);
        $this->productModel->contents();
    }
     public function moreList($id = null){
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->where('id', $id)->first();
        return view('/products/inventoryMore', $data);
    }
    public function barcode($id = null){
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->where('id', $id)->first();
        return view('/products/index', $data);
        // echo "<pre>";
        // print_r($data);
    }
    public function input()
    {
        return view('products/input');
    }
    public function create(){
        return view('/products/add_products');
    }
    public function stock()
    {   
        return view('products/stock');
    }
    public function stockt()
    {
        
        return view('products/stock_out');
        
    }
    public function invoice()
    {
        $productModel = new ProductModel();

        $data['masterlist'] = $productModel->orderBy('id', 'ASC')->findAll();

        return view('products/invoice', $data);
    }
    public function warranty()
    {   

        helper(['form', 'url']);
        $productModele = new ProductModel();
        $data['masterlist'] = $productModele->orderBy('id', 'DESC')->findAll();
        return view('products/warranty', $data);

    }
    
    
    public function barTest()
    {
        helper(['form', 'url']);
        $productModule = new ProductModel();
        $data['masterlist'] = $productModule->orderBy('id', 'DESC')->findAll();


        return view('products/index', $data);
    }
    public function deliveryCreate()
    {
         helper(['form', 'url']);
         if($this->request->getMethod()=='post'){
          $productM = new ProductM(); 
          $productM->save($_POST);
      }
        $productM = new ProductM();
        $data['invoicecreate'] = $productM->orderBy('id', 'DESC')->findAll();
        return view('products/deliveryCreate', $data);
        return $this->response->redirect(site_url('/delivery-create'));
    }
    public function warrantyIn()
    {   

        helper(['form', 'url']);
        $productModule = new ProductModel();
        $data['masterlist'] = $productModule->orderBy('id', 'DESC')->findAll();

        return view('products/warranty_in', $data);
    }
    public function deliver()
    {

        helper(['form', 'url']);
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->orderBy('id', 'DESC')->findAll();
        return view('products/deliver', $data);
    }
    // insert data
    public function store() {
        $rands = rand(10000, 99999);
        
        $tempModel = new TempModel();
        $data = [
            'conditions' => $this->request->getVar('conditions'),
            'type' => $this->request->getVar('type'),
            'del' => $rands,
            // 'assetid' => $this->request->getVar('assetid'),
            'gen' => $this->request->getVar('gen'),
            'ram' => $this->request->getVar('ram'),
            'screen' => $this->request->getVar('screen'),
            'part' => $this->request->getVar('part'),
            'serialno' => $this->request->getVar('serialno'),
            'modelid' => $this->request->getVar('modelid'),
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'daterecieved' => $this->request->getVar('daterecieved'),
            'datedelivered' => $this->request->getVar('datedelivered'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
            'customer' => $this->request->getVar('customer'),
            'qty' => $this->request->getVar('qty'),
        ];
        
        for ($i=0; $i <$data['qty'] ; $i++) { 
           $rand = rand(100000, 999999);
            $data['assetid'] = $rand;

            $tempModel->insert($data);
           
        }
        return $this->response->redirect(site_url('/products-form'));
}


    public function load()
    {
        // $tempModel = new TempModel();
        $db      = \Config\Database::connect();
        $builder = $db->table('templist');
        $builder->select('templist.*');
        $data['templist'] = $builder->get()->getResult();
        // $data['templist'] = $tempModel->orderBy('id', 'DESC')->findAll();

        $cart = array();
        $cart2 = array();


        foreach($data['templist'] as $p){
            $m = $p->del;
            $cart[] = $m; 
        }

        $data2['single'] = array_unique($cart);
        
        foreach($data2['single'] as $s){
        $singles = $s;

        $builder = $db->table('templist');
        $builder->select('templist.*');
        $builder->where('templist.del', $singles);
        $data3 = $builder->get()->getResult();
      
        // echo "<pre>";
        // print_r($data3[0]);
        }
        echo "<pre>";
        print_r($data3[0]);
        
        // return view('products/uploadCsv', $data3);
    }


    public function storeie($value='')
    {
        return view('products/invoiceCreate');
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
        return view('products/invoice');
    }

    public function invoiceView()
    {
        helper(['form', 'url']);
        $productM = new ProductM();
        $data['invoicecreate'] = $productM->orderBy('id', 'DESC')->findAll();
        // echo '<pre>';
        // print_r($data);
        return view('products/invoice_view', $data);
    }
    public function invoiceViewid($id = null){
        helper(['form', 'url']);
        $productM = new ProductM();
        $data['invoicecreate'] = $productM->where('id', $id)->first();
        // echo '<pre>';
        // print_r($data);
        return view('products/invoice_viewed', $data);
        
    }
    
    public function singleProduct($id = null){
        $productModel = new ProductModel();
        $data['user_obj'] = $productModel->where('id', $id)->first();
        return view('/products/edit_product', $data);
    }
    // update user data
    public function update(){
        $productModel = new ProductModel();
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
            'cpu' => $this->request->getVar('cpu'),
            'speed' => $this->request->getVar('speed'),
            'price' => $this->request->getVar('price'),
            'hdd' => $this->request->getVar('hdd'),
            'list' => $this->request->getVar('list'),
            'daterecieved' => $this->request->getVar('daterecieved'),
            'datedelivered' => $this->request->getVar('datedelivered'),
            'odd' => $this->request->getVar('odd'),
            'comment' => $this->request->getVar('comment'),
        ];
        $productModel->update($id, $data);
        return $this->response->redirect(site_url('/products-list'));
    }
 
    // delete user
    public function delete($id = null){
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/products-list'));
    } 
     public function deletem($id = null){
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/products-list'));
    }  
    // function Invoicev()
    // {
    //     $productModel = new ProductModel();

    //     $data['masterlist'] = $productModel->orderBy('masterlist', 'ASC')->findAll();

    //     return view('products/invoice', $data);
    // }

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
        // echo "<pre>";
        // print_r($builder);
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
    public function deletes($del = null){
        $productModel = new ProductModel();
        $data['masterlist'] = $productModel->where('del', $del)->delete($del);
//         

        return view('products/deletei', $data);
    }
 function delete_all()
 {
  if($this->input->post('checkbox_value'))
  {
   $id = $this->input->post('checkbox_value');
   for($count = 0; $count < count($id); $count++)
   {
    $this->multiple_delete_model->delete($id[$count]);
   }
  }
 }
    
}

