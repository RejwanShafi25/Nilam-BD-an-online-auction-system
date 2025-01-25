@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Pending Payments</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Auction Item</th>
                <th>User</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->auctionItem->title }}</td>
                    <td>{{ $payment->user->name }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ ucfirst($payment->payment_method) }}</td>
                    <td>{{ ucfirst($payment->status) }}</td>
                    <td>
                        <!-- Approve Button -->
                        <a href="{{ route('admin.payment-approve', $payment->id) }}" class="btn btn-success btn-sm">
                            
                            Approve
                        </a>
                        <!-- Reject Button -->
                        <a href="{{ route('admin.payment-reject', $payment->id) }}" class="btn btn-danger btn-sm">
                            Reject
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
