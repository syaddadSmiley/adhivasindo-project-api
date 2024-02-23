<?php
namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('NavbarView').view('RegisterView');
    }

    public function register()
    {
        $userModel = new UserModel();

        $user = $userModel->where('username', $this->request->getPost('username'))->first();
        if ($user) {
            return view('NavbarView').view('RegisterView');
        }
        
        $userModel->insert([
            'username' => $this->request->getPost('name'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return view('NavbarView').view('LoginView');
    }
}

