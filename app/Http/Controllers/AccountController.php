<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\BidRecord;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account');
    }

    public function editProfile()
    {
        // Return view to update profile
        return view('account.edit-profile');
    }

    public function editPassword()
    {
        // Return view to update password
        return view('account.edit-password');
    }

    public function wonHistory()
{
    $wonAuctions = AuctionItem::whereHas('bidRecords', function ($query) {
        $query->where('customer_id', auth()->id())
              ->whereColumn('bid_records.amount', 'auction_items.current_bid')
              ->where('auction_items.end_time', '<', now());
    })->get();

    return view('account.won-history', compact('wonAuctions'));
}

// Fetch the user's transactions
public function transactions()
{
    $transactions = BidRecord::where('customer_id', auth()->id())->whereHas('auctionItem', function($query) {
        $query->where('end_time', '<', now());
    })->get();

    return view('account.transactions', compact('transactions'));
}
}
