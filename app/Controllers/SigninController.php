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
}


