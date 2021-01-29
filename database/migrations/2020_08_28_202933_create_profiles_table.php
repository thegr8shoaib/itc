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
            $table->integer('user_id');

            $table->string('cover')->nullable();
            $table->string('bio')->nullable();
            $table->string('company')->nullable();
            $table->string('website')->nullable();

            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();

            $table->string('gender')->nullable();

            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('codepen')->nullable();
            $table->string('slack')->nullable();

      

            $table->string('mobile')->nullable();

            $table->date('dob')->nullable();

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
