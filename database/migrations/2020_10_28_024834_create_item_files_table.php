<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('name');
            $table->integer('size');
            $table->string('extension');
            $table->enum('type' , ['preview' , 'file']);
            $table->timestamps();

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
        Schema::table('item_files' , function(Blueprint $table) {
            $table->dropForeign(['item_id']);
        });
        Schema::dropIfExists('item_files');
    }
}
