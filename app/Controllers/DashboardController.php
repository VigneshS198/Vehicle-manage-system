<?php

namespace App\Controllers;

class DashboardController extends BaseController {

    protected $menuItems;

    public function __construct()
    {
        helper('auth'); // Load the helper we created
        $this->session = session();
    }

    public function index()
    {
        if (!session()->has('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access this page.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('vehicle');

        $today = date('Y-m-d');

        $todayEntryCount = $builder
            ->where("DATE(date_time)", $today)
            ->countAllResults(false);

        $checkInCount = $builder
            ->where("status", "checkin")
            ->orwhere("status", "checkout")
            ->countAllResults(false);

        $builder->resetQuery();
        $checkOutCount = $builder
            ->where("status", "checkout")
            ->countAllResults(false);

        $userCount = $db->table('users')->countAllResults();

        return view('dashboard', [
            'todayEntry'  => $todayEntryCount,
            'checkIn'     => $checkInCount,
            'checkOut'    => $checkOutCount,
            'userCount'   => $userCount,
            'section'     => 'dashboard'
        ]);
    }

}
