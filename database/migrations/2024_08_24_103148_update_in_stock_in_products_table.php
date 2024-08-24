<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Set in_stock to 1 for all existing records
        DB::table('products')->update(['in_stock' => 1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally, you could reset in_stock to 0 for all records (or another value)
        DB::table('products')->update(['in_stock' => 0]);
    }
};

