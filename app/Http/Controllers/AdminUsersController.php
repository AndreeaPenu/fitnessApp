<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Photo;
use App\Weight;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use Auth;


class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
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
       
       return redirect('/admin/users');
    }

    public function show($id)
    {
        return view('admin.users.show');
    }

    public function profile($id)
    {
        $user = Auth::user();
        $weights = Weight::where('user_id',$user->id)->get();
        //enkel laatste nieuwe weergeven: $weight = Weight::where('user_id',$user->id)->orderBy('created_at', 'desc')->limit(1);
        
        return view('admin.users.profile', compact('user','weights'));
    }

    public function addWeight(Request $request) {
        $user = Auth::user();
        $weight = new Weight;
        $weight->user_id = $user->id;
        $weight->weight =  $request->weight;
        
        $weight->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit', compact('user','roles'));
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
        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //unlink(public_path() . $user->photo->file);

        $user->delete();

        Session::flash('deleted_user', 'The user has been deleted');

        return redirect('/admin/users');
    }
}
