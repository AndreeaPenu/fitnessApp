<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;

class ExercisesController extends Controller
{
    public function index()
    {
        //
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
