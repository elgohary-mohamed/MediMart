<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price');
            $table->unsignedTinyInteger('discount')->nullable();
            $table->integer('stock');
            $table->foreignId('sub_category_id')->constrained();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('section_id')->constrained();
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
