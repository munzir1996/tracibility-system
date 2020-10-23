<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_transports', function (Blueprint $table) {
            $table->id();
            $table->string('why');
            $table->string('what_truck')->nullable();
            $table->date('when');
            $table->foreignId('cte_shipping_id');
            $table->foreignId('user_id');
            $table->foreignId('organization_id');
            $table->foreignId('shipping_qrcode_id');
            $table->timestamps();

            $table->foreign('cte_shipping_id')->references('id')->on('cte_shippings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('shipping_qrcode_id')->references('id')->on('shipping_qrcodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cte_transports');
    }
}
