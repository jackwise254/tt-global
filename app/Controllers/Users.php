<?php
// if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Users extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('BarcodeM', 'users');
        // $this->load->library('Qr_code');
        // $this->config->load('qr_code');

    }

  

   public function index(){

     $usersmodel = new UsersModel();
     $data['userlist'] = $this->UsersModel->getUsers();

     return view('user_view',$data);
   }

   public function updateuser(){
     $id = $this->input->post('id');
     $field = $this->input->post('field');
     $value = $this->input->post('value');

     // Update records
     $this->UsersModel->updateUser($id,$field,$value);

     echo 1;
     exit;
   }

}