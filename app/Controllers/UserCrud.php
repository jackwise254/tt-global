<?php 
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
class UserCrud extends Controller
{
    // show users list
    public function index(){
        helper(['form', 'url']);
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('user_id', 'DESC')->findAll();
        return view('user/user_view', $data);
    }
    // add user form
    public function create(){
        return view('user/add_user');
    }
 
    // insert data
    public function store() {
        $userModel = new UserModel();
        $data = [
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'designation' => $this->request->getVar('designation'),
            'user_name' => $this->request->getVar('user_name'),
            'user_email'  => $this->request->getVar('user_email'),
            'user_password' => $this->request->getVar('user_password'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }
    // show single user
    public function singleUser($id){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('user_id', $id)->first();
        return view('user/edit_user', $data);
    }
    // update user data
    public function update(){
        $userModel = new UserModel();
        $user_id = $this->request->getVar('user_id');
        $data = [
            'user_name' => $this->request->getVar('user_name'),
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'designation' => $this->request->getVar('designation'),
            'user_name' => $this->request->getVar('user_name'),
            'user_email'  => $this->request->getVar('user_email'),
            'user_password' => $this->request->getVar('user_password'),
        ];
        $userModel->update($user_id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }
 
    // delete user
    public function delete($id){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('user_id', $id)->delete();
        return $this->response->redirect(site_url('/users-list'));
    }    
}





