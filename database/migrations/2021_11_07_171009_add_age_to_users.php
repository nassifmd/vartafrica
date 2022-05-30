<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable(); 
            $table->string('sex')->nullable(); 
            $table->string('target_package')->nullable(); 
            $table->string('save_amount')->nullable(); 
            $table->string('next_of_kin_name')->nullable(); 
            $table->string('next_of_kin_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
