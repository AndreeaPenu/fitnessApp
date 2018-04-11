<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;

class ExercisesController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();
        
        return view('admin.exercises.index', compact('exercises'));
    }

    public function create()
    {
        return view('admin.exercises.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Exercise::create($input);
       
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
