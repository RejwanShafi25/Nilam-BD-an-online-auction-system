@extends('layouts.app2')


@section('content')
<div class="container mt-5">
    <h2>Search Results for "{{ $query }}"</h2>
    
    @if($items->isNotEmpty())
        <div class="list-group">
            @foreach($items as $item)
                <a href="{{ url('/item_details/' . $item->id) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    @if($item->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $item->images->first()->url) }}" class="img-fluid me-3" style="width: 60px; height: 60px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/60" class="img-fluid me-3" style="width: 60px; height: 60px; object-fit: cover;">
                    @endif
                    <div>
                        <h5 class="mb-1">{{ $item->title }}</h5>
                        <p class="mb-0 text-muted">{{ number_format($item->starting_price, 2) }}৳</p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning">No items found for "{{ $query }}"</div>
    @endif
</div>
@endsection
