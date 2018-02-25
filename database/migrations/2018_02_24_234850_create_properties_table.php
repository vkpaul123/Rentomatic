<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');

            $table->string('propertyType');
            $table->integer('seller_id')->nullable();
            $table->integer('address_id')->nullable();
            $table->double('price', 10, 2)->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('highlights')->nullable();
            $table->boolean('sold')->nullable();

            $table->string('addressText');
            $table->string('locality');
            $table->string('landmark1');
            $table->string('landmark2')->nullable();
            $table->string('street');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');

            $table->double('lat', 18, 15)->nullable();
            $table->double('lang', 18, 15)->nullable();

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
        Schema::dropIfExists('properties');
    }
}
