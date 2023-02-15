<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Holidays extends Migration {

    public function up() {
        // Holidays
        $this->forge->addField([
                'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'date' => ['type' => 'date', 'null'  => true],
                'created_at'  => ['type' => 'datetime', 'null'  => true],
                'updated_at'  => ['type' => 'datetime', 'null'  => true],
                'deleted_at'  => ['type' => 'datetime', 'null'  => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('holidays', true);
    }

    public function down() {
        $this->forge->dropTable('holidays', true);
    }

}
