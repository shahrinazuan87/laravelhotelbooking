@extends('layouts.app')

@section('title')
    Edit Room
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2><i class="fa fa-pencil"></i> Edit Rooms</h2>
        <hr>
            {!! Form::model($room, ['route' => ['rooms.update',$room->id], 'method'=>'PUT']) !!}
            @include('rooms._fields')
            {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            {!! link_to('/rooms', 'Back',['class'=>'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
