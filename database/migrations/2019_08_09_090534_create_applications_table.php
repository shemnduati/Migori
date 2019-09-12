<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index();
            $table->string('passport');
            $table->string('name');
            $table->string('email');
            $table->string('id_no');
            $table->string('reg_no');
            $table->string('bursary_type');
            $table->date('dob');
            $table->decimal('amount', 8, 2);
            $table->string('recommendation');
            $table->string('gender');
            $table->integer('status');
            $table->string('tel');
            $table->year('year');
            $table->integer('ward_id');
            $table->string('serial')->nullable();
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
        Schema::dropIfExists('applications');
    }
}
