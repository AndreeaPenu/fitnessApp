<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Friendship;
use App\Exercise;
use App\Workout;
use App\Weight;
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
        return view('workouts');
    }

    public function addWeight(Request $request) {
        $user = Auth::user();
        $weight = new Weight;
        $weight->user_id = $user->id;
        $weight->weight =  $request->weight;
        $weight->save();

        return redirect()->back();
    }

    public function agenda() {
        $myWorkouts = Workout::with('exercises','exercises.sets')->where('user_id', auth()->id())->get();

        return view('agenda', compact('myWorkouts'));
    }

    public function showFriends(){
        $uid = Auth::user()->id;
        $FriendRequests = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.requester')
                        ->where('status', '=', 0)
                        ->where('friendships.user_requested', '=', $uid)->get();

        $allFriends = DB::table('friendships')->where('requester', Auth::user()->id)->where('status',1)->get();
        $users = User::all();
        
        return view('showFriends', compact('allFriends','users','FriendRequests'));
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