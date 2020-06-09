<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeographicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geographical', function (Blueprint $table) {
            $table->bigIncrements('id');
        	$table->unsignedBigInteger('user_id');
            $table->integer('County');
            $table->unsignedBigInteger('Ward');
            $table->integer('status');
            $table->string('Division');
            $table->string('Location');
            $table->string('Sublocation');
            $table->year('year');
            $table->string('Village');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('Ward')->references('id')->on('wards')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geographical');
    }
}
