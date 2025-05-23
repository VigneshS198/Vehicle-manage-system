<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Controllers\Services;

class AuthController extends BaseController {
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {

        if ($this->request->getMethod() == 'POST') {
            $model = new \App\Models\UserModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = $model->where('username', $username)->first();
            // dd($user);
            if ($user && password_verify($password, $user['password'])) {
                // Get role name from roles table
                $db = \Config\Database::connect();
                $builder = $db->table('roles');
                $role = $builder->where('id', $user['role_id'])->get()->getRow();
                $this->session->set([
                    'isLoggedIn' => true,
                    'role_id' => $role ? $role->id : null,
                    'username'   => $user['username'],
                    'role'       => $role ? $role->name : null,
                ]);

                return redirect()->to('/dashboard');
            } else {
                return view('auth/login', ['error' => 'Invalid credentials']);
            }
        }

        return view('auth/login');
    }


    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}
