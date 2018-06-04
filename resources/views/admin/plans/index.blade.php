@extends('layouts.dashboard')

@section('content')

    <div class="container">
            @if(Session::has('deleted_plan'))
            <p>{{session('deleted_plan')}}</p>
        @endif


        <h1>Workout plans</h1>

        <div class="card">
            <div class="card-header">All workout plans</div>
            <div class="card-body">
                <table style="width:100%" class="w3-table w3-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Made by</th>
                    <th>Add to plans</th>
                </tr>
                @if($plans)
                    @foreach($plans as $plan)
                    <tr>
                        <td>{{$plan->id}}</td>
                        <td>{{$plan->title}}</td>
                        <td>{{$plan->description}}</td>
                        <td>{{$plan->user->name}}</td>
                        <td><a href="{{ url('/admin/plans/' . $plan->id . '/add') }}" class="btn btn-xs btn-info pull-right">Add plan</a></td>
                    </tr>
                    @endforeach
                @endif
                </table>
            </div>
            
        </div>

        <div class="card">
            <div class="card-header">
                My workout plans <a href="{{ url('/admin/plans/create') }}" class="btn btn-xs btn-info pull-right">Create new plan</a>
                <a href="{{ url('/admin/plans/myplans/1') }}" class="btn btn-xs btn-secondary pull-right">All my plans</a>
            </div>

            <div class="card-body">
                
             <!--   <a href="{{ url('/admin/exercises/create') }}" class="btn btn-xs btn-info pull-right">Add new exercise</a> -->

                <table style="width:100%" class="w3-table w3-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    @if($userPlans)
                        @foreach($userPlans as $userPlan)
                                <tr>
                                    <td>{{$userPlan->id}}</td>
                                    <td>{{$userPlan->title}}</td>
                                    <td>{{$userPlan->description}}</td>
                                    <td><a href="{{ url('/admin/plans/' . $userPlan->id . '') }}" class="btn btn-xs btn-primary pull-right">Details</a></td>
                                    <td><a href="{{ url('/admin/plans/' . $userPlan->id . '/edit') }}" class="btn btn-xs btn-info pull-right">Edit</a></td>
                                    <td> <a href="{{ url('/admin/workouts/' . $userPlan->id .'/addWorkout') }}" class="btn btn-xs btn-danger pull-right">Add exercises</a></td>
                                </tr>
                        @endforeach
                    @endif
                </table>
            </div>
            
        </div>
        </div>

        
    
    @endsection