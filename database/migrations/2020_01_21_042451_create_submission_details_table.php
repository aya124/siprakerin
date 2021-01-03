<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('submission_id')->unsigned();
            $table->string('name');
            $table->enum('upload_type',['suratpengantar','suratbalasan']);
            $table->string('full_path');
            $table->timestamps();

            $table->foreign('submission_id')
                ->references('id')->on('submissions')
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
        Schema::dropIfExists('submission_details');
    }
}
