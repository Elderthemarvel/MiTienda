<?php 
namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model{
    protected $table      = 'productos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['id_categoria','nombre','precio_venta','stock','created_at','i´dated_at','delete_at'];
}