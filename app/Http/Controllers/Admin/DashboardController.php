<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Visit;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d');
     
        $visitAll = Visit::all(); 
        $visitToday = Visit::where('ip', $ip)->where('date', $date)->get();
        
        
        if ($visitToday->count() == 0) {
            $visit = new Visit();
            $visit->ip = $ip;
            $visit->date = $date;
            $visit->save();
            
        }
        $countToday = $visitToday->count();
        $countAll = $visitAll->count(); 

        return view('admin.dashboard.index', compact('countToday', 'countAll'));
    }
}
