<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Recibos extends Migration
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
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_tipo_pago' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'no_aut' => [
                'type' => 'VARCHAR',
                'constraint' => "50",
                'null'=> true,
            ],
            'numero' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'serie' => [
                'type' => 'VARCHAR',
                'constraint' => "15",
                'null'=> false,
            ],
            'nit' => [
                'type' => 'VARCHAR',
                'constraint' => "15",
                'null'=> true,
            ],
            'fecha_creacion' => [
                'type' => 'DATE',
                'null'=> false,
            ],
            'total' => [
                'type' => 'decimal',
                'constraint' => '7,2',
            ],
            'detalle' => [
                'type' => 'JSON',
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
        $this->forge->addForeignKey('id_user', 'usuarios', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tipo_pago', 'tipos_pago', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('recibos');
    }

    public function down()
    {
        //
        $this->forge->dropTable('recibos');
    }
}
