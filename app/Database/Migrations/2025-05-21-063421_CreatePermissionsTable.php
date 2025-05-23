<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'unique'     => true,
            ],
            'guard_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true, 
            ],
            'display_name' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true, 
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);  // Primary key
        $this->forge->createTable('permissions'); 
    }

    public function down()
    {
        $this->forge->dropTable('permissions');
    }
}
