@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ $auctionItem->title }}</h2>
            <p>{{ $auctionItem->description }}</p>
            
            <div class="d-flex align-items-center">
                <h4 class="text-danger">{{ number_format($auctionItem->starting_price, 2) }}৳</h4>
            </div>

            <!-- Display remaining time -->
            @php
                $endTime = \Carbon\Carbon::parse($auctionItem->end_time);
                $currentTime = \Carbon\Carbon::now();
                $timeLeft = $endTime->diff($currentTime);
            @endphp
            <p>Time Left: {{ $timeLeft->days }} days, {{ $timeLeft->h }} hours, {{ $timeLeft->i }} minutes</p>

            <!-- Check if auction is over -->
            @if ($currentTime > $endTime)
                <p class="text-danger">Auction ended</p>
                @if($auctionItem->current_bid && $auctionItem->current_bid > 0 && auth()->user()->id == $highestBidder->user_id)
                    <button class="btn btn-success">Buy Now</button>
                @endif
            @else
                <!-- Auction still live -->
                <p>Current Bid: {{ number_format($auctionItem->current_bid ?? $auctionItem->starting_price, 2) }}৳</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bidModal">Bid Now</button>
            @endif
        </div>
    </div>

    <!-- Bid Modal -->
    <div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bidModalLabel">Place Your Bid</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('placeBid', $auctionItem->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="itemTitle" class="form-label">Auction Item</label>
                            <input type="text" class="form-control" id="itemTitle" value="{{ $auctionItem->title }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="bidAmount" class="form-label">Your Bid Amount</label>
                            <input type="number" name="bid_amount" class="form-control" id="bidAmount" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Place Bid</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        let bidAmount = parseFloat(document.querySelector('#bidAmount').value);
        let currentBid = {{ $auctionItem->current_bid ?? $auctionItem->starting_price }};
        
        if (bidAmount <= currentBid) {
            event.preventDefault();
            alert('Please place a bid higher than the current bid.');
        }
    });
</script>

@endsection
