<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Visit;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countAll = Visit::all()->count(); 
        $countToday = Visit::where('date', today())->count();

        return view('admin.dashboard.index', compact('countToday', 'countAll'));
    }
}
