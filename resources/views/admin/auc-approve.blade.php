@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Manage Auction Items</h2>
        <div class="box">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>End Time</th>
                        <th>Current Bid</th>
                        <th>Seller Name</th>
                        <th>Actions</th>
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
                                    <form action="{{ route('auction.delete', $auctionItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger" style="background-color: #fa5a84; color: #000; border-color: #fa5a84;"onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>

                                    <form action="{{ route('auction.approve', $auctionItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success" style="background-color: #3be696; color: #000; border-color: #3be696;" >Approve</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No auction items found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
