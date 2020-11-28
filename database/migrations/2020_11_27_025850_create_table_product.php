<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->float('unit_value',10, 2);
            $table->float('unit_price', 10, 2);
            $table->text('description', 255);
            $table->integer('amount');
            $table->integer('product_type_id')->unsigned();
            $table->foreign('product_type_id')->references('id')
                ->on('product_type')
                ->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}
