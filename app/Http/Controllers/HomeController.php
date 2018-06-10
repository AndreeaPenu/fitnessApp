<?php

namespace App\Http\Controllers;
use App\Workout;
use App\Exercise;
use App\Friendship;
use App\Set;
use App\User;
use Auth;
use Illuminate\Http\Request;
use DB;
use Redirect;

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

        $myWorkouts = DB::table('workouts')->where('original',0)->where('user_id', auth()->id())->get();
        $sets = Set::all();
        
  
        return view('agenda', compact('workouts', 'myWorkouts', 'exercises','sets'));
    }

    public function findFriends(){
        $uid = Auth::user()->id;
        $allUsers = DB::table('users')->where('id', '!=', $uid)->get();
        
        return view('findFriends', compact('allUsers'));
    }

    public function sendRequest($id){
        Auth::user()->addFriend($id);
        return back();
    }

    public function requests(){
        $uid = Auth::user()->id;
        $FriendRequests = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.requester')
                        ->where('status', '=', 0)
                        ->where('friendships.user_requested', '=', $uid)->get();
        return view('requests', compact('FriendRequests'));
    }

    public function accept($id){
        $uid = Auth::user()->id;
        $checkRequest = Friendship::where('requester', $id)
                ->where('user_requested', $uid)
                ->first();
        if ($checkRequest) {
            // echo "yes, update here";
            $updateFriendship = DB::table('friendships')
                    ->where('user_requested', $uid)
                    ->where('requester', $id)
                    ->update(['status' => 1]);
         
            if ($updateFriendship) {
                return back()->with('msg', 'You are now Friend with this user');
            }
        } else {
            return back()->with('msg', 'You are now Friend with this user');
        }
            
    }


}
