<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttandancesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attandances', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->nullable();
            $table->string('name_surname')->nullable();
            $table->string('date')->nullable();
            $table->time('come')->nullable();
            $table->time('go')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
