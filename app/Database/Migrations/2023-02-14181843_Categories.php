<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration {

    public function up() {
        // Categories
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'minimumSalary' => ['type' => 'decimal', 'constraint' => '18,2', 'null' => true],
            'maximunSalary' => ['type' => 'decimal', 'constraint' => '18,2', 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('categories', true);
    }

    public function down() {
        $this->forge->dropTable('categories', true);
    }

}
