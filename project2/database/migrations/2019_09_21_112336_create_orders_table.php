<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ProductID')->nullable();
            $table->string('Title')->nullable();
            $table->string('Description')->nullable();
            $table->string('Category')->nullable();
            $table->string('SubCategory')->nullable();
            $table->decimal('Price')->nullable();
            $table->integer('Quantity')->nullable();
            $table->integer('QuantityPurchase')->nullable();
            $table->string('TimePurchase')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
