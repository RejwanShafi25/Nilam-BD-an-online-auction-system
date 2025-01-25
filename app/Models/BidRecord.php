<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidRecord extends Model
{
    use HasFactory;

    protected $fillable = ['auction_id', 'customer_id', 'amount'];

    public function bidder()
{
    return $this->belongsTo(User::class, 'customer_id');
}

public function auctionItem()
{
    return $this->belongsTo(AuctionItem::class, 'auction_id');
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // App/Models/BidRecord.php


}
