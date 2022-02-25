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

            //Mail Settings
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_user_name')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_from_address')->nullable();
            $table->string('mail_from_name')->nullable();

            $table->timestamps();
        });

        Setting::create([
            'logo' => 'logo-white.png',
            'text_logo' => 'Subscribest',
            'use_text_logo' => 1,
            'commission_percentage' => 5,
            'currency' => 'eur',

            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '465',
            'mail_user_name' => 'shankhantanoli1@gmail.com',
            'mail_password' => 'tanoli123',
            'mail_encryption' => 'ssl',
            'mail_from_address' => 'support@subscribiest.com',
            'mail_from_name' => 'Subscribiest',
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
