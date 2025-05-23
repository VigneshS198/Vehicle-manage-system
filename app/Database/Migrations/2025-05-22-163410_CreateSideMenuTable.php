<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSideMenuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'menu_id'        => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'null'       => true,
            ],
            'parent_id'      => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'null'       => true,
            ],
            'parent_slug'    => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'is_parent'      => [
                'type'       => 'TINYINT',
                'constraint' => 4,
                'default'    => 0,
            ],
            'name'           => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'title'          => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'slug'           => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'description'    => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'menu_order'     => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'url'            => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'permissions'    => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'icon'           => [
                'type'       => 'VARCHAR',
                'constraint' => 191,
                'null'       => true,
            ],
            'created_at'     => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at'     => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('side_menu');
    }

    public function down()
    {
        $this->forge->dropTable('side_menu');
    }
}
