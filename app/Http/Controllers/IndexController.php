<?php

namespace App\Http\Controllers;

use App\Events\VisitsForMain;
use App\Models\Category;
use App\Models\Visit;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $visit = new Visit();
        event(new VisitsForMain($visit));
        $categories = Category::all();
        return view('index', compact('categories'));
        
    }
}
