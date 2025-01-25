<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url', 'auction_item_id'];
    
    public function auctionItem()
    {
        return $this->belongsTo(AuctionItem::class);
    }
}