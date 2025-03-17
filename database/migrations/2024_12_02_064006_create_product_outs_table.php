<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_outs', function (Blueprint $table) {
            $table->id();
            $table->string('ProductCode');
            $table->foreign('ProductCode')->references('ProductCode')->on('products');
            $table->dateTime('DateTime');
            $table->integer('Quantity');
            $table->decimal('UnitPrice', 10, 2);
            $table->decimal('TotalPrice', 15, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_outs');
    }
};
