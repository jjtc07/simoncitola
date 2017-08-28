<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

      // return view('home', ['user' => $user]);
      // return view('home')->with('user', '$user');
      // return view('home')->withUser($user);
      return view('home');
    }
}
