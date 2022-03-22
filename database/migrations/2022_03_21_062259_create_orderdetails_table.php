<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('order_id');

            $table->foreign('item_id')
            ->references('id')
            ->on('items')
            ->onDelete('cascade');

            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
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
        Schema::dropIfExists('orderdetails');
    }
};
