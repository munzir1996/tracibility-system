<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCteAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cte_agents', function (Blueprint $table) {
            $table->id();
            $table->json('what');
            $table->string('why');
            $table->date('when');
            $table->foreignId('cte_harvest_id');
            $table->foreignId('user_id');
            $table->foreignId('organization_id');
            $table->foreignId('manafacture_qrcode_id');
            $table->timestamps();

            $table->foreign('cte_harvest_id')->references('id')->on('cte_harvests')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('manafacture_qrcode_id')->references('id')->on('manafacture_qrcodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cte_agents');
    }
}
