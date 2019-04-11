@extends('layouts.app')

@section('title')
    Clients
@endsection


@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2><i class="fa fa-users"></i>Clients</h2>
        <hr>
        <a href="/clients/create" class="btn btn-primary">Create</a>
        <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search In Clients">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
        </form>
        <br><br>

        @include('errors.errors')
        <table class="table table-bordered table-hover" id="clients">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td><img src="{{ url('/uploads').'/'. $client->image }}" width="30px" class="img-thumbnail"></td>
                        <td>
                        {!! Form::open(['route'=> ['clients.destroy', $client->id], 'method' => 'DELETE']) !!}
                        {!! link_to_route('clients.edit', '', [$client->id], ['class'=>'btn btn-primary btn-sm fa fa-pencil']) !!}
                        {!! link_to_route('clients.show','',[$client->id], ['class'=>'btn btn-success btn-sm fa fa-bars'])  !!}
                        {{ Form::button('<span class="fa fa-trash"></span>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick'=>'return confirm("Are you sure you want to Delete?")'] )  }}
                        {!! Form::close() !!}
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="...">
        <ul class="pagination ">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
        </nav>
    </div>
</div>
@endsection

@section('script')
@endsection
