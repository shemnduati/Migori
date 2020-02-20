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
        	$table->integer('user_id')->index();
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
