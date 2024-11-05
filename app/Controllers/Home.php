<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $perfil;

    public function __construct()
    {
       
        $this->perfil = 1;
    }

    public function index(): string
    {
        return view('login/login');
    }

    public function nuevo_producto(){
        $data['perfil'] = $this->perfil;
        return view('administrador/nuevo_producto',$data);
    }

    public function dashboard(): string
    {
        $data['perfil'] = $this->perfil;
        return view('home',$data);
    }


   
}
