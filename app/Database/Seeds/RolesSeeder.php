<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'name'             => 'Super Admin',
                'guard_name'       => 'web',
                'is_default'       => 1,
                'is_service_staff' => 0,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'name'             => 'Admin',
                'guard_name'       => 'web',
                'is_default'       => 0,
                'is_service_staff' => 0,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'name'             => 'User',
                'guard_name'       => 'web',
                'is_default'       => 0,
                'is_service_staff' => 0,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'name'             => 'Viewer',
                'guard_name'       => 'web',
                'is_default'       => 0,
                'is_service_staff' => 0,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('roles')->insertBatch($data);
    }
}
