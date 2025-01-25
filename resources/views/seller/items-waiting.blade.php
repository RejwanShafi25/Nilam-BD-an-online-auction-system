@extends('layouts.seller')

@section('content')
    <div class="container">
        <h2>Product Approval</h2>
        <div class="box">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Starting Price</th>
                        <th>Current Bid</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($auctionwaitItems->isNotEmpty())
                        @foreach ($auctionwaitItems as $auctionwaitItem)
                            <tr>
                                <td>{{ $auctionwaitItem->id }}</td>
                                <td>{{ $auctionwaitItem->title }}</td>
                                <td>{{ $auctionwaitItem->starting_price }}</td>
                                <td>{{ $auctionwaitItem->current_bid }}</td>
                                <td>
                                    @if ($auctionwaitItem->status == 3)
                                        <button class="btn" disabled
                                            style="background-color: #FFFACD; color: #000; border-color: #FFFACD;">Waiting</button>
                                    @elseif ($auctionwaitItem->status == 2)
                                        <button class="btn" disabled
                                            style="background-color: #74b1d2; color: #000; border-color: #74b1d2;">Approved</button>
                                    @elseif ($auctionwaitItem->status == 1)
                                        <button class="btn" disabled
                                            style="background-color: #7cd274; color: #000; border-color: #7cd274;">Sold</button>
                                    @else
                                        <button class="btn btn-secondary" disabled>Unknown Status</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No auction items found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
