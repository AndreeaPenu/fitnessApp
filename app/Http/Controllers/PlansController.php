<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Workout;
use App\Exercise;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
use App\User;
use App\Set;

class PlansController extends Controller
{

    public function index()
    {
        $plans = Plan::all();
        $userPlans = DB::table('plans')->where('user_id', auth()->id())->get();
        
        return view('admin.plans.index', compact('plans', 'userPlans'));
    }

    public function create()
    {
        $workouts = Workout::all();
        $id = Input::get('workouts');
      
        return view('admin.plans.create', compact('workouts','id'));
    }

    public function getExercises($id, Request $request) {
        $workout = Workout::findOrFail($id);
        $exercises = $workout->exercises()->where('workout_id', $id)->get();

   //     $checked = $request->input('myCheckboxes'); //Input::get('myCheckboxes');

        return json_encode($exercises);
  //      return view('admin.plans.exercises', compact('exercises','checked'));

    }

    public function myPlans($id) {
        $plans = Plan::all();
        $userPlans = DB::table('plans')->where('user_id', auth()->id())->get();

       return view('admin.plans.myplans', compact('plans', 'userPlans'));
      // return redirect('/admin/plans/myplans');
    }

    public function store(Request $request)
    {
        $plan = new Plan;
        $plan->user_id = Auth::user()->id;
        $plan->title = $request->title;
        $plan->description = $request->description;
        $plan->save();
        $plan->workouts()->sync($request->workouts, false);
        return redirect('/admin/plans');
    }

    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        $workouts = $plan->workouts()->where('plan_id', $id)->get();

        foreach($workouts as $workout){
            $exercises = $workout->exercises()->where('workout_id', $workout->id)->get();
        }

        $sets = Set::all();

        return view('admin.plans.show', compact('plan', 'workouts','exercises', 'sets'));
    }

    public function addPlan($id) {
        //duplicate plan
        $plan = Plan::findOrFail($id);
        $newPlan = $plan->replicate();
        $newPlan->save();

        foreach($plan->workouts as $workout)
        {
            $newPlan->workouts()->attach($workout);
        }
        $newPlan->push();
        //duplicate workouts
        foreach($plan->workouts()->get() as $w){
            $workout = Workout::with('exercises')->where('workouts.id', $w->id)->first();
            $newWorkout = $workout->replicate();
            $newWorkout->plan_id = $newPlan->id;
            $newWorkout->save();
        }

        //duplicate exercises
        foreach($workout->exercises()->get() as $e){
            $exercise = Exercise::where('exercises.id', $e->id)->first();
            $newExercise = $exercise->replicate();
            $newExercise->workout_id = $newWorkout->id;
            $newExercise->save();
        }
    }

    public function addSet($id){
        //id is van exercise
        $set = new Set;
        $set->exercise_id = $id;
        $set->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);

        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        $input = $request->all();
        $plan->update($input);

        return redirect('/admin/plans');

    }

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        Session::flash('deleted_plan', 'The workout plan has been deleted');

        return redirect('/admin/plans');
    }
}
