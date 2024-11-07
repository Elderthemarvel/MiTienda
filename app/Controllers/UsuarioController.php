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

       // print_r($datosusuario);
        return view ('administrador/usuarios',$datosusuario);
    }
   
    public function nuevousuario()
    {
        $datosusuario['perfil'] = 1;
        return view ('administrador/nuevo_user',$datosusuario);
    }

    public function registrousuario()
    {
    $usuario = new UsuariosModel();
    
    $datos = [
        'id_tipo' => $this->request->getPost('id_tipo'),
        'nombre' => $this->request->getPost('nombre'),
        'apellido' => $this->request->getPost('apellido'),
        'pass' => $this->request->getPost('pass'),
        'correo' => $this->request->getPost('correo'),
        'genero' => $this->request->getPost('genero'),
        'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
    ];
    
    try {
        // Intentamos insertar los datos
        if ($usuario->insert($datos) === false) {
            // Si falla la inserción, devolvemos los errores de validación
            return redirect()->back()->withInput()->with('errors', $usuario->errors());
        }
        
        // Redirigir en caso de éxito
        return redirect()->route('usuario')->with('success', 'Usuario registrado correctamente');
        
    } catch (\Exception $e) {
        // Si hay un error (como un duplicado en el correo), mostramos un mensaje
        return redirect()->back()->withInput()->with('error', 'El correo ya existe. Intenta con otro.');
    }
}
}