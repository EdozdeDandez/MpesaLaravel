@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td><strong>Name</strong></td>
                <td>{{ $service->name }}</td>
            </tr>
            <tr>
                <td><strong>Code</strong></td>
                <td>{{ $service->code }}</td>
            </tr>
            <tr>
                <td><strong>Product</strong></td>
                <td>{{ $service->product->name }}</td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>{{ $service->description }}</td>
            </tr>
            <tr>
                <td><strong>Date added</strong></td>
                <td>{{ $service->created_at }}</td>
            </tr>
            <tr>
                <td><strong>Added by</strong></td>
                <td>{{ $service->user->username }}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-4">
                <a href="{{ route('services.edit', ['service' => $service->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
            <div class="col-4">
                <a href="{{ route('services.delete', ['service' => $service->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
            <div class="col-4">
                <a href="{{ route('services.show') }}" class="btn btn-info"><i class="fa fa-reply"></i> Cancel</a>
            </div>
        </div>
    </div>
@endsection
