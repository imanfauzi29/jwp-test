<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $data['title'] = 'Login Page';
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

    public function register() 
    {
        $data['title'] = "Register Page";
        return view('register', $data);
    }

    public function postRegister() 
    {
        $validate = $this->validate([
            'profile'   => [
                'uploaded[profile]',
                'mime_in[profile,image/jpg,image/jpeg,image/png]',
                'max_size[profile,4096]',
            ],
            'name'      => 'required',
            'email'     => 'required|valid_email|is_unique[users.email]',
            'password'  => 'required|min_length[6]'
        ]);

        if (!$validate) {
            session()->setFlashdata('msg', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $userModel = new UserModel();
        
        $image_profile = $this->request->getFile("profile");
        var_dump($this->request->getFile('profile'));
        $filename = $image_profile->getRandomName();
        $password = $this->request->getPost("password");

        $data = [
            'name'              => $this->request->getPost('name'),
            'email'             => $this->request->getPost('email'),
            'profile_picture'   => $filename,
            'password'          => password_hash($password, PASSWORD_BCRYPT)
        ];

        $userModel->insert_data($data);
        if ($userModel) {
            $image_profile->move("uploads/image/", $filename);
            session()->setFlashdata('success', 'User baru berhasil dibuat.');
        } else {
            session()->setFlashdata('msg', 'Gagal membuat user baru');
        }

        return redirect()->back();

    }

    private function uploadImage($files) 
    {

    }
}
