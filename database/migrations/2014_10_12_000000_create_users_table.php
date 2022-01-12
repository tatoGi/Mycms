<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('id_number')->nullable(); 
            $table->string('name_surname')->nullable(); 
            $table->string('photo')->nullable(); 
            $table->string('date')->nullable(); 
            $table->string('section')->nullable(); 
            $table->string('sub_section')->nullable(); 
            $table->string('position')->nullable(); 
            $table->string('mobile')->nullable(); 
            $table->integer('paid_vacation')->nullable(); 
            $table->integer('unpaid_vacation')->nullable(); 
            $table->integer('day_Off')->nullable(); 
            $table->integer('family_circumstances')->nullable(); 
            $table->integer('bulletin')->nullable(); 
            $table->integer('type_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
