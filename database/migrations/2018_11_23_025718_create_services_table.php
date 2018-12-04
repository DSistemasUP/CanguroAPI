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
            $table->unsignedInteger('id_service_type');
            $table->unsignedInteger('id_user');
            
            $table->unsignedInteger('id_location_a');
            $table->string('description_a');
            $table->unsignedInteger('id_location_b');
            $table->string('description_b');
            $table->string('referencia');
            
            $table->timestamps();
            $table->dateTime('date_time_required');

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_service_type')->references('id')->on('service_types');
            $table->foreign('id_location_a')->references('id')->on('locations');
            $table->foreign('id_location_b')->references('id')->on('locations');
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
        $table->dropForeign('posts_id_service_type_foreign');
        $table->dropForeign('posts_id_user_foreign');
        $table->dropForeign('posts_id_location_a_foreign');
        $table->dropForeign('posts_id_location_b_foreign');
    }
}