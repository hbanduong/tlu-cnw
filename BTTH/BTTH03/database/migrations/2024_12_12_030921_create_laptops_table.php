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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id('laptop_id');
            $table->string('brand');
            $table->string('model');
            $table->string('specifications');
            $table->boolean('renter_status');
            $table->unsignedBigInteger('renter_id');
            $table->foreign('renter_id')->references('renter_id')->on('renters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
