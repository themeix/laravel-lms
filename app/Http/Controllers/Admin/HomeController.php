<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        /*return view('home');*/

        if (Auth::user()->is_admin())
        {
            return redirect(route('admin'));

        } else if (Auth::user()->is_instructor()) {
            return redirect(route('instructor'));
        }

        else if (Auth::user()->is_student()) {
            return redirect(route('student'));
        }
    }



}
