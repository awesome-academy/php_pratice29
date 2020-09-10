<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSkillTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_skill_tests', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('correct_sentences');
            $table->tinyInteger('number_question');
            $table->foreignId('skill_test_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->time('spent_time');
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
        Schema::dropIfExists('user_skill_tests');
    }
}
