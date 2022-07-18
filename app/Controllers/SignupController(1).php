<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Validation;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        $data = [];
        echo view('signup', $data);
    }
  
    public function store()
    {
        helper(['form', 'url']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'), 
            ];
            $userModel->save($data);
            return redirect()->to('/products-list');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
  
}