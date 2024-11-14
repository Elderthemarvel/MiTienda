<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductosModel;
class ProductosController extends Controller
{
    protected $perfil;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->perfil = $this->session->get('tipo');
    }
   

    public function productos(): string
    {
        $datosproductos['perfil'] = $this->perfil;
        $ProductosModel = model('ProductosModel');
        $datosproductos['productos'] = $ProductosModel->asArray()->select('productos.id, productos.nombre,productos.precio_venta, productos.stock, categorias.nom_categoria')->join('categorias','id_categoria=categorias.id')->findAll();

        return view('/administrador/productos',$datosproductos);
    }
    public function nuevo_producto(): string
    {
        $datosproductos['perfil'] = $this->perfil;
        $categorias= model('CategoriasModel');
        $datosproductos['categorias']=$categorias->findAll();
        return view('/administrador/nuevo_producto',$datosproductos);
    }

    
    public function guardar_producto()
    {
        $Productos = model('ProductosModel');
        $data = $this->request->getPost();
        $Productos->insert($data);

       return redirect()->to('/productos');
       $this->response->setJSON($data);
    }
    public function productos_edit($id)
    {
        $data['perfil'] = $this->perfil;
        $model = new \App\Models\ProductosModel();
        $data['productos'] = $model->find($id);
        $categorias= model('CategoriasModel');
        $data['categorias']=$categorias->findAll();

        return view('administrador/modificar_producto', $data);
    }

    public function productos_update($id)
    {
        
        $model = new \App\Models\ProductosModel();
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->to('/productos');

    }

    public function productos_delete($id)
    {
        $data['perfil'] = $this->perfil;
        $model = new \App\Models\ProductosModel();
        $model->delete($id);

        return redirect()->to('/productos');
    }

    public function productos_confirmDelete($id)
    {
        $data['perfil'] = $this->perfil;
        $model = new \App\Models\ProductosModel();
        $data['productos'] = $model->find($id);

        return view('administrador/confirm_delete', $data);
    }

    
}