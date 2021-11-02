<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Visit;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d');
        $visitToday = Visit::where('ip', $ip)->where('date', $date)->get();
        if ($visitToday->count() == 0) {
            $visit = new Visit();
            $visit->ip = $ip;
            $visit->date = $date;
            $visit->save();    
        }
        $categories = Category::all();
        return view('index', compact('categories'));
        
    }
}
