<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Riesgoslaborales extends Migration {

    public function up() {
        // Riesgoslaborales
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'clase' => ['type' => 'varchar', 'constraint' => 128, 'null' => false],
            'porcentaje' => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('riesgoslaborales', true);
    }

    public function down() {
        $this->forge->dropTable('riesgoslaborales', true);
    }
}
