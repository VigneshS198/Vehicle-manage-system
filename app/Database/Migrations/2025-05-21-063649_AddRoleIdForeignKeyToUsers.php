<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRoleIdForeignKeyToUsers extends Migration
{
    public function up()
    {
        $this->db->query('
            ALTER TABLE users
            ADD CONSTRAINT fk_users_role_id
            FOREIGN KEY (role_id) REFERENCES roles(id)
            ON DELETE SET NULL
            ON UPDATE CASCADE
        ');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE users DROP FOREIGN KEY fk_users_role_id');
    }
}
