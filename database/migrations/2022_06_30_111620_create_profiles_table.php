<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('token')->nullable();
            $table->string('ssc_year')->nullable();
            $table->string('ssc_marks')->nullable();
            $table->string('hsc_year')->nullable();
            $table->string('hsc_marks')->nullable();
            $table->string('bachelor_year')->nullable();
            $table->string('bachelor_CGPA')->nullable();
            $table->string('master_year')->nullable();
            $table->string('master_CGPA')->nullable();
            $table->string('step')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
