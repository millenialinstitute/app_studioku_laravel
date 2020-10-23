<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $level_user = Auth::user()->level_user_id;
        if($level_user === 1) {
            return redirect('/admin/dashboard');
        } else if($level_user === 2) {
            return redirect('/contributor/dashboard'); 
        }  else  {
            return redirect('/member/dashboard');
        }
    }
}
