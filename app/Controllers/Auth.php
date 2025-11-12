<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = (new UserModel())->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user', $user);
            return redirect()->to('/');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function doRegister()
    {
        $userModel = new UserModel();

        $userModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama'     => $this->request->getPost('nama'),
        ]);

        return redirect()->to('/auth/login')->with('success', 'Pendaftaran berhasil, silakan login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
