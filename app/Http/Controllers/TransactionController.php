<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // Get the current logged-in user's ID
        $userId = Auth::id();

        // Get all auction items where the user was the highest bidder and the auction has ended
        $wonItems = AuctionItem::whereHas('bidRecords', function ($query) use ($userId) {
            $query->where('customer_id', $userId);
        })
        ->where('end_time', '<', now()) // Auction has ended
        ->whereHas('bidRecords', function ($query) {
            $query->orderBy('amount', 'desc')->limit(1); // Ensure it fetches the highest bid
        })
        ->with('seller', 'payment') // Fetch seller and payment status
        ->get();

        return view('transactions', compact('wonItems'));
    }
    public function confirmPurchase(Request $request, $id)
    {
        // Find the auction item by its ID
        $auctionItem = AuctionItem::findOrFail($id);

        // Check if the user is the highest bidder
        if (auth()->id() !== $auctionItem->bidRecords()->orderBy('amount', 'desc')->first()->customer_id) {
            return redirect()->back()->with('error', 'You are not authorized to confirm this purchase.');
        }

        // Update the status to 1 (confirmed)
        $auctionItem->update(['status' => 1]);

        return redirect()->back()->with('success', 'Purchase confirmed successfully!');
    }
    
}
