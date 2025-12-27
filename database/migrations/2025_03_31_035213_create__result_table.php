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
        Schema::create('_result', function (Blueprint $table) {
            $table->id();
            $table->string('SeatNo');
            $table->integer('RollNo');
            $table->string('Name');
            $table->string('class');
            $table->integer('Gujarati');
            $table->integer('English');
            $table->integer('Eco');
            $table->integer('Spcc');
            $table->integer('Ba');
            $table->integer('Acc');
            $table->integer('Stat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_result');
    }
};
