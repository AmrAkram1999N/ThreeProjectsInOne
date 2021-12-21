<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('back_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->nullable()->unsigned();
            $table->string('clientname');
            $table->string('telegram_id')->nullable();
            $table->string('telegramUsername')->nullable();
            $table->integer('clientnumber')->unique();
            $table->string('status')->default('null');
            $table->timestamps();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('back_services');
    }
}
