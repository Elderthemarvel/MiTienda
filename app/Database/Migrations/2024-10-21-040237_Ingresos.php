<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ingresos extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_producto' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'fecha_ingreso' => [
                'type' => 'DATE',
                'null'=> false,
            ],
            'comprobante' => [
                'type' => 'VARCHAR',
                'constraint' => "50",
                'null'=> false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_producto', 'productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ingresos');
    }

    public function down()
    {
        //
        $this->forge->dropTable('ingresos');
    }
}
