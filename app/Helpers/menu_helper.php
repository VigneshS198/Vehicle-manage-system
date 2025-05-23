<?php

use Config\Database;

if (!function_exists('getSidebarMenu')) {
    function getSidebarMenu(): array
    {
        if (!function_exists('userHasPermission')) {
            helper('auth');
        }

        $cache = \Config\Services::cache();
        $db = Database::connect();

        // Try to get menu from cache
        if (!$items = $cache->get('sidebar_menu')) {
            $items = $db->table('side_menu')
                ->orderBy('menu_order', 'ASC')
                ->get()
                ->getResultArray();

            // Save to cache for 1 minutes
            $cache->save('sidebar_menu', $items, 60);
        }

        // Filter items by permissions (supporting multiple permissions separated by commas)
        $items = array_filter($items, function ($item) {
            if (!empty($item['permissions'])) {
                $permissions = array_map('trim', explode(',', $item['permissions']));
                
                // Check if user has at least one required permission
                foreach ($permissions as $permission) {
                    if (userHasPermission($permission)) {
                        return true;
                    }
                }

                return false; 
            }

            return true; 
        });

        // Build nested menu tree
        $tree = [];
        $indexed = [];

        foreach ($items as $item) {
            $item['children'] = [];
            $indexed[$item['id']] = $item;
        }

        foreach ($indexed as $id => &$item) {
            if (!empty($item['parent_id']) && isset($indexed[$item['parent_id']])) {
                $indexed[$item['parent_id']]['children'][] = &$item;
            } else {
                $tree[] = &$item;
            }
        }

        return $tree;
    }
}
