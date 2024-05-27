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
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 105)->unique();
            $table->decimal('price', 5, 2);
            $table->decimal('rating_average', 2, 1);
            $table->string('thumb')->nullable();
            $table->decimal('volume', 3, 1);
            $table->smallInteger('pieces')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beers');
    }
};
