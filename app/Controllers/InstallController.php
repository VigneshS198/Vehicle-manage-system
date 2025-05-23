<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\ConnectionInterface;
use App\Models\UserModel;

class InstallController extends BaseController
{
    public function index()
    {
        return view('install/index');
    }

    public function migrate()
    {
        $migrate = \Config\Services::migrations();

        if ($migrate->latest() === false) {
            return "Migration failed. Please check your database.\n";
        } else {
            $seeder = \Config\Database::seeder();
            
            $seederFiles = glob(APPPATH . 'Database/Seeds/*.php');
            foreach ($seederFiles as $file) {
                $seederClass = basename($file, '.php');

                $seeder->call($seederClass);
            }

            return "Migration completed successfully, and default data seeded!\n";
        }
    }

    public function setupEnv()
    {
        $envFile = APPPATH . '.env';
        $envContent = file_get_contents($envFile);

        $envContent = str_replace('CI_ENVIRONMENT = production', 'CI_ENVIRONMENT = development', $envContent);

        file_put_contents($envFile, $envContent);

        return "Environment file updated successfully.\n";
    }
}
