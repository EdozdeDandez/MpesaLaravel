@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{ Form::open(['class'=>'col-md-8', "url" => "products/update/$product->id"]) }}
            @include('partials.product')
            {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
            <a class="btn btn-danger" href="{{ route('products.show') }}">Cancel</a>
        </div>
    </div>
@endsection
