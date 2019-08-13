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
        	$table->integer('user_id')->index();
            $table->integer('County');
            $table->integer('Ward');
            $table->integer('status')->default(0);
            $table->string('Division');
            $table->string('Location');
            $table->string('Sublocation');
            $table->year('year');
            $table->string('Village');
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
        Schema::dropIfExists('geographical');
    }
}
