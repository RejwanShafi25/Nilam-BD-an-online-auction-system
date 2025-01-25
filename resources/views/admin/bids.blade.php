@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Auction Bids</h2>
    <div class="box">
        <table class="table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Title</th>
                    <th>Starting Price</th>
                    <th>Current Price</th>
                    <th>Bidder Name</th>
                    <th>Seller Name</th>
                </tr>
            </thead>
            <tbody>
                @if ($items->isNotEmpty())
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item['item_id'] }}</td>
                            <td>{{ $item['item_title'] }}</td>
                            <td>{{ number_format($item['starting_price'], 2) }}৳</td>
                            <td>{{ number_format($item['current_price'], 2) }}৳</td>
                            <td>{{ $item['bidder_name'] }}</td>
                            <td>{{ $item['seller_name'] }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">No bids found for the auction items.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
