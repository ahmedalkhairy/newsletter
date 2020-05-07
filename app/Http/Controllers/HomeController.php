<?php

namespace App\Http\Controllers;

use App\Newsletter;

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


        if(auth()->user()->isAdmin()){

            return view('dashboard.admin.home');
        }

        
        $newsletters = Newsletter::paginate(10);

        return view('client.home' , compact('newsletters'));
    }

}