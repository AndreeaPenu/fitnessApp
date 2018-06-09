<?php

namespace App\Http\Controllers;
use App\Workout;
use App\Exercise;
use App\Set;
use Illuminate\Http\Request;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function agenda() {
        //$jobs = Job::with('steps', 'poles', 'permits')->get();
        $workouts = Workout::with('exercises')->get();
        $exercises = Exercise::all();

        $myWorkouts = DB::table('workouts')->where('user_id', auth()->id())->get();
        $sets = Set::all();
        
  
        return view('agenda', compact('workouts', 'myWorkouts', 'exercises','sets'));
    }


}
