<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteSellingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_sellings', function (Blueprint $table) {
            $table->id();
            $table->json('what');
            $table->string('why');
            $table->date('when');
            $table->foreignId('cte_receiving_id');
            $table->foreignId('consumer_id');
            $table->foreignId('organization_id');
            // $table->foreignId('selling_qrcode_id');
            $table->timestamps();

            $table->foreign('cte_receiving_id')->references('id')->on('cte_receivings')->onDelete('cascade');
            $table->foreign('consumer_id')->references('id')->on('consumers')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            // $table->foreign('selling_qrcode_id')->references('id')->on('selling_qrcodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cte_sellings');
    }
}
