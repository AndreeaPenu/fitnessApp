@extends('layouts.dashboard')

@section('content')

<div class="container">

<div class="card">
    <div class="card-header">
        <h2>My workout plans <a href="{{ url('/admin/plans/create') }}" class="btn btn-xs btn-info pull-right">Create new plan</a></h2>
    </div>

    <div class="card-body">
        <table style="width:100%" class="w3-table w3-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                @if($userPlans)
                    @foreach($userPlans as $userPlan)
                            <tr>
                                <td>{{$userPlan->id}}</td>
                                <td>{{$userPlan->title}}</td>
                                <td>{{$userPlan->description}}</td>
                                <td> <a href="{{ url('/admin/plans/' . $userPlan->id . '') }}" class="btn btn-xs btn-info pull-right">Details plan</a></td>
                            </tr>
                    @endforeach
                @endif
            </table>
    </div>
</div>
        
    
</div>



    
    @endsection