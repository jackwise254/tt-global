<?php 
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\VendorModel;
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
    //show vendors list
    public function vendor()
    {
        helper(['form', 'url']);
        $userModel = new VendorModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('user/vendor_view', $data);
    }

    //customer list
    public function customer()
    {
        helper(['form', 'url']);
        

        $db      = \Config\Database::connect();
        $builder = $db->table('customer');
        $builder->select('customer.*')->orderBy('username');

        $data['users'] = $builder->get()->getResult();

        return view('user/customer_view', $data);
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
<<<<<<< HEAD
    public function update($user_id){
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        // $builder = $db->table('users.*');
        // $userModel = new UserModel();
        // $id = $this->request->getVar('user_id');
=======
    public function update(){
        $userModel = new UserModel();
        $user_id = $this->request->getVar('user_id');
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
        $data = [
            'user_name' => $this->request->getVar('user_name'),
            'fname' => $this->request->getVar('fname'),
            'lname' => $this->request->getVar('lname'),
            'designation' => $this->request->getVar('designation'),
<<<<<<< HEAD
            'user_email'  => $this->request->getVar('user_email'),
            'user_password' => $this->request->getVar('user_password'),
        ];

            // echo'<pre>';
            // print_r($data);

            $builder->where('user_id', $user_id);
            $builder->update($data);
        
        // $builder->update(['user_id' => $id], $data);
        // return $this->response->redirect(site_url('/users-list'));
        return redirect()->to(base_url('UserCrud/index'))->with('status', 'Updated succesfully');
=======
            'user_name' => $this->request->getVar('user_name'),
            'user_email'  => $this->request->getVar('user_email'),
            'user_password' => $this->request->getVar('user_password'),
        ];
        $userModel->update($user_id, $data);
        return $this->response->redirect(site_url('/users-list'));
>>>>>>> 6b2c70d285653be485394b23d050774804d395e0
    }
 
    // delete user
    public function delete($id){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('user_id', $id)->delete();
        return $this->response->redirect(site_url('/users-list'));
    }    
}





