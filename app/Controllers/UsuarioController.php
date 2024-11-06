<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
class UsuarioController extends Controller
{
    public function verusuarios()
    {
        $usuarios = new UsuariosModel();
        $datosusuario['datosusuario']=$usuarios->findAll();
        //$datosusuario['perfil'] = $this->perfil;
        return view ('administrador/usuarios',$datosusuario);
    }
   
    
}