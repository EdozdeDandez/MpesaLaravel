@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('alert-success'))
            <p class="alert alert-success alert-dismissible fade show">{{ Session::get('alert-success') }}</p>
        @endif
        <div class="row justify-content-center">
            <table class="col-md-8 table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ str_limit($product->description,50,'...') }}</td>
                        <td>
                            <a href="{{ route('products.one', ['product'=> $product->id]) }}"><i class="fa fa-eye"></i></a> |
                            <a href="{{ route('products.edit', ['product'=> $product->id]) }}"><i class="fa fa-edit"></i></a> |
                            <a href="{{ route('products.delete', ['product'=> $product->id]) }}"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <p>No products!!!</p>
                        </td>
                    </tr>
                @endforelse
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
