<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family', function (Blueprint $table) {
        	$table->bigIncrements('id');
        	$table->integer('user_id')->index();
            $table->string('name');
            $table->string('relationship');
            $table->string('living');
            $table->string('occupation');
            $table->decimal('income',8,2);
            $table->string('cert');
            $table->string('tel');
            $table->year('year');
            $table->integer('status');
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
        Schema::dropIfExists('family');
    }
}
