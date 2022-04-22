<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->primary(['stylist_rut','request_id']);
            $table->string('stylist_rut');
            $table->string('request_id');
            $table->string('name');
            $table->foreign('stylist_rut')->references('rut')->on('stylists');
            $table->foreign('request_id')->references('id')->on('requests');
            $table->string('comment')->nullable();
            $table->timestamps();
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
};
