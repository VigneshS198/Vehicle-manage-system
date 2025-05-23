<?php

namespace App\Controllers;

class RoleController extends BaseController
{
    public function index()
    {
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('manage_roles')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view product.');
        }

        return view('role/index');
    }

    public function rolecontrol($id)
    {

        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('manage_roles')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view product.');
        }


        $db = \Config\Database::connect();

        $role = $db->table('roles')->where('id', $id)->get()->getRow();

        if ($role->is_default == 1)
            return redirect()->to('/roles')->with('error', 'You must be logged in to access this page.');
        
        $permissions = $db->table('permissions')->get()->getResult();
        
        $rolePermissions = $db->table('role_permissions')
                              ->select('permission_id')
                              ->where('role_id', $id)
                              ->get()
                              ->getResultArray();

        $assignedPermissionIds = array_column($rolePermissions, 'permission_id');

        return view('role/control', [
            'role' => $role,
            'permissions' => $permissions,
            'assignedPermissions' => $assignedPermissionIds,
        ]);
    }

    public function savePermissions($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('role_permissions');

        // Remove existing permissions for this role
        $builder->where('role_id', $id)->delete();

        // Save new permissions
        $selected = $this->request->getPost('permissions');

        if ($selected && is_array($selected)) {
            foreach ($selected as $permId) {
                $builder->insert([
                    'role_id' => $id,
                    'permission_id' => (int)$permId
                ]);
            }
        }

        return redirect()->to("/roles/$id")->with('message', 'Permissions updated.');
    }


    public function list()
    {       
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('manage_roles')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view vehicles.');
        }

        $model = new \App\Models\RoleModel();
        $roles = $model->findAll();

        return $this->response->setJSON([
            'status' => true,
            'data'   => $roles
        ]);
    }

}