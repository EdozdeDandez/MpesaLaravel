@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{ Form::open(['class'=>'col-md-8', "url" => "agents/update/$agent->id"]) }}
            @include('partials.agent')
            {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
            <a class="btn btn-danger" href="{{ route('agents.show') }}">Cancel</a>
        </div>
    </div>
@endsection
