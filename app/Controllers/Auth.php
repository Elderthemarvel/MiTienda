<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']); 
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[6]'
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $user = $userModel->where('username', $username)->first();

                if ($user && password_verify($password, $user['password'])) {
                    $session = session();
                    $session->set([
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'logged_in' => true
                    ]);

                    return redirect()->to('/dashboard'); // Redirige a una página segura
                } else {
                    return redirect()->back()->with('error', 'Credenciales incorrectas.');
                }
            } else {
                return redirect()->back()->with('error', 'Por favor, ingresa datos válidos.');
            }
        }

        echo view('auth/login'); // Cargar la vista de login
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

