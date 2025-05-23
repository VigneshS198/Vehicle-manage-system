<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        $existingAdmin = $this->db->table('users')
                                  ->where('username', 'superadmin')
                                  ->get()
                                  ->getRow();

        if (!$existingAdmin) {
            $users = [
                [
                    'first_name'    => 'Super',
                    'last_name'     => 'Admin',
                    'username'      => 'superadmin',
                    'email'         => 'superadmin@example.com',
                    'mobile_number' => '1234567890',
                    'profile_photo' => null,
                    'password'      => password_hash('password', PASSWORD_BCRYPT),
                    'role_id'       => 1, // Super Admin
                    'status'        => 'active',
                    'created_at'    => Time::now(),
                    'updated_at'    => Time::now(),
                ],
                [
                    'first_name'    => 'Admin',
                    'last_name'     => 'User',
                    'username'      => 'adminuser',
                    'email'         => 'admin@example.com',
                    'mobile_number' => '2345678901',
                    'profile_photo' => null,
                    'password'      => password_hash('password', PASSWORD_BCRYPT),
                    'role_id'       => 2, // Admin
                    'status'        => 'active',
                    'created_at'    => Time::now(),
                    'updated_at'    => Time::now(),
                ],
                [
                    'first_name'    => 'Regular',
                    'last_name'     => 'User',
                    'username'      => 'user',
                    'email'         => 'user@example.com',
                    'mobile_number' => '3456789012',
                    'profile_photo' => null,
                    'password'      => password_hash('password', PASSWORD_BCRYPT),
                    'role_id'       => 3, // User
                    'status'        => 'active',
                    'created_at'    => Time::now(),
                    'updated_at'    => Time::now(),
                ],
                [
                    'first_name'    => 'Guard',
                    'last_name'     => 'User',
                    'username'      => 'guard',
                    'email'         => 'guard@example.com',
                    'mobile_number' => '4567890123',
                    'profile_photo' => null,
                    'password'      => password_hash('password', PASSWORD_BCRYPT),
                    'role_id'       => 4, // Viewer
                    'status'        => 'active',
                    'created_at'    => Time::now(),
                    'updated_at'    => Time::now(),
                ],
            ];


            $userModel = new \App\Models\UserModel();
            $userModel->insertBatch($users);

            // $this->db->table('users')->insert($data);
            echo "Super Admin user created successfully.\n";
        } else {
            echo "Super Admin user already exists.\n";
        }
    }
}
