<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProofPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proof_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bank_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('cart_id');
            $table->integer('total');
            $table->string('bank');
            $table->string('customer');
            $table->string('card_number');
            $table->string('proof_file');
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proof_payments' , function(Blueprint $table) {
            $table->dropForeign(['bank_id' , 'member_id' , 'cart_id']);
        });
        Schema::dropIfExists('proof_payments');
    }
}
