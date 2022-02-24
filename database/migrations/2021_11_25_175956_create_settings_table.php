<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('text_logo')->unique()->nullable();
            $table->boolean('use_text_logo')->nullable();
            $table->integer('commission_percentage')->nullable();
            $table->string('currency')->unique()->nullable();
            $table->timestamps();
        });

        Setting::create([
            'logo' => 'logo-white.png',
            'text_logo' => 'Subscribest',
            'use_text_logo' => 1,
            'commission_percentage' => 5,
            'currency' => 'eur',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
