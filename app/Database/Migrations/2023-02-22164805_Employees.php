<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employees extends Migration {

    public function up() {
        // Employees
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'firstname' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'lastname' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'motherLastName' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'nameAbrev' => ['type' => 'varchar', 'constraint' => 1025, 'null' => true],
            'sex' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'birthdate' => ['type' => 'date', 'null' => true],
            'placebirth' => ['type' => 'varchar', 'constraint' => 1025, 'null' => true],
            'RFC' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'CURP' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'scholarship' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'initials' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'email' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'nip' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'turn' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'street' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'number' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'cologne' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'state' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'postalCode' => ['type' => 'varchar', 'constraint' => 5, 'null' => true],
            'phone' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'civilStatus' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'sons' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'spouse' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'father' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'mother' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'socialSecurity' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'familyMedicalUnit' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'infonavit' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'factor' => ['type' => 'varchar', 'constraint' => 8, 'null' => true],
            'date' => ['type' => 'date', 'null' => true],
            'numberInfonavit' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'nameBeneficiary' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'relationBeneficiary' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'porcenBeneficiary' => ['type' => 'varchar', 'constraint' => 3, 'null' => true],
            'nameBeneficiary2' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'relationBeneficiary2' => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'porcenBeneficiary2' => ['type' => 'varchar', 'constraint' => 3, 'null' => true],
            'bank' => ['type' => 'int', 'constraint' => 11, 'null' => true],
            'bankAccount' => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
            'creditCard' => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'statusCard' => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
            'CLABE' => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('employees', true);
    }

    public function down() {
        $this->forge->dropTable('employees', true);
    }

}
