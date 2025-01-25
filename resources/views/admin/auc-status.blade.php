@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>All Auction Items</h2>
        <div class="box">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>End Time</th>
                        <th>Current Bid</th>
                        <th>Seller Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($auctionItems->isNotEmpty())
                        @foreach ($auctionItems as $auctionItem)
                            <tr>
                                <td>{{ $auctionItem->id }}</td>
                                <td>{{ $auctionItem->title }}</td>
                                <td>{{ $auctionItem->end_time }}</td>
                                <td>{{ $auctionItem->current_bid }}</td>
                                <td>{{ $auctionItem->seller->name }}</td>
                                <td>
                                    @if ($auctionItem->status == 3)
                                        <button class="btn" disabled
                                            style="background-color: #FFFACD; color: #000; border-color: #FFFACD;">Waiting</button>
                                    @elseif ($auctionItem->status == 2)
                                        <button class="btn" disabled
                                            style="background-color: #74b1d2; color: #000; border-color: #74b1d2;">Approved</button>
                                    @elseif ($auctionItem->status == 1)
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
