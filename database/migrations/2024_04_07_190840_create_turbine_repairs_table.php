<?php

use App\Models\Client;
use App\Models\OrderStatus;
use App\Models\Turbine;
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
        Schema::create('turbine_repairs', function (Blueprint $table) {
            $table->id();
            $table->string("number")->unique();
            $table->integer("price")->default(0);
            $table->timestamp("deadline");
            $table->text("note")->nullable();
            $table->foreignIdFor(Turbine::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(Client::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(OrderStatus::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turbine_repairs');
    }
};
