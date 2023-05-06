<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Todo;

class HomeController extends Controller
{
    public function index() 
    {
        if(Auth::user())
        {
            return redirect()->route('todos.index');
        }
        else
        {
           return view('home.index'); 
        }
        
    }
}
