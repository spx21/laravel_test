<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title')->nullable();
            $table->string('Description')->nullable();
            $table->binary('Image')->nullable();
            $table->string('Category')->nullable();
            $table->string('SubCategory')->nullable();
            $table->decimal('Price')->nullable();
            $table->integer('Quantity')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function($table)
        {
            $table->string('Title')->nullable()->change();
            $table->string('Description')->nullable()->change();
            $table->binary('Image')->nullable()->change();
            $table->string('Category')->nullable()->change();
            $table->string('SubCategory')->nullable()->change();
            $table->decimal('Price')->nullable()->change();
            $table->integer('Quantity')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
