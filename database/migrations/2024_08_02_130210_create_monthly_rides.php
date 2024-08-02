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
        Schema::create('monthly_rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->references('id')->on('users');
            $table->foreignId('client_id')->constrained()->onDelete('cascade')->references('id')->on('clients');
            $table->foreignId('driver_id')->constrained()->onDelete('cascade')->references('id')->on('drivers');
            $table->string('type');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->float('cost');
            $table->boolean('client_paid')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_rides');
    }
};
