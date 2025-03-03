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
        Schema::create('house_room', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('house_id')->constrained();
            $table->foreignId('room_id')->constrained();
            $table->integer('size')->nullable();
            $table->primary(['house_id', 'room_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_room');
    }
};
