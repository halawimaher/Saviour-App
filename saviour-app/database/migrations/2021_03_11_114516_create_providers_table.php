<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('city');
            $table->integer('phone');
            $table->float('price_per_hour');
            $table->dateTime('works_from');
            $table->dateTime('works_till');
            $table->string('image');
            $table->string('confirmation_docs');
            $table->boolean('approved');

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
        Schema::dropIfExists('providers');
    }
}
