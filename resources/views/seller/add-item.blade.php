@extends('layouts.seller')

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        min-height: 100vh;
    }
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-box {
        background-color: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 400px;
    }
    .form-box input,
    .form-box select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ced4da;
        border-radius: 8px;
    }
    .form-box button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }
    .form-box button:hover {
        background-color: #0056b3;
    }
    label.form-label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        text-align: left;
    }
    /* Hide the dropdown initially */
    .category-dropdown {
        display: none;
        position: relative;
        z-index: 10;
    }
</style>
@endsection

@section('content')
<div class="form-container">
    <div class="form-box">
        <!-- Admin icon at the top -->
        <div class="text-center mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Admin Icon" style="width: 80px;">
            <h4 class="mt-2">Add New Auction Item</h4>
        </div>

        <form method="POST" action="{{ route('seller.storeAuctionItem') }}" enctype="multipart/form-data" id="auctionForm">
            @csrf

            <!-- Item Title -->
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Item Title" required>
            </div>

            <!-- Description -->
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description:</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
            </div>

            <!-- Starting Price -->
            <div class="form-group mb-3">
                <label for="starting_price" class="form-label">Starting Price:</label>
                <input type="number" class="form-control" id="starting_price" name="starting_price" placeholder="Starting Price" required step="0.01">
            </div>

            <!-- Current Bid (Optional) -->
            <div class="form-group mb-3">
                <label for="current_bid" class="form-label">Current Bid (Optional):</label>
                <input type="number" class="form-control" id="current_bid" name="current_bid" placeholder="Current Bid" step="0.01">
            </div>

            <!-- End Time -->
            <div class="form-group mb-3">
                <label for="end_time" class="form-label">Auction End Date:</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
            </div>

            <!-- Categories -->
            <div class="form-group mb-3">
                <label class="form-label">Select Category:</label>
                <!-- Toggle button -->
                <div class="btn btn-outline-primary w-100" id="category-toggle">Toggle Categories</div>

                <!-- Dropdown (Hidden initially) -->
                <div class="category-dropdown mt-2">
                    <select class="form-control" id="categories" name="categories[]" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Image Uploads -->
            <div class="form-group mb-3">
                <label for="images" class="form-label">Upload Images:</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
                <small class="form-text text-muted">You can upload up to 3 images.</small>
            </div>
            

            <!-- Submit Button -->
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Add Item</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Get the elements
    const toggleButton = document.getElementById('category-toggle');
    const dropdown = document.querySelector('.category-dropdown');

    // Toggle the dropdown when the button is clicked
    toggleButton.addEventListener('click', function() {
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function(event) {
        const isClickInside = toggleButton.contains(event.target) || dropdown.contains(event.target);
        if (!isClickInside) {
            dropdown.style.display = 'none';
        }
    });
</script>
@endsection
