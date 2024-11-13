<?php

namespace App\Controllers;

use App\Models\TiposModel;
use CodeIgniter\Controller;

class TiposController extends Controller
{
    public function __construct()
    {
       
        $this->perfil = 1;
    }

    public function Vertipos()
    {
        $tiposModel = new TiposModel();
        $data['perfil'] = $this->perfil;
        $data['tipos'] = $tiposModel->findAll();
        return view('administrador/tipo_usuario', $data);
       // print_r($data);
    }

    public function nuevotipo()
    {
        return view('administrador/Nuevo_tipo');
    }

   
  
}
