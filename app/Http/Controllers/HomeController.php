<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

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
    public function user()
    {
        $quizzes = Quiz::where('user_id',auth()->id())->paginate(5);
        
        return view('front-end.home',compact('quizzes'));
    }

    public function admin()
    {
        return view('back-end.admin');
    }
}
