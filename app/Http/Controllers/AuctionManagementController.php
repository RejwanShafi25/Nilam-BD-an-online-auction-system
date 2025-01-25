<?php


namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\BidRecord;
use App\Models\User;
use Illuminate\Http\Request;

class AuctionManagementController extends Controller
{
    //
    
    public function index()
    {
        // Fetch auction items with seller details
        $auctionItems = AuctionItem::where('status', 3)->with('seller')->get();

        return view('admin.auc-approve', compact('auctionItems'));
    }
    public function delete($id)
    {
        $auctionItem = AuctionItem::find($id);

        if ($auctionItem) {
            $auctionItem->delete(); // Delete the auction item
            return redirect()->back()->with('success', 'Auction item deleted successfully!');
        }

        return redirect()->back()->with('error', 'Auction item not found!');
    }

    // Function to approve an auction item
    public function approve($id)
    {
        $auctionItem = AuctionItem::find($id);

        if ($auctionItem) {
            $auctionItem->status = 2; // Set status to 2 (Approved)
            $auctionItem->save();     // Save the update
            return redirect()->back()->with('success', 'Auction item approved successfully!');
        }

        return redirect()->back()->with('error', 'Auction item not found!');
    }

    public function bids()
    {
        // Get all auction items where the status is 2, and the current bid is not null or 0
        $auctionItems = AuctionItem::where('status', 2)
            ->whereNotNull('current_bid')
            ->where('current_bid', '>', 0)
            ->with(['bidRecords', 'seller'])
            ->get();

        // Join with the bid_records and users to get the required data
        $items = $auctionItems->map(function ($auctionItem) {
            // Get the highest bid record for this auction item
            $highestBid = $auctionItem->bidRecords()->orderBy('amount', 'desc')->first();
            $bidder = $highestBid ? User::find($highestBid->customer_id) : null;

            return [
                'item_id' => $auctionItem->id,
                'item_title' => $auctionItem->title,
                'starting_price' => $auctionItem->starting_price,
                'current_price' => $auctionItem->current_bid,
                'bidder_name' => $bidder ? $bidder->name : 'N/A',
                'seller_name' => $auctionItem->seller ? $auctionItem->seller->name : 'N/A',
            ];
        });

        return view('admin.bids', compact('items'));

}
}
