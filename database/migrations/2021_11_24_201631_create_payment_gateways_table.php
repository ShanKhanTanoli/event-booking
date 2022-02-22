<?php

use App\Models\PaymentGateway;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->mediumText('public_key')->nullable();
            $table->mediumText('secret_key')->nullable();
            $table->mediumText('payment_mode')->nullable();
            $table->timestamps();
        });

        PaymentGateway::create([
           'public_key' => 'pk_test_yKF28OfsGchVLbr4FmAH8x61002zuh3083', 
           'secret_key' => 'sk_test_sQJFDUoOy3WAqtUupBH9V5aM00zebNYJaP',
           'payment_mode' => 'test',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_gateways');
    }
}
