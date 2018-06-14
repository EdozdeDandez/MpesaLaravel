<table>
    <thead>
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
