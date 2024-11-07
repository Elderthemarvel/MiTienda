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

    

    public function dashboard(): string
    {
        $data['perfil'] = $this->perfil;
        return view('home',$data);
    }


   
}
