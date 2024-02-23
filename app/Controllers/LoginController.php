<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('LoginView');
    }

    public function login()
    {
        $userModel = new UserModel();

        $user = $userModel->where('username', $this->request->getPost('username'))->first();

        if (!$user) {
            return redirect()->to('/login');
        }

        if (!password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->to('/login');
        }

        session()->set('user', $user);

        return redirect()->to('/dashboard');
    }
}
