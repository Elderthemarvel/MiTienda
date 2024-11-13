<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsuariosModel;

class Auth extends BaseController
{
    public function index(): string
    {
        return view('login/login');
    }
    
    public function login()
    {
        $post = $this->request->getPost();
        
        if ($post) {
            
            $userModel = new UsuariosModel();
            $username = $post['user'];
            $password = $post['pass'];

            $user = $userModel->where('correo', $username)->first();

            if ($user && password_verify($password, $user['pass'])) {
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'nombre' => $user['nombre'],
                    'apellido' => $user['apellido'],
                    'tipo'=> $user['id_tipo'],
                    'logged_in' => true
                ]);

                $response = [
                    'success' => true,
                    'message' => 'Bienvenido.'
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Credenciales incorrectas.'
                ];
                return $this->response->setJSON($response);
            }
          
        }else{
            $response = [
                'success' => false,
                'message' => 'Datos invalidos.'
            ];
            return $this->response->setJSON($response);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}

