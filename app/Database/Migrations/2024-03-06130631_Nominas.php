<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nominas extends Migration {

    public function up() {
        // Nominas
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'idEmpresa' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'idTipoNominas' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'clave' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'fechaInicial' => ['type' => 'date', 'null' => true],
            'fechaFinal' => ['type' => 'date', 'null' => true],
            'diasTrab' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'cerrada' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'descripcion' => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'usuarioAperturo' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'fechaCerrado' => ['type' => 'datetime', 'null' => true],
            'usuarioCerrado' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'diasPagados' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'fechaAplicacion' => ['type' => 'date', 'null' => true],
            'porcISN' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'diasFestivos' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'ise' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'proveedorISN' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'porrsg' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'UMA' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('nominas', true);
    }

    public function down() {
        $this->forge->dropTable('nominas', true);
    }
}
