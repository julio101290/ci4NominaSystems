<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Turns extends Migration {

    public function up() {
        // Turns
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'code' => ['type' => 'varchar', 'constraint' => 16, 'null' => false],
            'name' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('turns', true);
    }

    public function down() {
        $this->forge->dropTable('turns', true);
    }

}
