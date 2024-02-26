<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CampoCodigoEmpleado extends Migration {

    public function up() {

        $campos = [
            'codigo' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
        ];

        $this->forge->addColumn('employees', $campos);
    }

    public function down() {
        //
    }
}
