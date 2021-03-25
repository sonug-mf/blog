<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\ActiveUser;

class DashboardController extends Controller
{

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

}
