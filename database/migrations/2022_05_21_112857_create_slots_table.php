<?php

use App\Models\Slot;
use App\Models\Event;
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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();

            $table->string('slot_id')->nullable();

            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')
                ->on('events')->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('slug')->unique()->nullable();

            $table->date('starting_date')->nullable();
            $table->date('ending_date')->nullable();

            $table->time('starting_time')->nullable();
            $table->time('ending_time')->nullable();

            $table->enum('type', ['specific_day', 'daily', 'weekly'])->nullable();

            $table->string('capacity')->nullable();

            $table->string('can_book_before')->nullable();
            $table->string('can_cancel_before')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });


        $faker = \Faker\Factory::create();
        for ($business = 1; $business < 6; $business++) {
            for ($event = 1; $event < mt_rand(10, 20); $event++) {

                //Create Events
                $res = Event::create([
                    'name' => $faker->randomElement(['French Accademy', 'Cool Gym', 'English Accademy']),
                    'slug' => strtoupper(Str::random()),
                    'user_id' => $business,
                    'created_by' => 'Admin',
                ]);

                //Create Slots
                for ($slot = 1; $slot < mt_rand(10, 20); $slot++) {
                    Slot::create([
                        'slot_id' => $res->slug,
                        'event_id' => $res->id,
                        'slug' => Str::random(10),
                        'starting_date' => mt_rand(2022, 2025) . '-' . mt_rand(1, 12) . '-' . mt_rand(1, 28),
                        'ending_date' => mt_rand(2022, 2025) . '-' . mt_rand(1, 12) . '-' . mt_rand(1, 28),
                        'starting_time' => mt_rand(1, 12) . ':' . mt_rand(0, 59) . ':' . mt_rand(0, 59),
                        'ending_time' => mt_rand(1, 12) . ':' . mt_rand(0, 59) . ':' . mt_rand(0, 59),
                        'type' => $faker->randomElement(['specific_day', 'daily', 'weekly']),
                        'capacity' => mt_rand(1, 20),
                        'can_book_before' => 10,
                        'can_cancel_before' => 10,
                    ]);
                }

            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
};
