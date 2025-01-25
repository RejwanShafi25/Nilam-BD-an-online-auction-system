<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'auction_id', 'amount', 'payment_method', 'token', 'status'];

    // In Payment.php model

    public function auctionItem()
    {
        return $this->belongsTo(AuctionItem::class, 'auction_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
