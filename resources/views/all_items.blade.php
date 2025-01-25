@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('All Available Auction Items') }}
    </h2>


    <div class="row">
        @foreach ($auctionItems as $item)
        <div class="col-md-4 mb-4">
            <a href="{{ url('/item_details/' . $item->id) }}" class="text-decoration-none">
                <div class="card h-100">
                    @if($item->images->isNotEmpty())
                    @php
                    $imagePath = $item->images->first()->url;
                    $fullImagePath = asset('storage/' . $imagePath);
                    @endphp
                    <img src="{{ $fullImagePath }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @else
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Placeholder" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column" style="height: 180px;">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">Starting Price: {{ number_format($item->starting_price, 2) }} Taka</p>
                        <div class="mt-auto">
                            <div class="d-flex flex-wrap">
                                @foreach($item->categories as $category)
                                <span class="badge bg-primary me-1">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $auctionItems->links() }}
    </div>
</div>
@endsection