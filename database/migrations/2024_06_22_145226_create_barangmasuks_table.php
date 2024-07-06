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
        Schema::connection('mysql')->create('barangmasuks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_sepatu_id');  //foreign-key
            $table->string('type', 8);
            $table->integer('ukuran37')->nullable();
            $table->integer('ukuran38')->nullable();
            $table->integer('ukuran39')->nullable();
            $table->integer('ukuran40')->nullable();
            $table->integer('ukuran41')->nullable();
            $table->integer('ukuran42')->nullable();
            $table->integer('ukuran43')->nullable();
            $table->integer('ukuran44')->nullable();
            $table->timestamps();

            $table->foreign('nama_sepatu_id') 
                ->references('id')
                ->on('stocks')
                ->onDeletes('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangmasuks');
    }
};
