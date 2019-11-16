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
            $table->binary('passport')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('id_no')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('bursary_type')->nullable();
            $table->date('dob')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->decimal('rec_amount', 12, 2)->nullable();
            $table->string('recommendation')->nullable();
            $table->string('gender')->nullable();
            $table->integer('status')->nullable();
            $table->string('tel')->nullable();
            $table->year('year')->nullable();
            $table->integer('ward_id')->nullable();
            $table->string('serial')->nullable();

            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('parentName')->nullable();
            $table->string('box')->nullable();
            $table->string('alt_tel')->nullable();
            $table->integer('county')->nullable();
            $table->string('subcounty')->nullable();
            $table->string('location')->nullable();
            $table->string('sublocation')->nullable();
            $table->decimal('kcpeMarks', 8, 2)->nullable();
            $table->string('indexNo')->nullable();
            $table->binary('resultslip')->nullable();
            $table->string('kcpeYear')->nullable();
            $table->text('repeatQuiz')->nullable();
            $table->text('kcpeQuiz')->nullable();
            $table->string('secSchoolName')->nullable();
            $table->string('classification')->nullable();
            $table->integer('applicationId')->nullable();
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
