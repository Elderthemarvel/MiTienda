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
        return view ('administrador/nuevo_user',$datosusuario);
    }
   
    
}