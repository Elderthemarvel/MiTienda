<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriasModel;
class CategoriaController extends Controller
{
    protected $perfil;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->perfil = $this->session->get('tipo');
    }
   

    public function verCategorias(): string
    {
        $CategoriasModel = new CategoriasModel();
        $datosCategoria = [
            'perfil' => $this->perfil,
            'datosCategoria' => $CategoriasModel->findAll()
        ];
    
        return view('administrador/categoria', $datosCategoria);
    }
    

   /* public function nuevaCategoria(): string
    {
        $datosCategoria['perfil'] = $this->perfil;
        $CategoriasModel= model('CategoriasModel');
        $datosCategoria['categorias']=$CategoriasModel->findAll();
        return view('/administrador/categoria',$datosCategoria);
    }*/

    
    public function guardarCategoria()
    {
        $CategoriasModel = new CategoriasModel();
        $nombreCategoria = $this->request->getPost('nom_categoria');
    
        // Verificar si la categoría ya existe
        $categoriaExistente = $CategoriasModel->where('nom_categoria', $nombreCategoria)->first();
    
        if ($categoriaExistente) {
            // Si la categoría ya existe, redirige con un mensaje de error
            return redirect()->back()->with('error', 'La categoría ya existe. Por favor, ingresa un nombre diferente.');
        }
    
        // Si no existe, procede a insertarla
        $CategoriasModel->insert(['nom_categoria' => $nombreCategoria]);
    
        return redirect()->to('/categoria')->with('success', 'Categoría creada exitosamente.');
    }
    


public function editarCategoria($id)
{
    $CategoriasModel = new CategoriasModel();
    $data = [
        'perfil' => $this->perfil,
        'categoria' => $CategoriasModel->find($id)
    ];

    return view('administrador/editar_categoria', $data);
}


public function actualizarCategoria($id)
{
    $CategoriasModel = new CategoriasModel();
    $data = $this->request->getPost();
    $CategoriasModel->update($id, $data);

    return redirect()->to('/categoria');
}


public function eliminarCategoria($id)
{
    $CategoriasModel = new CategoriasModel();
    $CategoriasModel->delete($id);

    return redirect()->to('/categoria');
}


    public function categoria_confirmDelete($id)
    {
        $data['perfil'] = $this->perfil;
        $model = new \App\Models\CategoriasModel();
        $data['categoria'] = $model->find($id);

        return view('administrador/confirm_delete', $data);
    }    
}