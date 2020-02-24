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
            $table->string('name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('living')->nullable();;
            $table->string('occupation')->nullable();
            $table->decimal('income',8,2)->nullable();
            $table->binary('cert')->nullable();
            $table->string('tel')->nullable();
            $table->year('year')->nullable();
            $table->integer('status')->nullable();
            $table->integer('applicationId')->nullable();

            $table->string('who')->nullable();
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('idNumber')->nullable();
            $table->string('alt_tel')->nullable();
            $table->string('box')->nullable();
            $table->string('G_relationship')->nullable();
            $table->string('county')->nullable();
            $table->string('ward')->nullable();
            $table->string('subcounty')->nullable();
            $table->string('location')->nullable();
            $table->string('sublocation')->nullable();
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
