<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaldoStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saldo_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contributor_id');
            $table->integer('total');
            $table->integer('date');
            $table->integer('month');
            $table->integer('year');
            $table->timestamps();

            $table->foreign('contributor_id')->references('id')->on('contributors')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saldo_statistics' , function(Blueprint $table) {
            $table->dropForeign(['contributor_id']);
        });
        Schema::dropIfExists('saldo_statistics');
    }
}
