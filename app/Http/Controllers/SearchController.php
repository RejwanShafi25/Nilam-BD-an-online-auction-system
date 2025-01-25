<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuctionItem;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Search in auction items' titles and descriptions
        $items = AuctionItem::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->with('images')
            ->get();

        return view('search_results', compact('items', 'query'));
    }
}
