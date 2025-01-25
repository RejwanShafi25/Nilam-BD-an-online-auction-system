@extends('layouts.app2')

@section('content')
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-5">
    <div class="row">
        <!-- Left Section: Product Images -->
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($auctionItem->images as $key => $image)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($auctionItem->images as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $image->url) }}" class="d-block w-100" alt="{{ $auctionItem->title }}">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Right Section: Product Details -->
        <div class="col-md-6" style="line-height: 2;">
            <h2 style="font-weight: bold; font-style: italic;">{{ $auctionItem->title }}</h2>
            <div class="d-flex align-items-center">
                <h4 class="me-3 text-danger" style="line-height: 2;">Starting Price: {{ number_format($auctionItem->starting_price, 2) }}৳</h4>
            </div>
            <div class="d-flex align-items-center">
                <h5 class="me-3 text-muted" style="line-height: 2;">Current Bid: {{ number_format($auctionItem->current_bid ?? $auctionItem->current_bid ) }}৳</h5>
            </div>

            <!-- Seller Info -->
            <p><strong>Seller:</strong> {{ $auctionItem->seller->name }}</p>

            <!-- Categories -->
            <div class="mb-3">
                @foreach($auctionItem->categories as $category)
                <span class="badge bg-primary">{{ $category->name }}</span>
                @endforeach
            </div>

            <!-- Description -->
            <div class="mb-3" style="line-height: 2;">
                <h5>Description</h5>
                <p>{{ $auctionItem->description }}</p>
            </div>

            <!-- Time Left -->
            <p><strong>Time Left:</strong>
                @if($auctionItem->isAuctionEnded())
                0 days, 0 hours, 0 minutes (Auction Ended)
                @else
                {{ $timeLeft->d }} days, {{ $timeLeft->h }} hours, {{ $timeLeft->i }} minutes
                @endif
            </p>
            <!-- Buy Now / Bid Now -->
            <div class="d-flex">
                @if($auctionItem->isAuctionEnded())
                @if($isHighestBidder)
                <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#buyNowModal">Buy Now</button>
                @else
                <p class="text-danger">This auction has been won by someone else.</p>
                @endif
                @else
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#bidModal">Bid Now</button>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal for placing a bid -->
    <div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('placeBid', $auctionItem->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="bidModalLabel">Place Your Bid</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="itemTitle">Auction Item</label>
                            <input type="text" class="form-control" value="{{ $auctionItem->title }}" disabled>
                        </div>
                        <div class="form-group mt-3"> <label for="bidAmount">Bid Amount</label> <input type="number" class="form-control" id="bidAmount" name="bid_amount" required placeholder="Enter your bid amount"> </div> <input type="hidden" name="auction_item_id" value="{{ $auctionItem->id }}">
                    </div>
                    <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary">Place Bid</button> </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyNowModalLabel">Buy Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('buyNow') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="auction_item_id" value="{{ $auctionItem->id }}">

                        <!-- User Details -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" value="{{ Auth::user()->address }}" disabled>
                        </div>

                        <!-- Current Bid -->
                        <div class="mb-3">
                            <label for="current_bid" class="form-label">Current Bid</label>
                            <input type="text" class="form-control" id="current_bid" value="{{ number_format($auctionItem->current_bid, 2) }}৳" disabled>
                        </div>

                        <!-- Payment Method -->
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select name="payment_method" class="form-select" id="payment_method" required>
                                <!-- <option value="bkash">Bkash</option> -->
                                <option value="cash_on_delivery">Cash on Delivery</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Stylish Horizontal Line -->
    <hr class="my-5" style="border-top: 3px solid #333;">

    <!-- Recent Auction Items -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">Recent Auction Items</h3>
        <div class="row">
            @foreach($recentItems as $item)
            <div class="col-md-2 mb-4">
                <a href="{{ url('/item_details/' . $item->id) }}" class="text-decoration-none">
                    <div class="card">
                        @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->url) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 180px; object-fit: cover;">
                        @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Placeholder" style="height: 150px; object-fit: cover;">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text" style="color:red;">Starting Price: {{ number_format($item->starting_price, 2) }}৳</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection