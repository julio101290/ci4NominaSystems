    <?php
    namespace App\Database\Migrations;
    use CodeIgniter\Database\Migration;
    class Tiposcalculos extends Migration
    {
    public function up()
    {
     // Tiposcalculos
    $this->forge->addField([
        'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
'idEmpresa'             => ['type' => 'int', 'constraint' => 11, 'null' => true],
'nombre'             => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
'claveTimbrado'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'claveCalculo'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'claveImpresion'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'claveLiquidacion'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'satTipoNomina'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],

        'created_at'       => ['type' => 'datetime', 'null' => true],
        'updated_at'       => ['type' => 'datetime', 'null' => true],
        'deleted_at'       => ['type' => 'datetime', 'null' => true],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('tiposcalculos', true);
    }
    public function down(){
        $this->forge->dropTable('tiposcalculos', true);
        }
    }