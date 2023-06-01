<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    protected $UsersModel;
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function index()
    {
        // if ((session()->get('login')) && (session()->get('level') == 1 || session()->get('level') == 2)) {
        //     return redirect()->to(base_url() . 'home');
        // }
        
        $data = [
            'title' => 'Login',
            'content' => 'login/login',
            'users' => $this->UsersModel->getUser()->getResult()
        ];

        return view('login/login', $data);
    }
    
    public function login()
    {
        $login = $this->request->getPost('login');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $check = $this->UsersModel->getDataUser($username, $password);
        
        if ($login !== NULL) {
            if ($username == '' || $password == '') {
                $error = "Username dan password harus diisi";
                if ($error) {
                    session()->setFlashdata('error', $error);
                    return redirect()->to(base_url() . 'login');    
                }
            }
            if ($check !== NULL) {
                if ((strtolower($check['username']) == strtolower($username)) && ($check['password'] == $password)) {
                    session()->set('karyawan', $check["karyawan"]);
                    session()->set('username', $check["username"]);
                    session()->set('password', $check["password"]);
                    session()->set('id_user', $check["id_user"]);
                    session()->set('level', $check["level"]);

                    session()->set('login', true);
                    
                    if (session()->get('level') == 1) {
                        return redirect()->to(base_url() . 'home');
                    } else if (session()->get('level') == 2) {
                        return redirect()->to(base_url() . 'profile');
                    }
                    
                }
            } else {
                $error = "Username atau password salah";
                if ($error) {
                    session()->setFlashData('error', $error);
                    return redirect()->to(base_url() . 'login');   
                }
            }
        }
        
    }

    public function logout(){
        session()->remove('id_user');
        session()->remove('karyawan');
        session()->remove('username');
        session()->remove('password');
        session()->remove('level');
        session()->remove('login');
        // session()->destroy();
        $success = "You have been logged out!";
        if($success) {
            session()->setFlashData('success', $success);
        }
        
        return redirect()->to(base_url() . 'login');   
    }
}
