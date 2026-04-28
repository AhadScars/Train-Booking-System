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
        Schema::create('add_trains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('train_name');
            $table->string('train_number')->unique();
            $table->string('origin');
            $table->string('destination');
            $table->time('departure_time');
            $table->time('arrival_time');

            $table->decimal('price', 8, 2);


            $table->json('classes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_trains');
    }
};
