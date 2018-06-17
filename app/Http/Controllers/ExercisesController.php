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

    public function show()
    {
       //
    }

    public function getExercises(){

        $jsonurl = "https://www.primeboosting.com/api/exercise/getallexercises";
        $json = file_get_contents($jsonurl);
        $allExercises = json_decode($json, true);
        
        foreach($allExercises as $key => $exercise){
            $name = $exercise['Name'];
            $api_id = $exercise['ExerciseId'];
            $muscle_group = $exercise['MuscleGroup'];
            $exercise = new Exercise;
            $exercise->api_id = $api_id;
            $exercise->name = $name;
            $exercise->muscle_group = $muscle_group;
            $exercise->official = 1;
            $exercise->save();
        }  

      return view('admin.exercises.getExercises');
    }

    public function store(Request $request)
    {
        $exercise = new Exercise;
        $exercise->name = $request->name;
        $exercise->official = 1;
        $exercise->save();

        return redirect('/admin/exercises');
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
