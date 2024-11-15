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
        $datosCategoria['perfil'] = $this->perfil;
        $CategoriasModel = model('CategoriasModel');
        $datosCategoria['categorias'] = $CategoriasModel->findAll();

        return view('/administrador/categoria',$datosCategoria);
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
        $Categorias = model('CategoriasModel');
        $datosCategoria = $this->request->getPost();
        $Categorias->insert($datosCategoria);

       return redirect()->to('/administrador/categoria');
       $this->response->setJSON($datosCategoria);
    }

    public function editarCategoria($id)
    {
        $data['perfil'] = $this->perfil;
        $model = new \App\Models\CategoriasModel();
        $data['productos'] = $model->find($id);
        $categorias= model('CategoriasModel');
        $data['categorias']=$categorias->findAll();

        return view('administrador/categoria', $data);
    }

    public function actualizarCategoria($id)
    {
        
        $model = new \App\Models\CategoriasModel();
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->to('/categoria');

    }

    public function productos_delete($id)
    {
        $data['perfil'] = $this->perfil;
        $model = new \App\Models\CategoriasModel();
        $model->delete($id);

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