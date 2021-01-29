<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('price')->nullable();
            
            $table->string('totalReturn')->nullable();
            $table->string('dailyEarning')->nullable();
            $table->string('dailyAds')->nullable();
            $table->string('referCommission')->nullable();
            $table->string('packegeDurration')->nullable();
            $table->string('minimumWithdraw')->nullable();
            $table->string('status')->nullable();
            /*
            1 active
            0 not active
            */
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
        Schema::dropIfExists('plans');
    }
}
