<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class McqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Question');
            $table->string('Ans1');
            $table->string('Ans2');
            $table->string('Ans3');
            $table->string('Ans4');
            $table->string('Correct');
            $table->rememberToken();
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
        Schema::dropIfExists('mcq');
    }
}
