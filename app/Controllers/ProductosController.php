<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductosModel;
class ProductosController extends Controller
{
    protected $perfil;

    public function __construct()
    {
       
        $this->perfil = 1;
    }
   

    public function productos(): string
    {
        $datosproductos['perfil'] = $this->perfil;
        $ProductosModel = model('ProductosModel');
        $datosproductos['productos'] = $ProductosModel->findAll();

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

       // return redirect()->to('/productos');
       $this->response->setJSON($data);
    }

    /*
    public function delete($id)
    {
        $datosproductos['perfil'] = 1;
        $model = new ProductosModel();
        $model->delete($id);

        return redirect()->to('/productos');
    }

    public function edit($id)
    {
        $datosproductos['perfil'] = 1;
        $model = new ProductosModel();
        $data['producto'] = $model->find($id);

        return view('editar_producto', $data);
    }

    public function update($id)
    {
        $datosproductos['perfil'] = 1;
        $model = new ProductosModel();
        $model->update($id, [
            'id_categoria' => $this->request->get('id_categoria'),
            'nombre' => $this->request->get('nombre'),
            'precio_venta' => $this->request->get('precio_venta'),
            'stock' => $this->request->get('stock')
        ]);

        return redirect()->to('/producto');
    }*/
}