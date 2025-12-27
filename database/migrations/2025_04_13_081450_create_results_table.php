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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('seat');
            $table->string('roll');
            $table->string('name');
            $table->string('class');
            $table->integer('gujarati')->nullable();
            $table->integer('english')->nullable();
            $table->integer('math')->nullable();
            $table->integer('evs')->nullable();
            $table->integer('science')->nullable();
            $table->integer('socialscience')->nullable();
            $table->integer('physics')->nullable();
            $table->integer('chemistry')->nullable();
            $table->integer('mathbiology')->nullable(); // For math or biology
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
