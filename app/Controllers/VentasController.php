<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

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
        $recibos_detalle = model("RecibosDetalleModel");
        $post = $request->getPost();
        $carrito = json_decode($post['carrito']);
        $metodos = json_decode($post['metodos']);
        $num = $recibos->countAll();
        $db = \Config\Database::connect();

        $db->transStart();

        $dataRecibo = [
            "id_user"=>$this->session->get('user_id') ?? 0,
            "id_tipo_pago"=>$metodos[0]->metodo,
            "no_aut"=> $metodos[0]->numero,
            "numero"=> $num+1,
            "serie"=> 'A',
            "nit"=> $post['nit'],
            "fecha_creacion"=> date('Y-m-d'),
            "total"=> $post['total'],
            "detalle"=> json_encode($carrito),
        ];
        $recibos->insert($dataRecibo);

        $insertId = $recibos->insertID();
        $key=0;
        foreach ($carrito as $car) {
            $detalle[$key]['id_recibo'] = $insertId;
            $detalle[$key]['id_producto'] = intval($car->id);
            $detalle[$key]['cantidad'] = intval($car->cantidad);
            $detalle[$key]['sub_total'] = $car->subtotal;
            $key++;
        }
        $recibos_detalle->insertBatch($detalle);

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            $db->transRollback();
            $data['error']=true ;
        }else {
            $data['id_pago']  =   $recibos->getInsertID();
            $data['error']=false ;
        }

        return $this->response->setJSON($data);
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

    public function ventas(){
        $recibos= model('RecibosModel');
        $data['perfil'] = $this->perfil;
        $data['recibos'] =$recibos->findAll();
        return view('administrador/recibos', $data);
    }

    public function print_recibo($id){
        $recibos= model('RecibosModel');
        $data['recibo'] =$recibos->find($id);
        try {
            $html = view('docs/recibo', $data);
            $dompdf = new Dompdf();
            $dompdf->loadHtml( $html );
            //$dompdf->setPaper('b7', 'portrait');
            $dompdf->set_paper(array(0,0,216,850));
            $dompdf->set_option('dpi', 76);
            $dompdf->render();
            $dompdf->stream("cierre.pdf", array("Attachment" => false));
        } catch (Html2PdfException $e) {
            $html2pdf->clean();
            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
	}

}
