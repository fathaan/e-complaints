<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // Render the dashboard view
        return view('landing/dashboard');
    }
}
