<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlanceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blance_histories', function (Blueprint $table) {
            $table->id();

            $table->integer('video_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('packege')->nullable();
            $table->double('price')->nullable();

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
        Schema::dropIfExists('blance_histories');
    }
}
