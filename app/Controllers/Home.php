<?php

namespace App\Controllers;
use App\Models\UsersModel;
class Home extends BaseController
{
    public function index()
    {
        // return view('login');
        return redirect()->to(site_url('/login'));
    }
    public function user(){
    	helper(['form', 'url']);
        $userModel = new UsersModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
     return view('user_view',$data);
   }

   public function updateuser(){
     $id = $this->input->post('id');
     $field = $this->input->post('field');
     $value = $this->input->post('value');

     // Update records
     $this->UsersModel->updateUser($id,$field,$value);

   }
}
