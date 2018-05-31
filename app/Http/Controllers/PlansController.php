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

        return view('admin.plans.show', compact('plan', 'workouts'));
    }

    public function addPlan($id, Request $request){
        $plan = Plan::findOrFail($id);
        $user_id = Auth::user()->id;
        $newPlan = new Plan;
        $newPlan->title = $plan->title;
        $newPlan->description = $plan->description;
        $newPlan->user_id = $user_id;
        $newPlan->workouts()->sync($request->workouts, false);
        $newPlan->save();

        return redirect('/admin/plans');
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
