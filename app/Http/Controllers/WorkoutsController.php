<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Exercise;
use App\Workout;
use App\User;
use App\Set;
use Auth;
use DB;

class WorkoutsController extends Controller
{
    public function index()
    {
        $workouts = DB::table('workouts')->orderBy('created_at','asc')->get();
        $exercises = Exercise::all();
        $userWorkouts = DB::table('workouts')->where('user_id', auth()->id())->orderBy('created_at','desc')->limit(5)->get();

        return view('workouts.index', compact('workouts','exercises','userWorkouts'));
    }

    public function create()
    {
        $exercises = DB::table('exercises')->where('official','1')->get();
        $id = Input::get('exercises');

        return view('workouts.create', compact('exercises', 'id'));
    }

    public function change($id){
        $workout = Workout::findOrFail($id);
        $exercises = $workout->exercises()->where('workout_id', $id)->get();
        $sets = Set::all();

        return view('workouts.change', compact('workout','exercises','sets'));
    }


    public function myWorkouts($id) {
        $workouts = DB::table('workouts')->where('original','1')->get();
        $userWorkouts = DB::table('workouts')->where('user_id', auth()->id())->where('deleted_at',null)->get();

        return view('workouts.myworkouts', compact('workouts', 'userWorkouts'));
    }

    public function logs(){
        $workouts = Workout::with('exercises')->get();
        $exercises = Exercise::all();
        $myWorkouts = DB::table('workouts')->where('user_id', auth()->id())->get();
        $sets = Set::all();
        $setsA =DB::table('sets')->where('exercise_id',3)->get();

         
        /* foreach($myWorkouts as $myWorkout){
            $workout = Workout::findOrFail($myWorkout->id);
            $exercises = $workout->exercises()->where('workout_id', $workout->id)->get();
            foreach($exercises as $exercise){
                $sets = $exercise->sets()->where('exercise_id', $exercise->id)->get();
               // foreach($sets as $set){
                  //  var_dump($set->created_at->format('d/m/Y'));
               // }
            } 
            
        }
    */
        return view('workouts.logs', compact('workouts','myWorkouts', 'exercises','sets','setsA'));
    }


    public function detail($id){
        $workout = Workout::findOrFail($id);
        $exercises = $workout->exercises()->where('workout_id', $workout->id)->get();
        foreach($exercises as $exercise){
            $sets = $exercise->sets()->where('exercise_id', $exercise->id)->get();
           // foreach($sets as $set){
              //  var_dump($set->created_at->format('d/m/Y'));
           // }
        } 

        return view('workouts.detail', compact('workout','exercises','sets'));
    }

    public function store(Request $request)
    {
        $workout = new Workout;
        $workout->user_id = Auth::user()->id;
        $workout->title = $request->title;
        $workout->description = $request->description;
        $workout->original = 1;
        $workout->save();
        
        foreach ($request->input("exercises") as $exercises){
            $exercise = new Exercise;
            $exercise->name = $exercises;
            $exercise->save();
            $workout->exercises()->save($exercise);
            $set = new Set;
            $set->exercise_id = $exercise->id;
            $set->save();
            $exercise->sets()->save($set);
        }

        return redirect('workouts');
    }

    public function storeExercises(Request $request, $id){

        foreach ($request->input("exercises") as $exercises){
            $workout = Workout::findOrFail($id);
            $exercise = new Exercise;
            $exercise->name = $exercises;
            $exercise->save();
            $workout->exercises()->save($exercise);
            $set = new Set;
            $set->exercise_id = $exercise->id;
            $set->save();
            $exercise->sets()->save($set);
        }
        
        return redirect()->back();
    }

    public function addExercise($id) {
        $workout = Workout::findOrFail($id);
        $exercises = Exercise::where('official', '1')->get();

        return view('workouts.addExercise', compact('exercises', 'workout'));
    }

    public function show($id)
    {
        $workout = Workout::findOrFail($id);
        $exercises = $workout->exercises()->where('workout_id', $id)->get();
        $sets = Set::all();

        return view('workouts.show', compact('workout','exercises','sets'));
    }

    public function addWorkout(Request $request, $id) {
        $uid = Auth::user()->id;
        //duplicate workout
        $workout = Workout::findOrFail($id);
        $newWorkout = $workout->replicate();
        $newWorkout->user_id = $uid;
        $newWorkout->original = 1;
        $newWorkout->save();

        //duplicate exercises
        foreach($workout->exercises()->get() as $e){
            $exercise = Exercise::with('sets')->where('exercises.id', $e->id)->first();
            $newExercise = $exercise->replicate();
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

        return view('workouts.edit', compact('workout'));
        
    }

    public function update(Request $request, $id)
    {
        $workout = Workout::findOrFail($id);
        $input = $request->all();
        $workout->update($input);
        $workout->save();

        return redirect('workouts.edit');

    }

    public function updateSet(Request $request,$id)
    {
        foreach($request->exercise_id as $key => $e){
            $exercise = Exercise::findOrFail($e);
            $set = new Set;
            $set->exercise_id = $exercise->id;
            $set->weight = $request->weight[$key];
            $set->reps = $request->reps[$key];
            $set->save();
        }

        return redirect()->back();
    } 

    public function destroy($id)
    {
        $workout = Workout::findOrFail($id);
        $workout->delete();
        Session::flash('deleted_workout', 'The workout has been deleted');

        return redirect('workouts');
    }
}
