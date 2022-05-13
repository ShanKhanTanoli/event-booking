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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();

            //User Foreign Key
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('plan_id')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->string('amount')->nullable();
            $table->string('amount_decimal')->nullable();
            $table->string('currency')->nullable();
            $table->string('interval')->nullable();
            $table->string('interval_count')->nullable();
            $table->string('product_id')->nullable();

            $table->string('slug')->unique()->nullable();

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
        Schema::dropIfExists('plans');
    }
};
