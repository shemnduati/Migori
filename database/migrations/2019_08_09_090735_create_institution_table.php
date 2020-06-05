<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution', function (Blueprint $table) {
        	$table->bigIncrements('id');
        	$table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('branch');
            $table->string('class');
            $table->string('yearofstudy');
            $table->integer('status');
            $table->string('fees');
            $table->year('year');
            $table->string('amount_paid');
            $table->string('balance');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('institution');
    }
}
