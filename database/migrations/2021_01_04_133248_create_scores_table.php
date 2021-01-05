<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('score_1');
            $table->integer('score_2');
            $table->integer('score_3');
            $table->integer('score_4');
            $table->integer('score_5');
            $table->integer('score_6');
            $table->timestamps();
        });

        Schema::table('submissions', function (Blueprint $table) {
            $table->unsignedBigInteger('score_id')->nullable();

            $table->foreign('score_id')->references('id')->on('scores')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign('submissions_score_id_foreign');            
            $table->dropColumn('score_id');
        });
        Schema::dropIfExists('scores');
    }
}
