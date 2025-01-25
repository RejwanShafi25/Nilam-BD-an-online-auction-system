@extends('layouts.seller')

@section('styles')
<style>
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
@endsection


@section('content')
<div class="container">
    <h2>Sold Auction Items</h2>
    <div class="box">
        <table class="table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Title</th>
                    <th>Starting Price</th>
                    <th>Current Bid</th>
                    <th>Bidder Name</th>
                    <th>Seller Name</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @if ($auctionItems->isNotEmpty())
                    @foreach ($auctionItems as $auctionItem)
                        @foreach ($auctionItem->bidRecords as $bid)
                            <tr>
                                <td>{{ $auctionItem->id }}</td>
                                <td>{{ $auctionItem->title }}</td>
                                <td>{{ number_format($auctionItem->starting_price, 2) }}৳</td>
                                <td>{{ number_format($bid->amount, 2) }}৳</td>
                                <td>{{ $bid->bidder ? $bid->bidder->name : 'N/A' }}</td>
                                <td>{{ $auctionItem->seller ? $auctionItem->seller->name : 'N/A' }}</td>
                                <td>{{ $auctionItem->payment ? $auctionItem->payment->status : 'Pending' }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No sold items found for this seller.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
