<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        Log::info('message4');
        return view('user.home');
    }
    
    // public function welcome()
    // {
    //     Log::info('message1234');
        
    //     return view('user.welcome');
    // }

}
