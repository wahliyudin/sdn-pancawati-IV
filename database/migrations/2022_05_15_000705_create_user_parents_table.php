<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('father_id');
            $table->unsignedBigInteger('mother_id');
            $table->string('alamat');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('father_id')->references('id')->on('fathers')->cascadeOnDelete();
            $table->foreign('mother_id')->references('id')->on('mothers')->cascadeOnDelete();
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
        Schema::dropIfExists('user_parents');
    }
}
