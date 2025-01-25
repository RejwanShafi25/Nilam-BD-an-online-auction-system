<?php

// database/migrations/xxxx_xx_xx_create_images_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auction_item_id');
            $table->string('url'); // Ensure this is 'url' and it is a string type
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('auction_item_id')->references('id')->on('auction_items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
