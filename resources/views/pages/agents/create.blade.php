@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('alert-danger'))
            <p class="alert alert-danger alert-dismissible fade show">{{ Session::get('alert-danger') }}</p>
        @endif
        <div class="row">
            {{ Form::open(['class'=>'col-md-8', 'url' => '/agents/save']) }}
            @include('partials.agent')
            {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
            <a class="btn btn-danger" href="{{ route('agents.show') }}">Cancel</a>
        </div>
    </div>
@endsection
