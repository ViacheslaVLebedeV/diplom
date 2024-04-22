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
        Schema::create('report_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->timestamp('from');
            $table->timestamp('to');
            $table->integer('accepted');
            $table->integer('cancelled');
            $table->integer('total_count');
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_purchases');
    }
};
