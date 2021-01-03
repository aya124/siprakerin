<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubmissionStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_student', function (Blueprint $table) {
            $table->bigInteger('submission_id')->unsigned();
            // $table->char('username')->unsigned();

            $table->foreign('submission_id')
                ->references('id')->on('submissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            // $table->foreign('username')
            //     ->references('username')->on('users')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submission_student');
    }
}
