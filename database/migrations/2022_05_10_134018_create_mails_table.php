<?php

use App\Models\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();

            $table->longText('subject')->nullable();

            $table->longText('message')->nullable();

            //User Foreign Key
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->tinyInteger('read')->nullable();

            $table->string('slug')->unique()->nullable();

            $table->timestamps();
        });

        for ($business = 1; $business < 6; $business++) {
            Mail::create([
                'subject' => 'This is the Subject',
                'message' => 'This is the Message',
                'user_id' => $business,
                'read' => mt_rand(0, 1),
                'slug' => Str::random(10),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
};
