<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use Illuminate\Http\Request;

class AuctionApprovalController extends Controller
{
    public function index()
    {
        // Fetch auction items with seller details
        $auctionItems = AuctionItem::with('seller')->get(); // Eager load seller relationship

        return view('admin.auc-status', compact('auctionItems'));
    }


}
