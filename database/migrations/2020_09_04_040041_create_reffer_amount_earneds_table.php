<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefferAmountEarnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reffer_amount_earneds', function (Blueprint $table) {
            $table->id();

            $table->integer('refferal_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->double('amount')->nullable();
            $table->integer('membership_id')->nullable();

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
        Schema::dropIfExists('reffer_amount_earneds');
    }
}
