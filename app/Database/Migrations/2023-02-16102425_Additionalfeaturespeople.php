<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Additionalfeaturespeople extends Migration {

    public function up() {
        // Additionalfeaturespeople
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
             'code' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'name' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'format' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'type' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'cid' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('additionalfeaturespeople', true);
    }

    public function down() {
        $this->forge->dropTable('additionalfeaturespeople', true);
    }

}
