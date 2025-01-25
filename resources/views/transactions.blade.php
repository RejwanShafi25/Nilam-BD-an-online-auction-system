@extends('layouts.app2')

@section('content')
<div class="container mt-5">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Your Auction Items purchase trasnaction history') }}
    </h2>
    <br>
    <table class="table table-hover table-striped table-bordered" style="border-radius: 15px;">
        <thead class="table-dark">
            <tr>
                <th>Auction Item Title</th>
                <th>Seller Name</th>
                <th>Starting Price</th>
                <th>Current Price</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($wonItems as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->seller->name }}</td>
                <td>{{ number_format($item->starting_price, 2) }}৳</td>
                <td>{{ number_format($item->current_bid, 2) }}৳</td>
                <td>
                    @if ($item->payment && $item->payment->status == 'approved')
                    <span class="badge bg-success">Approved</span>
                    @elseif ($item->payment && $item->payment->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                    @else
                    <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
                <td>
                    @if ($item->status != 1)
                    <form action="{{ route('confirm.purchase', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                    </form>
                    @else
                    <span class="text-success">Purchase Confirmed</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">You haven't won any auction items yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection