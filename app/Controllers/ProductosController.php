<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductosModel;
class ProductosController extends Controller
{
    public function verproductos()
    {
        return view('/administrador/productos');
    }

    public function productos(): string
    {
        $ProductosModel = new \App\Models\ProductosModel();
        $productos = $ProductosModel->findAll();

        return view('/administrador/productos', ['productos' => $productos]);
    }
    /*
    public function create()
    {
        $datosproductos['perfil'] = 1;
        $model = new ProductosModel();
        $model->save([
            'id_categoria' => $this->request->get('id_categoria'),
            'nombre' => $this->request->get('nombre'),
            'precio_venta' => $this->request->get('precio_venta'),
            'stock' => $this->request->get('stock')
        ]);

        return redirect()->to('/productos');
    }

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