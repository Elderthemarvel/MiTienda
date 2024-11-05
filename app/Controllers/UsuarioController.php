<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
class UsuarioController extends Controller
{
    public function verusuarios()
    {
        $usuarios = new UsuarioModel();
        $datosusuario['datosUsuario']=$usuarios->findAll();
        return view ('Usuario',$datosusuario);
    }
   
    
}