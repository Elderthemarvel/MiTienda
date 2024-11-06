<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductosModel;
class ProductosController extends Controller
{
    public function verproductos()
    {
        $datosproductos = new ProductossModel();
      
        $datosproductos['datosproductos']=$usuarios->findAll();
        $datosproductos['perfil'] = 1;

        print_r($datosproductos);
        return view ('administrador/usuarios',$datosusuario);
    }
   
    public function nuevousuario()
    {
 
        $datosproductos['perfil'] = 1;
        return view ('administrador/nuevo_producto,$datosproductos);
    }
}