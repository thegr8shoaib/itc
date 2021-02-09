<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();

            $table->double('amount')->nullable();
            $table->double('startingBalance')->nullable();
            $table->double('closingBalance')->nullable();

            $table->timestamp('date')->nullable();
            $table->text('note')->nullable();
            $table->text('description')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('type')->nullable();
            // 1- credit
            // 2- debit

            $table->integer('purchase_Id')->nullable();


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
        Schema::dropIfExists('balances');
    }
}
