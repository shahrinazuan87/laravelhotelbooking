@extends('layouts.app')

@section('title')
    Edit Booking
@endsection

@section('content')
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2><i class="fa fa-pencil"></i> Edit Booking</h2>
            <hr>
                {!! Form::model($booking, ['route' => ['booking.update',$booking->id], 'method'=>'PUT']) !!}
                @include('bookings._fields')
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                {!! link_to('/booking', 'Back',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
</div>
@endsection
