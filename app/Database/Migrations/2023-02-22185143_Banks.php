    <?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;

    class Banks extends Migration
    {
    public function up()
    {
     // Banks
    $this->forge->addField([
        'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
'code'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'name'             => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
'omision'             => ['type' => 'varchar', 'constraint' => 4, 'null' => true],
'RFC'             => ['type' => 'varchar', 'constraint' => 16, 'null' => true],
'keySAT'             => ['type' => 'int', 'constraint' => 11, 'null' => true],

        'created_at'       => ['type' => 'datetime', 'null' => true],
        'updated_at'       => ['type' => 'datetime', 'null' => true],
        'deleted_at'       => ['type' => 'datetime', 'null' => true],
    ]);

    $this->forge->addKey('id', true);

    $this->forge->createTable('banks', true);
    }

    public function down(){
        $this->forge->dropTable('banks', true);
        }
    }
