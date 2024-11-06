<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
class UsuarioController extends Controller
{
    public function verusuarios()
    {
        $usuarios = new UsuariosModel();
        //$datosusuario['perfil'] = $this->perfil;
        $datosusuario['datosusuario']=$usuarios->findAll();
        $datosusuario['perfil'] = 1;

        print_r($datosusuario);
        return view ('administrador/usuarios',$datosusuario);
    }
   
    public function nuevousuario()
    {
        //$usuarios = new UsuariosModel();
        //$datosusuario['perfil'] = $this->perfil;
        //$datosusuario['datosusuario']=$usuarios->findAll();
        //$datosusuario['perfil'] = 1;

        //print_r($datosusuario);
        $datosusuario['perfil'] = 1;
        return view ('administrador/nuevo_user',$datosusuario);
    }
}