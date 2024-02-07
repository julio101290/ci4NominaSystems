<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CampoNuevosEmpresa extends Migration {

    public function up() {

        $campos = [
            'certificadoCSD' => ['type' => 'varchar', 'constraint' => 1024, 'null' => true,],
            'archivoKeyCSD' => ['type' => 'varchar', 'constraint' => 1024, 'null' => true,],
            'contraCertificadoCSD' => ['type' => 'varchar', 'constraint' => 64, 'null' => true,],
        ];

        $this->forge->addColumn('empresas', $campos);
    }

    public function down() {
        //
    }
}
