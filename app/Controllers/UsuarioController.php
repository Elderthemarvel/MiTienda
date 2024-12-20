<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->perfil = $this->session->get('tipo');
    }

    public function verusuarios()
    {
        $usuarios = new UsuariosModel();
        $datosusuario['perfil'] = $this->perfil;
        $datosusuario['datosusuario']=$usuarios->findAll();

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
            'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            'correo' => $this->request->getPost('correo'),
            'genero' => $this->request->getPost('genero'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
        ];
        
        $correoExistente = $usuario->where('correo', $datos['correo'])->first();
        if ($correoExistente) {
            return redirect()->back()->withInput()->with('error', 'El correo ya está registrado. Intenta con otro.');
        }

        try {
            // Intentamos insertar los datos
            if ($usuario->insert($datos) === false) {
                // Si falla la inserción, devolvemos los errores de validación
                return redirect()->back()->withInput()->with('errors', $usuario->errors());
            }
            
            // Redirigir en caso de éxito con mensaje correcto
            return redirect()->route('usuario')->with('success', 'Usuario registrado correctamente');
            
        } catch (\Exception $e) {
            // Si hay un error (como un duplicado en el correo), mostramos un mensaje
            return redirect()->back()->withInput()->with('error', 'El correo ya existe. Intenta con otro');
        }
    }
    public function marcaeEliminado($id)
    {
        $usuarios = new UsuariosModel();
        $usuario = $usuarios->find($id);
        if ($usuario) {
            // colocamos fecha actual al campo deleted_at
            $usuarios->update($id, ['deleted_at' => date('Y-m-d H:i:s')]);
            //Mensaje de exito
            return redirect()->to('/usuario')->with('success', 'Usuario dado de baja correctamente');
        } else {
            // mensaje de error
            return redirect()->to('/usuario')->with('success', 'Usuario no encontrado');
        }
    }

    public function formulariomodificar($id)
    {
        $usuarios = new UsuariosModel();
        $usuario = $usuarios->find($id);

        if ($usuario) {
            return view('administrador/modificar_usuario', ['usuario' => $usuario,'perfil' => 1]);
        } else {
            return redirect()->to('/usuario')->with('error', 'Ha ocurrido un error, no se puede modificar el registro');
        }
    }

    public function modificarusuario($id)
    {
        $usuarios = new UsuariosModel();

        // Valida si el usuario existe
        if (!$usuarios->find($id)) {
            return redirect()->to('/verusuarios')->with('error', 'Usuario no encontrado');
        }

        // Captura los datos
        $data = [
            'id_tipo' => $this->request->getPost('id_tipo'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'correo' => $this->request->getPost('correo'),
            'genero' => $this->request->getPost('genero'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento')
            ];
            if ($usuarios->update($id, $data)) {
                return redirect()->to('/usuario')->with('success', 'Usuario actualizado correctamente');
            }else{
               /* return redirect()->to('/usuario')->with('success', 'Fatal error'); */
            }
           

        
    }

    public function formmodificarpass($id)
    {
        $usuarios = new UsuariosModel();
        $usuario = $usuarios->find($id);
        if ($usuario) {
            //print_r($usuario);
            return view('administrador/modificar_pass', ['usuario' => $usuario,'perfil' => 1]);
        } else {
            return redirect()->to('/usuario')->with('error', 'Ha ocurrido un error, no se puede modificar el password');
        }
    }

    public function modificarpass($id)
    {
        $usuarios = new UsuariosModel();
        $pass1 = $this->request->getPost('pass1');
        $pass2 = $this->request->getPost('pass2');
        
        if ($pass1 !== $pass2) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden. Por favor, inténtalo de nuevo.');
        }
        $data = [
            'pass' => password_hash($pass1, PASSWORD_DEFAULT)
        ];
        if ($usuarios->update($id, $data)) {
            return redirect()->to('/usuario')->with('success', 'Contraseña actualizada correctamente');
        } else {
            return redirect()->to('/usuario')->with('error', 'No se pudo actualizar la contraseña. Inténtalo más tarde');
        }
    }



}