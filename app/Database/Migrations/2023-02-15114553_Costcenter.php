<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Costcenter extends Migration {

    public function up() {
        // Costcenter
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'code' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'name' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'type' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'branchoffice' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('costcenter', true);
    }

    public function down() {
        $this->forge->dropTable('costcenter', true);
    }

}
