<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoldItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // 購入者
            $table->foreignId('item_id')->constrained()->cascadeOnDelete(); // 購入商品
            $table->string('postal_code', 10);
            $table->string('address', 255);
            $table->string('building', 255)->nullable();
            $table->unsignedTinyInteger('payment_method');
            $table->timestamps();
            $table->unique('item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sold_items');
    }
}
