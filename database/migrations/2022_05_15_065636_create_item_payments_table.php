<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('panitia_id');
            $table->string('payment_number');
            $table->bigInteger('billing');
            $table->string('description');

            $table->foreign('payment_id')->references('id')->on('payments')->cascadeOnDelete();
            $table->foreign('panitia_id')->references('id')->on('panitia')->cascadeOnDelete();
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
        Schema::dropIfExists('item_payments');
    }
}
