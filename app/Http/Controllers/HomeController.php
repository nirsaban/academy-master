<?php

namespace App\Http\Controllers;

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
    public function index()
    {
//        if(auth()->user()->role == 'student'){
//            $userCategory = Profile::whereUserId(Auth::id())->value('category_id');
//            $allJobs = $userCategory != null ? Job::where('category_id',$userCategory)->get() : Job::where('course_id',Auth::user()->course_id)->get();
//            $title = 'Find your dream job';
//            $second_title = User::find(Auth::id())->course()->value('name');
//            return view('home', compact( 'allJobs',  'title','userCategory','second_title'));
//        }
    }
}
