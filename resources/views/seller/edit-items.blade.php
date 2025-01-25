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
        <h2>Manage Your Auction Items</h2>
        <div class="box">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Starting Price</th>
                        <th>Current Bid</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($auctionItems->isNotEmpty())
                        @foreach ($auctionItems as $auctionItem)
                            <tr>
                                <td>{{ $auctionItem->id }}</td>
                                <td>{{ $auctionItem->title }}</td>
                                <td>{{ $auctionItem->starting_price }}</td>
                                <td>{{ $auctionItem->current_bid }}</td>
                                <td>
                                    @if ($auctionItem->status == 3)
                                        <button class="btn" disabled style="background-color: #FFFACD; color: #000;">Waiting</button>
                                    @endif
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <button class="btn btn-primary edit-btn" data-id="{{ $auctionItem->id }}" data-title="{{ $auctionItem->title }}" data-description="{{ $auctionItem->description }}" data-price="{{ $auctionItem->starting_price }}" style="background-color: #83eb78; color: #000000; border-color: #83eb78;">Edit</button>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('auction.delete', $auctionItem->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')" style="background-color: #eb7884; color: #000000; border-color: #eb7884">Delete</button>
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

    <!-- Modal for Editing Auction Item -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Auction Item</h2>
            <form id="editForm" method="POST" action="{{ route('auction.update') }}">
                @csrf
                @method('PUT')

                <input type="hidden" name="auction_id" id="auctionId">

                <div class="form-group">
                    <label for="editTitle">Title</label>
                    <input type="text" name="title" id="editTitle" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="editDescription">Description</label>
                    <textarea name="description" id="editDescription" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="editPrice">Starting Price</label>
                    <input type="number" name="starting_price" id="editPrice" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Get the modal
    var modal = document.getElementById("editModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the Edit button, open the modal
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.onclick = function() {
            var auctionId = this.getAttribute('data-id');
            var title = this.getAttribute('data-title');
            var description = this.getAttribute('data-description');
            var price = this.getAttribute('data-price');

            // Set the values in the form
            document.getElementById('auctionId').value = auctionId;
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('editPrice').value = price;

            modal.style.display = "block";
        };
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>
@endsection
