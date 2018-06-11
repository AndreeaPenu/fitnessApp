<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Friendship;
use App\Exercise;
use App\Workout;
use App\User;
use App\Set;
use Redirect;
use Auth;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function agenda() {
        $workouts = Workout::with('exercises')->get();
        $exercises = Exercise::all();
        $myWorkouts = DB::table('workouts')->where('user_id', auth()->id())->get();
        $sets = Set::all();
  
        return view('agenda', compact('workouts', 'myWorkouts', 'exercises','sets'));
    }

    public function findFriends(){
        $uid = Auth::user()->id;
        $allUsers = DB::table('users')->where('id', '!=', $uid)->get();
        
        return view('findFriends', compact('allUsers'));
    }

    public function showFriends(){
        $allFriends = DB::table('friendships')->where('requester', Auth::user()->id)->where('status',1)->get();
        $users = User::all();
        
        return view('showFriends', compact('allFriends','users'));
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