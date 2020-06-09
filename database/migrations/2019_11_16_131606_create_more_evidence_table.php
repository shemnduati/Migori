<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoreEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_evidence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->integer('age');
            $table->text('disability');
            $table->text('ailment');
            $table->text('abandon');
            $table->text('employment');
            $table->text('business');
            $table->text('land');
            $table->text('assets');
            $table->string('who');
            $table->integer('status');
            $table->unsignedBigInteger('applicationId');
            $table->year('year');
            $table->timestamps();

            $table->foreign('applicationId')->references('id')->on('applications')
                ->onDelete('cascade');

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
        Schema::dropIfExists('more_evidence');
    }
}
