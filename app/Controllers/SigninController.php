<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    } 
    public function home()
    {
        echo view('admin_template/index');
    }
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        
        $data = $userModel->where('email', $email)->where('password', $password)->first();
         // $pass = $data['password'];
       // $authenticatePassword = $userModel->where($password, $pass);
        // echo '<pre>';
        // print_r($pass);
        
        if(!$data){
           
             $session->setFlashdata('msg', 'Invalid email or Password');
                return redirect()->to('/signin');
            
            }
            // elseif{
            //     $session->setFlashdata('msg', 'Password is incorrect.');
            //     return redirect()->to('/signin');
            //   }
            
        
        else{
            
            $session->setFlashdata('msg', 'Welcome.');
            
            return $this->response->redirect(site_url('/home-view'));
            
        }
    } 

    public function scanning(){

        $session = \Config\Services::session();
        $db      = \Config\Database::connect();
        $data['name'] = session()->get('user_name');
        $builder = $db->table('barcodes');
        $builder->select('*');
        $data['items'] = $builder->get()->getResultArray();
        



        echo view('products/template/heads');
        return view('products/scanning', $data);
    }

    public function barcodesimport()
    {
       
        // try {
           $session = \Config\Services::session();
           require ('../vendor/autoload.php');
           $sess = session()->get('user_name');
            $del =rand(100000, 999999);
            $db      = \Config\Database::connect();
            $date = date('ym - ');
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
                              'description' => $filedata[1],
                              'serialno' => $filedata[2],
                              'assetid' => rand(100000, 999999),
                              'session' => $sess,
                              'del' => $del,
                            );
                        }
                        $index++;
                    }
                }
            }
            foreach($stock as $l){
             $barcode = new \Com\Tecnick\Barcode\Barcode();
             $example = '<h6>'.'</strong>'. '<br/> '.' <strong>'.$l['description'].'</strong>'.'</br>';
             $bobj1 = $barcode->getBarcodeObj('C128',  $l['assetid'], -1, -17, 'black', array(0, 0, 0, 0));
             $example .= $bobj1->getSvgCode().'<br/>'.'&nbsp;'.'A- '.$l['assetid'].'<br/> <hr>'.'Date '.$date. '<br/>'.'</h6>'.'</div>'; ?>
            <form >
              <?php echo $example; ?>
          </div>
              
          </form>
    
        </br>
          <?php
            }
    // } catch (\Exception $e) {
    //     return redirect()->back()->with('status', 'Kindly check your csv format');
    //     }
    }
}


