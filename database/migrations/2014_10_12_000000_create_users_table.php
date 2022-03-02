<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('reg_no')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->longText('bio')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'business', 'client'])
                ->nullable();
            $table->enum('role_id', ['1', '2', '3'])
                ->nullable();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->string('account_id')->nullable();
            $table->string('customer_id')->nullable();

            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        $faker = Faker\Factory::create();

        User::create([
            'name' => 'admin',
            'user_name' => 'Admin',
            'bio' => $faker->text(50),
            'address' => $faker->address,
            'phone' => $faker->unique()->text(50),
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'admin',
            'role_id' => 1
        ]);

        for ($business = 1; $business < 101; $business++) {
            User::create([
                'reg_no' => strtoupper(Str::random(30)),
                'name' => $faker->name,
                'user_name' => Str::random(20),
                'bio' => $faker->text(50),
                'address' => $faker->address,
                'phone' => $faker->unique()->phoneNumber,
                'email' => 'business' . $business . '@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'business',
                'role_id' => 2,
                'created_by' => 1,
            ]);
        }

        for ($business = 1; $business < 36; $business++) {
            for ($client = 1; $client < 12; $client++) {
                User::create([
                    'reg_no' => strtoupper(Str::random(30)),
                    'name' => $faker->name,
                    'user_name' => Str::random(20),
                    'bio' => $faker->text(50),
                    'address' => $faker->address,
                    'phone' => $faker->unique()->phoneNumber,
                    'email' => 'client' . $client . mt_rand(1, 9999999) . '@email.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'client',
                    'role_id' => 3,
                    'created_by' => $business,
                ]);
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
        Schema::dropIfExists('users');
    }
}
