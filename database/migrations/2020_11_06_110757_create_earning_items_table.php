<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earning_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('statistic_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamps();

            $table->foreign('statistic_id')->references('id')->on('earning_statistics')->onDelete('cascade');
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
        Schema::table('earning_items' , function(Blueprint $table) {
            $table->dropForeign(['statistic_id' , 'item_id']);
        });
        Schema::dropIfExists('earning_items');
    }
}
