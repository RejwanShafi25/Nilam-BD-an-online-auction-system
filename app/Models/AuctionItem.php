<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    protected $fillable = ['title', 'description', 'starting_price', 'current_bid', 'end_time', 'seller_id', 'status'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'auction_item_category');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function bidRecords()
    {
        return $this->hasMany(BidRecord::class, 'auction_id');
    }

    

    public function getHighestBidAttribute()
    {
        return $this->bidRecords()->max('amount');
    }


    public function isAuctionEnded()
    {
        return now()->greaterThanOrEqualTo($this->end_time);
    }


    public function isHighestBidder()
    {
        $highestBid = $this->bidRecords()->orderBy('amount', 'desc')->first();
        return $highestBid && $highestBid->user_id === auth()->id();
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'auction_id');
    }
}
