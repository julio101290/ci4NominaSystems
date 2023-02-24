<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Perceptionsanddeductions extends Migration {

    public function up() {
        // Perceptionsanddeductions
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'code' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'name' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'nameAbrev' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'type' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'Area' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'SATConcept' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'SATConceptPerceptions' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'calc' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'orden' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'payType' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'ordinary' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'otherPay' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('perceptionsanddeductions', true);
    }

    public function down() {
        $this->forge->dropTable('perceptionsanddeductions', true);
    }

}
