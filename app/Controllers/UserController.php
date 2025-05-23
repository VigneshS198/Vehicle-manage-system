<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('user/index');
    }

    public function list()
    {       
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!userHasPermission('manage_users')) {
            return redirect()->to('/no-access')->with('error', 'You do not have permission to view vehicles.');
        }

        $model = new \App\Models\UserModel();

        $users = $model->select('id, first_name, last_name, username, email, mobile_number, role_id, status, created_at')
                       ->findAll();

        return $this->response->setJSON([
            'status' => true,
            'data'   => $users
        ]);
    }

}