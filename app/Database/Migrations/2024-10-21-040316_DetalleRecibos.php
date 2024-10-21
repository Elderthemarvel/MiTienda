<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetalleRecibos extends Migration
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
            'id_recibo' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_producto' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'cantidad' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
            ],
            'sub_total' => [
                'type' => 'decimal',
                'constraint' => '7,2',
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
        $this->forge->addForeignKey('id_recibo', 'recibos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_producto', 'productos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detalle_recibos');
    }

    public function down()
    {
        //
        $this->forge->dropTable('detalle_recibos');
    }
}
