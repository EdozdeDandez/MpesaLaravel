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
                    <th>ID number</th>
                    <th>Phone</th>
                    <th>Date added</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->fullName }}</td>
                        <td>{{ $customer->national_id }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>
                            <a href="{{ route('customers.one', ['customer'=> $customer->id]) }}"><i class="fa fa-eye"></i></a> |
                            <a href="{{ route('customers.edit', ['customer'=> $customer->id]) }}"><i class="fa fa-edit"></i></a> |
                            <a href="{{ route('customers.delete', ['customer'=> $customer->id]) }}"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <p>No customers registered!!!</p>
                        </td>
                    </tr>
                @endforelse
            </table>
            {{ $customers->links() }}
        </div>
    </div>
@endsection
