<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class VentasController extends BaseController
{
    protected $perfil;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->perfil = $this->session->get('tipo');
    }
    
    public function index()
    {
        $data['perfil'] = $this->perfil;
        return view('ventas/generar_orden', $data);
    }

    public function productos()
    {
        $productos = model('ProductosModel');
        if ($productos->findAll()) {
            $response['error'] = false;
            $response['productos']=$productos->select('id,nombre,precio_venta,stock')->findAll();
        }else {
            $response['error'] = true;
        }
        
        return $this->response->setJSON($response);
    }

    public function guardar_venta(){
        $request   =   \Config\Services::request();
        $recibos   =   model("RecibosModel");
        $post = $request->getPost();
        $carrito = json_decode($post['carrito']);
    }

    public function stock(){
        $data['perfil'] = $this->perfil;
        return view('ventas/stock', $data);
    }

    public function metodos(){
        $pagos = model('TiposPagoModel');
        if ($pagos->findAll()) {
            $response['error'] = false;
            $response['pagos']=$pagos->findAll();
        }else {
            $response['error'] = true;
        }
        
        return $this->response->setJSON($response);
    }

    public function get_nit(){
        $request = \Config\Services::request();
        $nit = $request->getGet('nit');
		$cf 	= ['cf', 'CF', 'c.f.', 'C.F.', 'c/f', 'C/F', 'c.f', 'C.F', 'c/f', 'C/F', 'c.f.', 'C.F.', 'c/f.', 'C/F.', 'c-f', 'C-F', 'c-f.', 'C-F.'];
		if(in_array($nit, $cf)){
			$datos['REQUEST_DATA'] 	= [["Respuesta"=> 1,"Codigo"=> "1"]];
			$datos['RESPONSE']		= [["PAIS"=> "GT", "NIT" => "CF", "NOMBRE"=> "CONSUMIDOR FINAL", "Direccion"=> "CIUDAD"]];
			return $this->response->setJSON($datos);
			return;
		}
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://fel.gt-apps.com/api_v2/get_nit?id=2&key=a48c316a0d268c172322b6ad2412f2ba&NIT='.$nit,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return $this->response->setJSON($response);
	}

}
