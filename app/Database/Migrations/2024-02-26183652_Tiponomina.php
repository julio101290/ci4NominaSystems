    <?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;

    class Tiponomina extends Migration
    {
    public function up()
    {
     // Tiponomina
    $this->forge->addField([
        'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
'codigo'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'nombre'             => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
'direccion'             => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
'colonia'             => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
'ciudad'             => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
'idEmpresa'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'idSucursal'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'porcISN'             => ['type' => 'decimal', 'constraint' => 18, 'null' => true],
'entidadFederativa'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'cxcNom'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'cxpISN'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'cxcInfonavit'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'cxcIMSS'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'cxcFonacot'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'diasPeriodoNomina'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'maxDias'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'codigoPostal'             => ['type' => 'varchar', 'constraint' => 5, 'null' => true],
'riesgoPto'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'areaSalMin'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'ejecutivo'             => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
'ctaNom'             => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
'NRP'             => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
'porcRiesgoTrabajo'             => ['type' => 'varchar', 'constraint' => 32, 'null' => true],
'numSucBancaria'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],

        'created_at'       => ['type' => 'datetime', 'null' => true],
        'updated_at'       => ['type' => 'datetime', 'null' => true],
        'deleted_at'       => ['type' => 'datetime', 'null' => true],
    ]);

    $this->forge->addKey('id', true);

    $this->forge->createTable('tiponomina', true);
    }

    public function down(){
        $this->forge->dropTable('tiponomina', true);
        }
    }
