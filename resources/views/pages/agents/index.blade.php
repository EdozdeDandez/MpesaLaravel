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
                    <th>Business Name</th>
                    <th>Number</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @forelse($agents as $agent)
                    <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->fullName }}</td>
                        <td>{{ $agent->name }}</td>
                        <td>{{ $agent->agent_number }}</td>
                        <td>
                            <a href="{{ route('agents.one', ['agent' => $agent->id]) }}"><i class="fa fa-eye"></i></a> |
                            <a href="{{ route('agents.edit', ['agent' => $agent->id]) }}"><i class="fa fa-edit"></i></a> |
                            <a href="{{ route('agents.delete', ['agent' => $agent->id]) }}"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <p>No agents registered!!!</p>
                        </td>
                    </tr>
                @endforelse
            </table>
            {{ $agents->links() }}
        </div>

    </div>
@endsection
