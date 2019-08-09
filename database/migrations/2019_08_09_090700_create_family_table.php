<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
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
        	$table->integer('user_id')->index()->nullable();
            $table->string('relationship');
            $table->string('living');
            $table->decimal('income'8,2);
            $table->string('birthcert');
            $table->interger('tel');
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
