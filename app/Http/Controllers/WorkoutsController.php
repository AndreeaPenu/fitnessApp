<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Auth;
use App\User;
use App\Workout;
use App\Exercise;
use App\Set;
use DB;

class WorkoutsController extends Controller
{
    public function index()
    {
        $workouts = Workout::all();
        $exercises = Exercise::all();
        $userWorkouts = DB::table('workouts')->where('user_id', auth()->id())->get();
        return view('admin.workouts.index', compact('workouts','exercises','userWorkouts'));
    }

    public function create()
    {
        $exercises = DB::table('exercises')->where('official','1')->get();
        $id = Input::get('exercises');
        return view('admin.workouts.create', compact('exercises', 'id'));
    }


    public function myWorkouts($id) {
        $workouts = Workout::all();
        $userWorkouts = DB::table('workouts')->where('user_id', auth()->id())->get();
        return view('admin.workouts.myworkouts', compact('workouts', 'userWorkouts'));
    }

    public function store(Request $request)
    {
        $workout = new Workout;
        $workout->user_id = Auth::user()->id;
        $workout->title = $request->title;
        $workout->description = $request->description;
        $workout->save();
      //  $workout->exercises()->sync($request->exercises, false);

      foreach ($request->input("exercises") as $exercises){
     
            $exercise = new Exercise;
            $exercise->name = $exercises; //loopen door geselecteerde velden.
            $exercise->save();
            
            $workout->exercises()->save($exercise);
            $set = new Set;
            $set->exercise_id = $exercise->id;
            $set->save();
            $exercise->sets()->save($set);
        }

        return redirect('/admin/workouts');
    }

    public function storeExercises(Request $request, $id){

        foreach ($request->input("exercises") as $exercises){
            //$workouts = Workout::all();
            $workout = Workout::findOrFail($id);


            $exercise = new Exercise;
            $exercise->name = $exercises; //loopen door geselecteerde velden.
            $exercise->save();
           // $workout->exercises()->sync( $request->exercise,false ); //ipv workout_id
            $workout->exercises()->save($exercise);
            $set = new Set;
            $set->exercise_id = $exercise->id;
            $set->save();
            $exercise->sets()->save($set);
    }
        
       return redirect()->back();
        
    }
/* 
    public function storeWorkouts(Request $request, $id) {
        $workout = new Workout;
      
        $workout->name ='naam';
      
        $workout->save();
        $workout->exercises()->sync($request->exercises, false);
    } */
    
/*     public function addWorkout($id) {
        $workouts = Workout::all();
        $plan = Plan::findOrFail($id);

        return view('admin.workouts.addWorkout', compact('workouts','plan'));
    } */

    public function addExercise($id) {
        $workout = Workout::findOrFail($id);
        $exercises = Exercise::where('official', '1')->get();

        return view('admin.workouts.addExercise', compact('exercises', 'workout'));
    }

    public function show($id)
    {
        $workout = Workout::findOrFail($id);
        $exercises = $workout->exercises()->where('workout_id', $id)->get();
        $sets = Set::all();
        return view('admin.workouts.show', compact('workout','exercises','sets'));
    }

    public function addWorkout(Request $request, $id) {
        //duplicate plan
        $workout = Workout::findOrFail($id);
        $newWorkout = $workout->replicate();
        $newWorkout->save();
/* 
         foreach($workout->exercises as $exercise)
        {
            $newWorkout->exercises()->sync($exercise, false);
        }
      //  $newWorkout->push(); */

        //duplicate exercises
        foreach($workout->exercises()->get() as $e){
            $exercise = Exercise::with('sets')->where('exercises.id', $e->id)->first();
            $newExercise = $exercise->replicate();
           // $newExercise->workout_id = $newWorkout->id;
            $newExercise->save();
            $newExercise->workouts()->sync($newWorkout);
       
 
            //duplicate sets
            foreach($exercise->sets()->get() as $s){
                $set = Set::where('sets.id', $s->id)->first();
                $newSet = $set->replicate();
                $newSet->exercise_id = $newExercise->id;
                $newSet->save();
            } 

        }
        return redirect()->back();
        
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
        $workout = Workout::findOrFail($id);

/*         $exercises = Exercise::all();
        $exercises2 = array();
        foreach ($exercises as $exercise) {
         //  if ($exercise->official == 1) {
                 $exercises2[$exercise->id] = $exercise->name;
         //   }
           
        } */

        return view('admin.workouts.edit', compact('workout'));
        
    }

    public function update(Request $request, $id)
    {
        // update workout
        $workout = Workout::findOrFail($id);
        $input = $request->all();
        $workout->update($input);
        $workout->save();

        //$workout->exercises()->sync($request->exercise);

        return redirect('/admin/workouts');

    }

    public function updateSet(Request $request,$id)
    {
      //  var_dump($request);
       /*  $set = Set::findOrFail($id);
        $input = $request->all();
        $set->update($input);
        return redirect()->back(); */

               
       $workout = Workout::findOrFail($id);
        foreach($workout->exercises()->get() as $exercise){
           foreach($exercise->sets()->get() as $set){   
             $set = new Set;
                $set->exercise_id = $exercise->id;
                $set->reps = $request->reps;
                $set->weight = $request->weight;
                $set->save(); 
            }  
            $exercise->save();
        }
        return redirect()->back(); 


        
        

        
/*         foreach ($sets as $set)
        {

            $set = new Set;
            $set->exercise_id = $exercise->id;
            $set->reps = $request->reps;
            $set->weight = $request->weight;
            $set->save();
            
        } 

        return redirect()->back(); */
      
    } 

    public function destroy($id)
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();
        Session::flash('deleted_workout', 'The workout has been deleted');
        return redirect('/admin/workouts');
    }
}
