<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->bigInteger('username')->unsigned();
            $table->bigInteger('industry_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('username')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('industry_id')
                ->references('id')->on('industries')
                ->onDelete('cascade');
            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('cascade');
            $table->foreign('status_id')
                ->references('id')->on('statuses')
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
        Schema::dropIfExists('submissions');
    }
}
