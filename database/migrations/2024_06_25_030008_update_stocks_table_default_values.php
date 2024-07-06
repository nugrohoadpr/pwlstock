<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('stocks')->whereNull('ukuran37')->update(['ukuran37' => 0]);
        DB::table('stocks')->whereNull('ukuran38')->update(['ukuran38' => 0]);
        DB::table('stocks')->whereNull('ukuran39')->update(['ukuran39' => 0]);
        DB::table('stocks')->whereNull('ukuran40')->update(['ukuran40' => 0]);
        DB::table('stocks')->whereNull('ukuran41')->update(['ukuran41' => 0]);
        DB::table('stocks')->whereNull('ukuran42')->update(['ukuran42' => 0]);
        DB::table('stocks')->whereNull('ukuran43')->update(['ukuran43' => 0]);
        DB::table('stocks')->whereNull('ukuran44')->update(['ukuran44' => 0]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
