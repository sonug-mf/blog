<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\ActiveUser;

class DashboardController extends Controller
{
    public function __construct()
    {
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    
    
    
}
