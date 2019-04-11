@extends('layouts.app')

@section('title')
    {{ auth()->user()->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>User Profile</h2>
            <hr>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="2">User Info</th>
                    </tr>
                </thead>
                <tr>
                    <th width="50%">ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Roles</th>
                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Registered At</th>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                </tr>

                <tr>
                    <th>Account Updated At</th>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                </tr>
            </table>
    </div>
</div>
@endsection
