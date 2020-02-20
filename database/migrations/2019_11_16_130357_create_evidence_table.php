<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('inheritance');
            $table->text('whyApply');
            $table->text('finSupport');
            $table->text('specialNeeds');
            $table->text('OtherSpecialNeeds');
            $table->text('familyConflict');
            $table->text('familyHouse');
            $table->text('otherDisabilities');
            $table->text('siblingsInfo');
            $table->string('hear');
            $table->text('hearDetails')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('applicationId');
            $table->year('year');
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
        Schema::dropIfExists('evidence');
    }
}
