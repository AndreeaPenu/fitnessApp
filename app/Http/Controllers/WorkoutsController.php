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
        $workouts = Workout::all();
        $exercises = Exercise::all();
        return view('admin.workouts.index', compact('workouts','exercises'));
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
        $workout = Workout::findOrFail($id);
        $exercises = $workout->exercises()->where('workout_id', $id)->get();

        return view('admin.workouts.show', compact('workout', 'exercises'));
    }

    public function edit($id)
    {
        $workout = Workout::findOrFail($id);

        $exercises = Exercise::all();
        $exercises2 = array();
        foreach ($exercises as $exercise) {
            $exercises2[$exercise->id] = $exercise->name;
        }

        return view('admin.workouts.edit', compact('workout','exercises2'));
        
    }

    public function update(Request $request, $id)
    {
        // update workout
        $workout = Workout::findOrFail($id);
        $input = $request->all();
        $workout->update($input);
        $workout->save();

        $workout->exercises()->sync($request->exercise);

        return redirect('/admin/workouts');


    }

    public function destroy($id)
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();

        return redirect('/admin/workouts');
    }
}
