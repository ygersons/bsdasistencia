<?php

namespace App\Http\Controllers;

use App\Models\BsdAsistencia;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function index()
    {
 
        return view('admin.index');
    }


    
}