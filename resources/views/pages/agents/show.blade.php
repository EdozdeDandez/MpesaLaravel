@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td><strong>Name</strong></td>
                <td>{{ $agent->fullName }}</td>
            </tr>
            <tr>
                <td><strong>Agent number</strong></td>
                <td>{{ $agent->agent_number }}</td>
            </tr>
            <tr>
                <td><strong>Business name</strong></td>
                <td>{{ $agent->name }}</td>
            </tr>
            <tr>
                <td><strong>Date of birth</strong></td>
                <td>{{ $agent->date_of_birth }}</td>
            </tr>
            <tr>
                <td><strong>Date added</strong></td>
                <td>{{ $agent->created_at }}</td>
            </tr>
            <tr>
                <td><strong>Added by</strong></td>
                <td>{{ $agent->user->username }}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-4">
                <a href="{{ route('agents.edit', ['agent' => $agent->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
            <div class="col-4">
                <a href="{{ route('agents.delete', ['agent' => $agent->id]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
            </div>
            <div class="col-4">
                <a href="{{ route('agents.show') }}" class="btn btn-info"><i class="fa fa-reply"></i> Cancel</a>
            </div>
        </div>
    </div>
@endsection
