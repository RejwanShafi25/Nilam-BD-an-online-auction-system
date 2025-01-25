<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Correct URLs by removing '/storage/auction_images/' prefix
        DB::table('images')->update([
            'url' => DB::raw("REPLACE(url, '/storage/auction_images/', 'auction_images/')")
        ]);
    }

    public function down()
    {
        // Revert URLs by adding back '/storage/auction_images/'
        DB::table('images')->update([
            'url' => DB::raw("CONCAT('/storage/auction_images/', url)")
        ]);
    }
};
