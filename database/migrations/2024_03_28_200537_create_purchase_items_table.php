<?php

use App\Models\Detail;
use App\Models\Manufacturer;
use App\Models\Provider;
use App\Models\PurchaseStatus;
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
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->string("number")->unique();
            $table->foreignIdFor(Detail::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(Provider::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(PurchaseStatus::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->integer("price")->default(0);
            $table->integer("count");
            $table->text("note")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
