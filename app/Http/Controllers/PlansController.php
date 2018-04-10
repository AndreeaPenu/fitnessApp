<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Illuminate\Support\Facades\Session;
use Auth;

class PlansController extends Controller
{

    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

       // Plan::create($input);
        $user=Auth::user();
        $user->plans()->create($input);
       
        return redirect('/admin/plans');
    }

    public function show($id)
    {
        //
    }

    public function addPlan($id){
        $plan = Plan::findOrFail($id);
        $user_id = Auth::user()->id;
        $newPlan = new Plan;
        $newPlan->title = $plan->title;
        $newPlan->description = $plan->description;
        $newPlan->user_id = $user_id;
        //$plan = Plan::create($newPlan);
        $newPlan->save();

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
