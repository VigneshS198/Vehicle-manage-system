<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'name'         => 'add_vehicle',
                'guard_name'   => 'web', 
                'display_name' => 'Permission to add a new vehicle',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            // [
            //     'name'         => 'edit_vehicle',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to edit vehicle details',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'name'         => 'delete_vehicle',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to delete a vehicle',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            [
                'name'         => 'view_vehicle',
                'guard_name'   => 'web',
                'display_name' => 'Permission to view vehicle details',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            // [
            //     'name'         => 'check_security',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission for security team to perform checks',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            [
                'name'         => 'mark_checked_out',
                'guard_name'   => 'web',
                'display_name' => 'Permission to mark vehicle as checked out',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            // [
            //     'name'         => 'view_vendor',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to view vendor details',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            // [                
            //     'name'         => 'add_vendor',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to add vendor details',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            [
                'name'         => 'add_product',
                'guard_name'   => 'web',
                'display_name' => 'Permission to add product details',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'name'         => 'view_product',
                'guard_name'   => 'web',
                'display_name' => 'Permission to view product details',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            // [
            //     'name'         => 'generate_reports',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to generate reports',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'name'         => 'upload_documents',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to upload documents (D.C. or P.O.)',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            [
                'name'         => 'view_vehicle_history',
                'guard_name'   => 'web',
                'display_name' => 'Permission to view vehicle history',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'name'         => 'manage_users',
                'guard_name'   => 'web',
                'display_name' => 'Permission to manage users (CRUD operations)',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            // [
            //     'name'         => 'approve_vendor',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to approve or manage vendor status',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'name'         => 'download_documents',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to download uploaded documents',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'name'         => 'view_notifications',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to view notifications or alerts',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            [
                'name'         => 'assign_roles',
                'guard_name'   => 'web',
                'display_name' => 'Permission to assign roles to users',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            // [
            //     'name'         => 'view_logs',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to view logs related to vehicle actions',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'name'         => 'access_settings',
            //     'guard_name'   => 'web',
            //     'display_name' => 'Permission to access system settings',
            //     'created_at'   => date('Y-m-d H:i:s'),
            //     'updated_at'   => date('Y-m-d H:i:s'),
            // ],
            [
                'name'         => 'manage_roles',
                'guard_name'   => 'web',
                'display_name' => 'Permission to access Role (CRUD operations)',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('permissions')->insertBatch($permissions);
    }
}
