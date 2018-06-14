@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td><strong>Name</strong></td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td><strong>Date added</strong></td>
                <td>{{ $product->created_at }}</td>
            </tr>
            <tr>
                <td><strong>Added by</strong></td>
                <td>{{ $product->user->username }}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-4">
                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
            <div class="col-4">
                <a href="{{ route('products.delete', ['product' => $product->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
            <div class="col-4">
                <a href="{{ route('products.show') }}" class="btn btn-info"><i class="fa fa-reply"></i> Cancel</a>
            </div>
        </div>
    </div>
@endsection
