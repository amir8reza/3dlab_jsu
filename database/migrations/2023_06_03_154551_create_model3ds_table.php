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
        Schema::create('model3ds', function (Blueprint $table) {
            $table->id();
            $table->string('title', '150');
            $table->string('slug');
            $table->float('price');
            $table->string('file_format');
            $table->string('file');
            $table->foreignId('creator_id')->constrained('users', indexName: 'user_id');
            $table->text('description');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model3ds');
    }
};
