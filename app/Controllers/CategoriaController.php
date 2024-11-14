<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriasModel;
class CategoriaController extends Controller
{
    public function __construct()
    {
       
        $this->cat = 1;
    }

    public function verCategorias()
    {
        $categoria = new CategoriasModel();
        $datosCategoria['categoria'] = $this->cat;
        $datosCategoria['caategoria']=$categoria->findAll();

       // print_r($datosCategoria);
        return view ('administrador/nueva_categoria',$datosCategoria);
    }
   
    public function nuevaCategoria()
    {
        $datosCategoria['perfil'] = 1;
        return view ('administrador/nueva_categoria',$datosCategoria);
    }

    public function registroCategoria()
    {
    $categoria = new CategoriasModel();
    
    $datos = [
        'id_tipo' => $this->request->getPost('id'),
        'nombre' => $this->request->getPost('nom_categoria'),
        'apellido' => $this->request->getPost('created_at'),
        'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
        'misssni' => $this->request->getPost('update_at'),
        'genero' => $this->request->getPost('delete_at'),
        
    ];
    
    try {
        // Intentamos insertar los datos
        if ($categoria->insert($datos) === false) {
            // Si falla la inserción, devolvemos los errores de validación
            return redirect()->back()->withInput()->with('errors', $categoria->errors());
        }
        
        // Redirigir en caso de éxito con mensaje correcto
        return redirect()->route('categoria')->with('success', 'Usuario registrado correctamente');
        
    } catch (\Exception $e) {
        // Si hay un error (como un duplicado en el correo), mostramos un mensaje
        return redirect()->back()->withInput()->with('error', 'El correo ya existe. Intenta con otro');
    }
}
public function marcaeEliminado($id)
{
    $categorias = CategoriasModel();
    $categoria = $categorias->find($id);
    if ($categoria) {
        // colocamos fecha actual al campo deleted_at
        $categoria->update($id, ['deleted_at' => date('Y-m-d H:i:s')]);
        //Mensaje de exito
        return redirect()->to('/categoria')->with('success', 'Categoria encontrada');
    } else {
        // mensaje de error
        return redirect()->to('/categoria')->with('success', 'Producto no');
    }
}

public function formulariomodificar($id)
{
    $categorias = new CategoriasModel();
    $categoria = $categorias->find($id);

    if ($categoria) {
        return view('administrador/modificar_categoria', ['categoria' => $categoria,'perfil' => 1]);
    } else {
        return redirect()->to('/categoria')->with('error', 'Ha ocurrido un error, no se puede modificar el registro');
    }
}
public function modificarCategoria($id)
    {
        $categorias= new CategoriasModel();

        // Valida si la categoria existe
        if (!$categorias->find($id)) {
            return redirect()->to('/verCategproa')->with('error', 'Usuario no encontrado');
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
            if ($categorias->update($id, $data)) {
                /*return redirect()->to('/categoria')->with('success', 'Usuario actualizado correctamente');*/
            }else{
               /* return redirect()->to('/categoria')->with('success', 'Fatal error'); */
            }
        
        
    }

}