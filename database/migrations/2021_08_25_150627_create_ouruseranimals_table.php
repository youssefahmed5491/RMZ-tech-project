<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOuruseranimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ouruseranimals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('animal_id')->unique();
            $table->string('image');
            $table->string('color');
            $table->string('breed');
            $table->string('AnimalType');
            $table->string('location');
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
        Schema::dropIfExists('ouruseranimals');
    }
}
