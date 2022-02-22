<?php

use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('logo')->nullable();

            $table->string('text_logo')->unique()->nullable();

            $table->boolean('use_text_logo')->nullable();

            $table->timestamps();
        });

        for ($business = 1; $business < 101; $business++) {
            BusinessSetting::create([
                'user_id' => $business,
                'logo' => 'logo-white.png',
                'text_logo' => 'Business'.$business,
                'use_text_logo' => 1,
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
        Schema::dropIfExists('business_settings');
    }
}
