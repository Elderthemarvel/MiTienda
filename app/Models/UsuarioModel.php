<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model 
{
    protected $table      = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=
    [
        'id_tipo',
        'nombre',
        'apellido',
        'pass',
        'correo',
        'genero',
        'fecha_nacimiento',
        'created_at',
        'updated_at',
        'delete_at'
    ];
}