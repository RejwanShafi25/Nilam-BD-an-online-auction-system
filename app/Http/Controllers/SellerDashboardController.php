<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\AuctionItem;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function index()
    {
        $seller = Auth::user(); // Assuming the authenticated user is the seller

        // Get the count of auctioned items for this seller
        $auctionedItemsCount = $seller->auctionItems()->count();

        // Assuming 'status' or 'is_sold' indicates whether an item is sold
        $soldItemsCount = $seller->auctionItems()->where('status', '1')->count();

        return view('seller.dashboard', compact('seller', 'auctionedItemsCount', 'soldItemsCount'));
    }

    public function showwaiting()
    {
        // Fetch auction items where status is 3 (waiting for approval)
        $seller = Auth::user();

        // Fetch auction items where status is 3 and seller_id is the current seller
        $auctionwaitItems = AuctionItem::where('status', 3)->where('seller_id', $seller->id)->get();

        return view('seller.items-waiting', compact('auctionwaitItems'));
    }

    public function editItems()
    {
        $seller = Auth::user(); // Get the current seller
        $auctionItems = AuctionItem::where('status', 3)->where('seller_id', $seller->id)->get(); // Fetch only status 1 items

        return view('seller.edit-items', compact('auctionItems'));
    }

    public function soldItems()
    {
        // Get the currently logged-in seller's ID
        $sellerId = Auth::id();

        // Fetch auction items where status is 1 and seller_id is the current seller's ID
        $auctionItems = AuctionItem::where('status', 1)
            ->where('seller_id', $sellerId)
            ->with(['bidRecords.bidder', 'seller', 'payment'])
            ->get();
        $itemsCount = $auctionItems->count();

        // Return both the auction items and the count to the view
        return view('seller.sold-item', compact('auctionItems', 'itemsCount'));
    }

    public function biddings()
    {
        // Get the currently logged-in seller's ID
        $sellerId = Auth::id();

        // Fetch auction items where status is 1 or 2 and seller_id is the current seller's ID
        $auctionItems = AuctionItem::whereIn('status', [2])
            ->where('seller_id', $sellerId)
            ->with(['bidRecords.bidder', 'seller', 'payment']) // Eager load relationships
            ->get();

        // Get the count of auction items
        $itemsCount = $auctionItems->count();

        // Return both the auction items and the count to the view
        return view('seller.biddings', compact('auctionItems', 'itemsCount'));
    }

    // Handle deletion of auction items
    public function delete($id)
    {
        $auctionItem = AuctionItem::find($id);

        if ($auctionItem && $auctionItem->seller_id == Auth::id()) {
            $auctionItem->delete();
            return redirect()->back()->with('success', 'Auction item deleted successfully!');
        }

        return redirect()->back()->with('error', 'Auction item not found or not authorized!');
    }

    // Handle update of auction items
    public function update(Request $request)
    {
        $auctionItem = AuctionItem::find($request->auction_id);

        if ($auctionItem && $auctionItem->seller_id == Auth::id()) {
            $auctionItem->title = $request->input('title');
            $auctionItem->description = $request->input('description');
            $auctionItem->starting_price = $request->input('starting_price');
            $auctionItem->save();

            return redirect()->back()->with('success', 'Auction item updated successfully!');
        }

        return redirect()->back()->with('error', 'Auction item not found or not authorized!');
    }

    public function createAuctionItem()
    {
        $categories = Category::all(); // Fetch all available categories
        return view('seller.add-item', compact('categories'));
    }

    public function storeAuctionItem(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'starting_price' => 'required|numeric',
            'current_bid' => 'nullable|numeric',
            'end_time' => 'required|date',
            'categories' => 'required|array',
            'image_paths.*' => 'nullable|image|max:5120', // Ensure image paths are valid strings
        ]);

        // Create the auction item
        $auctionItem = AuctionItem::create([
            'title' => $request->title,
            'description' => $request->description,
            'starting_price' => $request->starting_price,
            'current_bid' => $request->current_bid,
            'end_time' => $request->end_time,
            'seller_id' => auth()->id(), // Assign the current logged-in seller's ID
        ]);

        // Attach the categories to the auction item
        $auctionItem->categories()->attach($request->categories);

        // Handling image paths
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image) {
                    // Store the image in the 'auction_images' folder in the 'public' disk
                    $imagePath = $image->store('auction_images', 'public');

                    // Save the image path to the database
                    Image::create([
                        'url' => $imagePath,  // Correct: use the path as returned by the store() method
                        'auction_item_id' => $auctionItem->id,
                    ]);

                }
            }
        }


        // Redirect the seller back to the dashboard with a success message
        return redirect()->route('seller.dashboard')->with('success', 'Auction item added successfully!');
    }
}
