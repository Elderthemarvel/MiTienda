<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $perfil;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->perfil = $this->session->get('tipo');
    }

    public function dashboard(): string
    {
        $data['perfil'] = $this->perfil;
        return view('home', $data);
    }
}
