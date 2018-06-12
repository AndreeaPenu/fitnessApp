<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Workout;
use App\Weight;
use App\Photo;
use App\Role;
use App\User;
use Auth;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function store(UsersRequest $request)
    {
        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

       if($file = $request->file('photo_id')) {
           $name = time() . $file->getClientOriginalName();
           $file->move('images', $name);
           $photo = Photo::create(['file'=>$name]);
           $input['photo_id'] = $photo->id;
       }

       User::create($input);
       
       return redirect('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $weights = Weight::where('user_id',$user->id)->get();
        $weight = Weight::where('user_id',$user->id)->orderBy('created_at', 'desc')->first();
        $workouts = Workout::all();
         
         return view('users.show', compact('user','weights','weight','workouts'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();

        return view('users.edit', compact('user','roles'));
    }

    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //unlink(public_path() . $user->photo->file);
        $user->delete();
        Session::flash('deleted_user', 'The user has been deleted');

        return redirect('users');
    }
}
