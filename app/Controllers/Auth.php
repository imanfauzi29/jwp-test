<?php

namespace App\Controllers;

use App\Models\UserModel;
use DateInterval;
use DateTime;

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

    public function forgotPassword() 
    {
        $data['title'] = "Forgot password page";
        return view('forgotPassword', $data);
    }

    public function postForgotPassword() 
    {
        $session = session();

        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $result = $userModel->where('email', $email)->first();

        if ($result) {
            $token = $this->makeToken($result['id'], $email);
            return redirect()->to("/auth/forgot-password/reset-password/token/$token");
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan!');
            return redirect()->back()->withInput();
        }

    }

    public function resetPassword($token)
    {
        $validate = $this->validate(['password' => 'required']);

        if ($validate) {
            $decode = $this->decodeToken($token);
            if ($decode) {
                $userModel = new UserModel();
    
                $newPass = $this->request->getPost('password');
                $data = ['password' => password_hash($newPass, PASSWORD_BCRYPT)];
    
                $update = $userModel->update_data($decode, $data);
                if ($update) {
                    session()->setFlashdata('success', 'Password berhasil diubah!');
                } else {
                    session()->setFlashdata('failed', 'Password gagal diupdate!');
                }
            } else {
                session()->setFlashdata('expired', 'Token expired');
            }
        }

        $data['title'] = 'Forgot Password';
        return view('forgotPassword_form', $data);
    }

    private function makeToken($id, $email)
    {
        /**
         * format token
         * date|email
         */
        $time = date("d-m-Y H:i:s");
        $string = "$id|$email|$time";
        $token = base64_encode($string);
        return $token;
    }

    private function decodeToken($token) 
    {
        $token = base64_decode($token, true);
        [$id, $email, $date] = explode("|", $token);

        $now = date('d-m-Y H:i:s');

        $hours = 2;
        $time = new DateTime($date);
        $time->add(new DateInterval("PT{$hours}H"));
        $stamp = $time->format('d-m-Y H:i:s');
        
        return strtotime($now) < strtotime($stamp) ? $id : false;
    }
}
