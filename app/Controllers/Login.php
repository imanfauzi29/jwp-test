<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login Page';
        var_dump(session());
        return view('login', $data);
    }

    public function postLogin() 
    {
        $session = session();
        $userModel = new UserModel();
        $post = $this->request->getPost();
        
        $data = $userModel->where('email', $post['email'])->first();

        if ($data) {
            $password = $data['password'];
            $verify_pass =  password_verify($post['password'], $password);
            if ($verify_pass) {
                $session_data = [
                    'user_id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => true
                ];
                
                $session->set($session_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Password salah!');
                return redirect()->to('/auth/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan!');
            return redirect()->to('/auth/login');
        }
    }
}
