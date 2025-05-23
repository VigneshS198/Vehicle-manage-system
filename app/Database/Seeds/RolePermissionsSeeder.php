<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0;');

        // Get all permission IDs
        $allPermissions = $this->getAllPermissionIds();

        // Define role-permission mapping
        $rolePermissionsMap = [
            1 => $allPermissions, // Super Admin - all permissions
            2 => [1, 2, 4, 5],    // Admin - selected permissions (e.g., vehicle and product management)
            3 => [2, 5],          // User - view permissions only
            4 => [],              // Viewer - no permissions
        ];

        // Prepare insert data
        $rolePermissionsData = [];
        foreach ($rolePermissionsMap as $roleId => $permissionIds) {
            foreach ($permissionIds as $permissionId) {
                $rolePermissionsData[] = [
                    'role_id'       => $roleId,
                    'permission_id' => $permissionId,
                ];
            }
        }

        if (!empty($rolePermissionsData)) {
            $this->db->table('role_permissions')->truncate(); // Clean old data
            $this->db->table('role_permissions')->insertBatch($rolePermissionsData);
            echo "Role permissions seeded successfully.\n";
        } else {
            echo "No permissions assigned.\n";
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function getAllPermissionIds()
    {
        $permissions = $this->db->table('permissions')->select('id')->get()->getResult();
        return array_map(fn($permission) => $permission->id, $permissions);
    }
}
