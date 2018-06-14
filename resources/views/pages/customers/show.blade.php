@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td><strong>Name</strong></td>
                <td>{{ $customer->fullName }}</td>
            </tr>
            <tr>
                <td><strong>ID Number</strong></td>
                <td>{{ $customer->national_id }}</td>
            </tr>
            <tr>
                <td><strong>Agent</strong></td>
                <td>{{ $customer->agent->name }}</td>
            </tr>
            <tr>
                <td><strong>Date of birth</strong></td>
                <td>{{ $customer->date_of_birth }}</td>
            </tr>
            <tr>
                <td><strong>Phone number</strong></td>
                <td>{{ $customer->phone }}</td>
            </tr>
            <tr>
                <td><strong>Date added</strong></td>
                <td>{{ $customer->created_at }}</td>
            </tr>
            <tr>
                <td><strong>Added by</strong></td>
                <td>{{ $customer->user->username }}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-4">
                <a href="{{ route('customers.edit', ['customer' => $customer->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
            <div class="col-4">
                <a href="{{ route('customers.delete', ['customer' => $customer->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
            <div class="col-4">
                <a href="{{ route('customers.show') }}" class="btn btn-info"><i class="fa fa-reply"></i> Cancel</a>
            </div>
        </div>
    </div>
@endsection
