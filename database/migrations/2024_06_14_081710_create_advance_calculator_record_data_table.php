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
        Schema::create('advance_calculator_record_data', function (Blueprint $table) {
            $table->id();
            $table->string('position_id');
            $table->float('new_main_load', 20, 4);
            $table->integer('tp');
            $table->float('profit', 20, 4);
            $table->float('diff_in_numbers', 20, 4);
            $table->integer('position_persantage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advance_calculator_record_data');
    }
};
