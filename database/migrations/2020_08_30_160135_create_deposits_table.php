<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();

            $table->string('transectionId')->nullable();
            $table->string('gateway')->nullable();
            $table->string('amount')->nullable();
            $table->string('image')->nullable();

            $table->integer('status')->default(1);

            /*
            1 Pending
            2 Approved
            3 Declined
            */

            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('deposits');
    }
}
