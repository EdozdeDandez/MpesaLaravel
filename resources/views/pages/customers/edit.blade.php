@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{ Form::open(['class'=>'col-md-8', "url" => "customers/update/$customer->id"]) }}
            @include('partials.customer')
            {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
            <a class="btn btn-danger" href="{{ route('customers.show') }}">Cancel</a>
        </div>
    </div>
@endsection
