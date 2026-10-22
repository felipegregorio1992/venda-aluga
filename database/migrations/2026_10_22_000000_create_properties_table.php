<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('type');
            $table->string('offer');
            $table->unsignedBigInteger('price');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state', 2)->default('PA');
            $table->unsignedTinyInteger('bedrooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->unsignedInteger('area');
            $table->string('image');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
