@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{ Form::open(['class'=>'col-md-8', "url" => "services/update/$service->id"]) }}
            @include('partials.service')
            {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
            <a class="btn btn-danger" href="{{ route('services.show') }}">Cancel</a>
        </div>
    </div>
@endsection
