<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->string('what');
            $table->string('amount');
            $table->string('status')->default(Config::get('constants.stock.available'));
            $table->date('when');
            $table->string('why');
            $table->foreignId('cte_harvest_id');
            $table->foreignId('user_id');
            $table->foreignId('organization_id');
            $table->timestamps();

            $table->foreign('cte_harvest_id')->references('id')->on('cte_harvests')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imports');
    }
}
