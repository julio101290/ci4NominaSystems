    <?php
    namespace App\Database\Migrations;
    use CodeIgniter\Database\Migration;
    class Salariosminimos extends Migration
    {
    public function up()
    {
     // Salariosminimos
    $this->forge->addField([
        'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
'idEmpresa'             => ['type' => 'int', 'constraint' => 11, 'null' => false],
'descripcion'             => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
'importe'             => ['type' => 'decimal', 'constraint' => 18, 'null' => true],

        'created_at'       => ['type' => 'datetime', 'null' => true],
        'updated_at'       => ['type' => 'datetime', 'null' => true],
        'deleted_at'       => ['type' => 'datetime', 'null' => true],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('salariosminimos', true);
    }
    public function down(){
        $this->forge->dropTable('salariosminimos', true);
        }
    }