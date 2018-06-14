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
                    <th>Code</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @forelse($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->code }}</td>
                        <td>{{ $service->product->name }}</td>
                        <td>{{ str_limit($service->description,50,'...') }}</td>
                        <td>
                            <a href="{{ route('services.one', ['service'=> $service->id]) }}"><i class="fa fa-eye"></i></a> |
                            <a href="{{ route('services.edit', ['service'=> $service->id]) }}"><i class="fa fa-edit"></i></a> |
                            <a href="{{ route('services.delete', ['service'=> $service->id]) }}"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <p>No services!!!</p>
                        </td>
                    </tr>
                @endforelse
            </table>
            {{ $services->links() }}
        </div>
    </div>
@endsection
