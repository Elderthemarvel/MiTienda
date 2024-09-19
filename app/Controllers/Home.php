<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('login/login');
    }

    public function dashboard(): string
    {
        return view('template');
    }
}
