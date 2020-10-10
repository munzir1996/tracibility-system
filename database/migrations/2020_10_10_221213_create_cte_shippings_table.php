<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_shippings', function (Blueprint $table) {
            $table->id();
            $table->json('what');
            $table->string('why');
            $table->date('when');
            $table->foreignId('cte_agent_id');
            $table->foreignId('user_id');
            $table->foreignId('organization_id');
            $table->foreignId('shipping_qrcode_id');
            $table->timestamps();

            $table->foreign('cte_agent_id')->references('id')->on('cte_agents')->onDelete('cascade');
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
        Schema::dropIfExists('cte_shippings');
    }
}
