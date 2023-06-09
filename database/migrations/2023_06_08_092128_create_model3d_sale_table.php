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
        Schema::create('model3d_sale', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model3d_id');
            $table->unsignedBigInteger('sale_id');
            $table->timestamps();

            $table->foreign('model3d_id')->references('id')->on('model3ds')->onDelete('cascade');
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model3d_sale');
    }
};
