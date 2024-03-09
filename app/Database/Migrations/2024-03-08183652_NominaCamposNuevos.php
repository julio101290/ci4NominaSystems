<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CampoNuevosNomina extends Migration {

    public function up() {

        $campos = [
            'tipoCalculo' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
        ];

        $this->forge->addColumn('nominas', $campos);
        
    }

    public function down() {
        //
    }
}
