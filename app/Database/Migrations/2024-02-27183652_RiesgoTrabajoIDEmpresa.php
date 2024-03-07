<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CampoNuevosRiesgoTrabajo extends Migration {

    public function up() {

        $campos = [
            'idEmpresa' => ['type' => 'bigint', 'constraint' => 20, 'null' => true],
        ];

        $this->forge->addColumn('riesgoslaborales', $campos);
    }

    public function down() {
        //
    }
}
