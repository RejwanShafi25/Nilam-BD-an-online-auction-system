<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('auction_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('starting_price', 14, 2);
            $table->decimal('current_bid', 14, 2)->nullable();
            $table->dateTime('end_time');
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });


        // Schema::create('images', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('auction_item_id')->constrained('auction_items')->onDelete('cascade');
        //     $table->string('url'); // Storing the URL or path of the image
        //     $table->timestamps();
        // });
    }

    public function down(): void
    {
        Schema::dropIfExists('auction_item_category');
        Schema::dropIfExists('auction_items');
        Schema::dropIfExists('categories');
        // Schema::dropIfExists('images');
    }
};