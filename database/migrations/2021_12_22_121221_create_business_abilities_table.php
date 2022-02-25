<?php

use App\Models\BusinessAbility;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_abilities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('can_view_reservation')->nullable;
            $table->boolean('can_create_reservation')->nullable;
            $table->boolean('can_update_reservation')->nullable;
            $table->boolean('can_delete_reservation')->nullable;

            $table->boolean('can_view_client')->nullable;
            $table->boolean('can_create_client')->nullable;
            $table->boolean('can_update_client')->nullable;
            $table->boolean('can_delete_client')->nullable;
            $table->boolean('can_verify_client')->nullable;
            $table->boolean('can_un_verify_client')->nullable;

            $table->boolean('can_view_pricing_plan')->nullable;
            $table->boolean('can_create_pricing_plan')->nullable;
            $table->boolean('can_update_pricing_plan')->nullable;

            $table->timestamps();
        });
        for ($business = 1; $business < 101; $business++) {
            BusinessAbility::create([

                'user_id' => $business,

                'can_view_reservation' => 1,
                'can_create_reservation' => 1,
                'can_update_reservation' => 1,
                'can_delete_reservation' => 1,

                'can_view_client' => 1,
                'can_create_client' => 1,
                'can_update_client' => 1,
                'can_delete_client' => 1,
                'can_verify_client' => 1,
                'can_un_verify_client' => 1,

                'can_view_pricing_plan' => 1,
                'can_create_pricing_plan' => 1,
                'can_update_pricing_plan' => 1,

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
        Schema::dropIfExists('client_abilities');
    }
}
