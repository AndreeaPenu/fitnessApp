<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Workout;
use App\Exercise;

class WorkoutsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $exercises = Exercise::all();
        return view('admin.workouts.create', compact('exercises'));
    }

    public function store(Request $request)
    {
        $workout = new Workout;
      
        $workout->name = $request->name;
      
        $workout->save();
        $workout->exercises()->sync($request->exercises, false);

        return redirect('/admin/workouts');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
