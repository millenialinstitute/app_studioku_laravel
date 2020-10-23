<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contributor_id');
            $table->string('title');
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->integer('cost');
            $table->enum('status' , ['waiting' , 'reject' , 'accept']);
            $table->timestamps();


            $table->foreign('contributor_id')->references('id')->on('contributors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items' , function(Blueprint $table){
            $table->dropForeign(['category_id' , 'contributor_id']);
        });
        Schema::dropIfExists('items');
    }
}
