<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteReceivingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_receivings', function (Blueprint $table) {
            $table->id();
            $table->json('what');
            $table->string('why');
            $table->date('when');
            $table->foreignId('cte_transport_id');
            $table->foreignId('user_id');
            $table->foreignId('organization_id');
            $table->foreignId('shipping_qrcode_id');
            $table->timestamps();

            $table->foreign('cte_transport_id')->references('id')->on('cte_transports')->onDelete('cascade');
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
        Schema::dropIfExists('cte_receivings');
    }
}
