<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('saldo_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('cost');
            $table->timestamps();

            $table->foreign('saldo_id')->references('id')->on('saldo_statistics')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saldo_items' , function(Blueprint $table) {
            $table->dropForeign(['saldo_id' , 'item_id']);
        });
        Schema::dropIfExists('saldo_items');
    }
}
