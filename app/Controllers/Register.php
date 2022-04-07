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
  
}