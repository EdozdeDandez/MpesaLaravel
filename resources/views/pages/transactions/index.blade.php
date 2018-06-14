@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('alert-success'))
            <p class="alert alert-success alert-dismissible fade show">{{ Session::get('alert-success') }}</p>
        @endif
        <div class="text-right">
            <a href="{{ route('transactions.export') }}" class="btn btn-link green"><i class="fa fa-2x fa-file-excel-o"></i></a>
        </div>
        <div class="row justify-content-center">
            <table class="col-md-8 table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Reference</th>
                    <th>Amount</th>
                    <th>Destination</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Message</th>
                </tr>
                </thead>
                @forelse($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->customer->fullName }}</td>
                        <td>{{ $transaction->reference }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->destination }}</td>
                        <td>{{ $transaction->service->name }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->message }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <p>No transactions!!!</p>
                        </td>
                    </tr>
                @endforelse
            </table>
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
