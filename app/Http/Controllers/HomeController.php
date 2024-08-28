<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            return redirect('redirects');
        }
        else{
            return view('template');
        }         
    }

    public function redirects()
    {
        $usertype = Auth::user()->role;
       
       
        if ($usertype == 'Admin') {
            return view(''); 
        }        
        else 
        {      
            $user_id = Auth::id();
            return view('home');
        }
    }
}
