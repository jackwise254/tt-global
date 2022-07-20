<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('user_email', $this->request->getVar('email'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if($user['designation'] == "admin"){

                    return redirect()->to(base_url('home-view'));

                }elseif($user['role'] == "editor"){

                    return redirect()->to(base_url('editor'));
                }
            }
        }
        $enforcer->addPermissionForUser('admin', 'home-view', 'read');
        $enforcer->addRoleForUser('eve', 'writer');



        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id' => $user['user_id'],
            'fname' => $user['fname'],
            'user_name' => $user['user_name'],
            'user_email' => $user['user_email'],
            'isLoggedIn' => true,
            "designation" => $user['designation'],
        ];

        session()->set($data);
        return true;

        
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

            public function enforcer()
            {
                
                $enforcer = \Config\Services::enforcer();
                // adds permissions to a user
                $enforcer->addPermissionForUser('eve', 'articles', 'read');
                // adds a role for a user.
                $enforcer->addRoleForUser('eve', 'writer');
                // adds permissions to a rule
                $enforcer->addPolicy('writer', 'articles','edit');
                $enforcer->addPolicy('writer', 'articles','edit');


            }
}