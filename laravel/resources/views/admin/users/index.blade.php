@extends('layouts.admin')

@section('content')

<h1>Users</h1>
@if(Session::has('deleted_user'))


<p class="bg-danger">{{session('deleted_user')}}</p>


@endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Create</th>
            <th>Update</th>


        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
            <!-- <td><img height="50" src="{{ $user->photo ? asset($user->photo->file):'Unimage' }} " alt=""></td> -->
            <td>{{$user->email}}</td>
            <td>{{$user->is_active?'active':'inactive'}}</td>
            <td>no role</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop