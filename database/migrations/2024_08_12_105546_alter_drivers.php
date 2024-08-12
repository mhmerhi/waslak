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
        Schema::table('drivers', function (Blueprint $table) {
            $table->boolean('recorded')->after('activated')->default(0);
            $table->string('type')->after('recorded')->default('Small');
            $table->text('address')->after('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->removeColumn('recorded');
            $table->removeColumn('type');
            $table->removeColumn('address');
        });
    }
};
