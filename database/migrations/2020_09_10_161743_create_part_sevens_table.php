<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartSevensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_sevens', function (Blueprint $table) {
            $table->id();
            $table->text('paragraph');
            $table->text('translate')->nullable();
            $table->string('url_image')->nullable();
            $table->text('explain')->nullable();
            $table->text('vocabulary')->nullable();
            $table->foreignId('topic_id')->constrained();
            $table->foreignId('part_id')->constrained();
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
        Schema::dropIfExists('part_sevens');
    }
}
