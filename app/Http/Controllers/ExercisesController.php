<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;
use App\Set;


class ExercisesController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();
        
        return view('admin.exercises.index', compact('exercises'));
    }

    public function create()
    {
        $sets = Set::all();
        return view('admin.exercises.create', compact('sets'));
    }

    public function store(Request $request)
    {
        $exercise = new Exercise;
        $exercise->name = $request->name;
        $exercise->save();
        $set = new Set;
        $set->reps = $request->reps;
        $set->weight = $request->weight;
        $set->exercise_id = $exercise->id;
        $set->save();
        

        return redirect('/admin/exercises');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);

        return view('admin.exercises.edit', compact('exercise'));
    }

    public function update(Request $request, $id)
    {
        $exercise = Exercise::findOrFail($id);
        $input = $request->all();
        $exercise->update($input);

        return redirect('/admin/exercises');
    }

    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();

        return redirect('/admin/exercises');
    }
}
