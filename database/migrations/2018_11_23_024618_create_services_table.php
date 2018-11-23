<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_service_type')->unsigned();
            $table->integer('id_user')->unsigned();
            
            $table->integer('id_location_a')->unsigned();
            $table->string('description_a');
            $table->integer('id_location_b')->unsigned();
            $table->string('description_b');
            
            $table->timestamps();
            $table->dateTime('date_time_required');

            $table->foreing('id_service_type')->references('id')->on('service_types');
            $table->foreing('id_user')->references('id')->on('users');
            $table->foreing('id_location_a')->references('id')->on('locations');
            $table->foreing('id_location_b')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
