<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('no_inv');
            $table->string('status')->default('pending');
            $table->string('notes')->nullable();
            $table->char('total_price', 50);
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
        Schema::dropIfExists('transacations');
    }
}
