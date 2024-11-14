<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class VentasController extends BaseController
{
    protected $perfil;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->perfil = $this->session->get('tipo');
    }
    
    public function index()
    {
        $data['perfil'] = $this->perfil;
        return view('ventas/generar_orden', $data);
    }

    public function buscarProducto()
    {
        
    }

}
