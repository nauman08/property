<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Roletype= Auth::user()->role;

        if($Roletype == 1){
            return redirect('/admin/dashboard');
        }elseif($Roletype == 2){
            return redirect('/');
        }else {
            return redirect('/login');
        }
    }
}
