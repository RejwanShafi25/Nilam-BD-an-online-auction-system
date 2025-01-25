<style>
    .featured-category {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        transition: transform 0.2s;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add a box shadow for a raised look */
    }

    .featured-category:hover {
        transform: scale(1.05);
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        background-color: #e0e0e0;
        /* Gray background */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 10px;
        /* Center the icon and add space below */
    }

    .icon-circle img {
        height: 40px;
        /* Icon size inside the circle */
        width: auto;
    }

    .card-text {
        color: red;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Featured Categories') }}
        </h2>
        <p class="text-center text-gray-500 mb-4">Select your desired product from the featured categories!</p>
    </x-slot>

    <div class="main-content">
        <div class="container my-5">
            <div class="row">
                <!-- Loop through categories and display each category in a box -->
                @foreach($categories as $category)
                <div class="col-md-2 text-center mb-4">
                    <a href="{{ route('categories.show', ['category' => $category->name]) }}" class="text-decoration-none">
                        <div class="featured-category">
                            <div class="icon-circle">
                                <img src="{{ asset('logo/' . strtolower($category->name) . '.png') }}" alt="{{ $category->name }}">
                            </div>
                            <p>{{ $category->name }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <div class="container my-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Recently Added Auction Items') }}
        </h2>
        <p class="text-center text-gray-500 mb-4">Scroll down and click on show all to see all the auction items that are available</p>
        <div class="row">
            @foreach ($auctionItems as $item)
            <div class="col-md-4">
                <a href="{{ url('/item_details/' . $item->id) }}" class="text-decoration-none">
                    <div class="card h-100"> <!-- Ensure uniform height for the card -->
                        @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->url) }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $item->title }}">
                        @else
                        <img src="https://via.placeholder.com/250" class="card-img-top" style="height: 250px; object-fit: cover;" alt="No Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">Starting Price: {{ number_format($item->starting_price, 2) }} taka</p>
                            <p class="mt-auto">
                                @foreach($item->categories as $category)
                                <span class="badge bg-primary">{{ $category->name }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            <div class="col-md-25 text-center mt-4">
                <a href="{{route('all_items')}}" class="btn btn-primary" style="right: 20px; bottom: 20px; background-color: blue; color: white;">
                    Show All
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
