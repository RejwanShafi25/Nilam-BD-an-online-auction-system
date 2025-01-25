<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\BidRecord;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Payment;


class AuctionController extends Controller
{
    public function getallitem()
    {
        $auctionItems = AuctionItem::where('status', 2)
            ->with(['categories', 'images' => function ($query) {
                $query->take(1); // Only fetch the first image for each auction item
            }])
            ->paginate(9); // 9 items per page (3 rows x 3 columns)

        return view('all_items', compact('auctionItems'));
    }

    public function dashboard()
    {
        // Fetch only the 3 most recent auction items
        $categories = Category::all();

        $auctionItems = AuctionItem::where('status', 2)
            ->orderBy('created_at', 'desc') // Order by creation date
            ->with(['categories', 'images'])
            ->take(3) // Limit to 3 items
            ->get();

        return view('dashboard', compact('categories', 'auctionItems'));
    }

    public function show($id)
    {
        $auctionItem = AuctionItem::with('images', 'categories', 'seller')->findOrFail($id);

        // Check if the auction has ended and the current bid is 0 or null
        if ($auctionItem->isAuctionEnded() && ($auctionItem->current_bid == 0 || $auctionItem->current_bid == null)) {
            // Automatically update the status to 1 (failed auction)
            $auctionItem->update(['status' => 4]);
        }

        $recentItems = AuctionItem::where('status', 2) // Filter recent items with status 2
            ->latest()
            ->take(5)
            ->get();

        $timeLeft = $this->calculateTimeLeft($auctionItem->end_time);
        $isHighestBidder = $this->isUserHighestBidder($auctionItem);

        return view('auction.show', compact('auctionItem', 'recentItems', 'timeLeft', 'isHighestBidder'));
    }

    private function calculateTimeLeft($endTime)
    {
        $now = Carbon::now();
        $end = Carbon::parse($endTime);

        if ($now->gt($end)) {
            return (object)[
                'd' => 0,
                'h' => 0,
                'i' => 0
            ];
        }

        $diff = $end->diff($now);

        return (object)[
            'd' => $diff->d,
            'h' => $diff->h,
            'i' => $diff->i
        ];
    }

    private function isUserHighestBidder($auctionItem)
    {
        if (!Auth::check()) {
            return false;
        }

        $highestBid = $auctionItem->bidRecords()->orderBy('amount', 'desc')->first();
        return $highestBid && $highestBid->customer_id === Auth::id();
    }

    public function placeBid(Request $request)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:0',
        ]);

        $auctionItem = AuctionItem::find($request->auction_item_id);

        // Check if auction has ended
        if ($auctionItem->isAuctionEnded()) {
            return redirect()->back()->with('error', 'The auction has already ended. You cannot place a bid.');
        }

        // Check if bid amount is less than starting price
        if ($request->bid_amount < $auctionItem->starting_price) {
            return redirect()->back()->with('error', 'Bid amount must be higher than the starting price.');
        }

        // Check if bid amount is less than or equal to the current highest bid
        $highestBid = $auctionItem->bidRecords()->max('amount');
        if ($highestBid && $request->bid_amount <= $highestBid) {
            return redirect()->back()->with('error', 'Bid amount must be higher than the current highest bid.');
        }

        // Save the bid in bid_records
        BidRecord::create([
            'auction_id' => $auctionItem->id,
            'customer_id' => Auth::id(),
            'amount' => $request->bid_amount,
        ]);

        // Update current bid in auction_items
        $auctionItem->current_bid = $request->bid_amount;
        $auctionItem->save();

        return redirect()->back()->with('success', 'Bid placed successfully!');
    }
    public function buyNow(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'auction_item_id' => 'required|exists:auction_items,id',
        ]);

        $auctionItem = AuctionItem::findOrFail($request->auction_item_id);

        // Handle payment processing logic
        if ($request->payment_method === 'cash_on_delivery') {
            $token = Str::random(15); // Generate random token
        } else {
            // Other payment methods can be handled here (e.g., Bkash)
            $token = null;
        }

        // Save payment record
        Payment::create([
            'user_id' => Auth::id(),
            'auction_id' => $auctionItem->id,
            'amount' => $auctionItem->current_bid,
            'payment_method' => $request->payment_method,
            'token' => $token,
            'status' => 'pending', // Mark as pending initially
        ]);

        $auctionItem->update(['status' => 1]);

        return redirect()->back()->with('success', 'Purchase successful! Check your transactions for details.');
    }
}
