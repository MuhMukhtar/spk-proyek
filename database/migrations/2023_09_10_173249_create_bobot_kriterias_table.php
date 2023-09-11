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
        Schema::create('bobot_kriterias', function (Blueprint $table) {
            $table->id();
            $table->decimal('bobot_duration', 4, 2);
            $table->decimal('bobot_cost', 4, 2);
            $table->decimal('bobot_load', 4, 2);
            $table->decimal('bobot_difficult', 4, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_kriterias');
    }
};
