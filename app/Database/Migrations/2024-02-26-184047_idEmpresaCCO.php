<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CampoCodigoEmpleado extends Migration {

    public function up() {

        $campos = [
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
        ];

        $this->forge->addColumn('costcenter', $campos);
    }

    public function down() {
        //
    }
}
