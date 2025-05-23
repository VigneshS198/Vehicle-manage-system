<?php

use CodeIgniter\Database\BaseConnection;

if (!function_exists('userHasPermission')) {
    function userHasPermission(string $permissionName): bool
    {
        $session = session();
        
        if (!$session->has('role_id')) {
            return false;
        }

        $db = \Config\Database::connect();
        $roleId = $session->get('role_id');

        if (!$roleId) {
            return false;
        }

        $builder = $db->table('permissions');
        $builder->select('permissions.name');
        $builder->join('role_permissions', 'permissions.id = role_permissions.permission_id');
        $builder->where('role_permissions.role_id', $roleId);
        $builder->where('permissions.name', $permissionName);

        $result = $builder->get()->getRow();

        return $result !== null;
    }
}
