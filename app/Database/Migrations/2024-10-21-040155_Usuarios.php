<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
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
            'id_tipo' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => 11,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'pass' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'correo' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            'genero' => [
                'type' => 'ENUM',
                'constraint' => ['M', 'F'],
                null => false,
            ],
            'fecha_nacimiento' => [
                'type' => 'DATE'
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
        $this->forge->addUniqueKey('correo');
        $this->forge->addForeignKey('id_tipo', 'tipos', 'id');
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        //
        $this->forge->dropTable('usuarios');
    }
}
