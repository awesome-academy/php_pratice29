<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFullTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_full_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('correct_sentences_listening');
            $table->integer('correct_sentences_reading');
            $table->foreignId('full_test_id')->constrained();
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
        Schema::dropIfExists('user_full_tests');
    }
}
