<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_fours', function (Blueprint $table) {
            $table->id();
            $table->string('url_audio');
            $table->string('url_image')->nullable();
            $table->foreignId('part_id')->constrained();
            $table->text('paragraph');
            $table->text('translate')->nullable();
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
        Schema::dropIfExists('part_fours');
    }
}
