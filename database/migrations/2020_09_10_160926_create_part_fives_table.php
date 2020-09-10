<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartFivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_fives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('part_id')->constrained();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->text('explain')->nullable();
            $table->text('vocabularies')->nullable();
            $table->text('translate')->nullable();
            $table->text('format')->nullable();
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
        Schema::dropIfExists('part_fives');
    }
}
