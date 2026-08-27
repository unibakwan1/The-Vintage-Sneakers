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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // high-top, low-top, premium
            $table->string('type_label');
            $table->text('description');
            $table->decimal('price', 15, 0);
            $table->string('image');
            $table->string('grade'); // ds, vnds
            $table->integer('rating')->default(5);
            $table->integer('stock')->default(1);
            $table->json('sizes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
