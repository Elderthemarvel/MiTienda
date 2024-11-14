<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InicialSeeder extends Seeder
{
    public function run()
    {
        //Tipos de Usuario
        $tipos_user =  [
            ['nom_tipo' => 'Administrador'],
            ['nom_tipo' => 'Vendedor'],
        ];
        $this->db->table('tipos')->insertBatch($tipos_user);

        //Metodos de pago por defecto
        $metodos = [
            ['nom_tipo' => 'Efectivo'],
            ['nom_tipo' => 'Tarjeta de Crédito'],
            ['nom_tipo' => 'Transferencia Bancaria'],
        ];
        $this->db->table('tipos_pago')->insertBatch($metodos);

        //Crear usuarios demo
        $usuarios = [
            [
                'id_tipo' => 2,
                'nombre' => 'Demo',
                'apellido' => 'Ventas',
                'pass' => password_hash('demo123', PASSWORD_DEFAULT),
                'correo' => 'demo.ventas@test.com',
                'genero' => 'M',
                'fecha_nacimiento' => '1990-05-15',
            ],
            [
                'id_tipo' => 1,
                'nombre' => 'Demo',
                'apellido' => 'Admin',
                'pass' => password_hash('demo456', PASSWORD_DEFAULT),
                'correo' => 'demo.admin@test.com',
                'genero' => 'M',
                'fecha_nacimiento' => '1992-08-20',
            ],
        ];
        $this->db->table('usuarios')->insertBatch($usuarios);

        //Metodos de pago por defecto
        $categorias = [
            ['nom_categoria' => 'Electrónica'],
            ['nom_categoria' => 'Ropa'],
            ['nom_categoria' => 'Hogar'],
            ['nom_categoria' => 'Juguetes'],
            ['nom_categoria' => 'Libros'],
        ];
        $this->db->table('categorias')->insertBatch($categorias);

        //Productos
        $productos = [
            [
                'id_categoria' => 1,
                'nombre' => 'Televisor',
                'precio_venta' => 500.00,
                'stock' => 10,
            ],
            [
                'id_categoria' => 1,
                'nombre' => 'Smartphone',
                'precio_venta' => 300.00,
                'stock' => 25,
            ],
            [
                'id_categoria' => 2,
                'nombre' => 'Camiseta',
                'precio_venta' => 20.00,
                'stock' => 50,
            ],
            [
                'id_categoria' => 2,
                'nombre' => 'Jeans',
                'precio_venta' => 40.00,
                'stock' => 30,
            ],
            [
                'id_categoria' => 3,
                'nombre' => 'Lámpara',
                'precio_venta' => 15.00,
                'stock' => 40,
            ],
            [
                'id_categoria' => 3,
                'nombre' => 'Sofá',
                'precio_venta' => 200.00,
                'stock' => 5,
            ],
            [
                'id_categoria' => 4,
                'nombre' => 'Muñeca',
                'precio_venta' => 25.00,
                'stock' => 60,
            ],
            [
                'id_categoria' => 5,
                'nombre' => 'Libro de Cuentos',
                'precio_venta' => 10.00,
                'stock' => 100,
            ],
        ];
        $this->db->table('productos')->insertBatch($productos);

    }
}
