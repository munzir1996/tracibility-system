<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_harvests', function (Blueprint $table) {
            $table->id();
            $table->json('what');
            $table->string('why');
            $table->date('when');
            $table->foreignId('user_id');
            $table->foreignId('organization_id');
            $table->foreignId('harvest_qrcode_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('harvest_qrcode_id')->references('id')->on('harvest_qrcodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cte_harvests');
    }
}
