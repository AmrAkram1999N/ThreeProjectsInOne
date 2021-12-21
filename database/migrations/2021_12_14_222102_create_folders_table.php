<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('account_id')->unsigned();
            $table->string('main_folder');
            $table->string('folder_path');
            $table->string('directory_path');
            $table->string('folder_name');
            $table->string('folder_size')->nullable();
            $table->string('icon');
            $table->integer('number_of_folders');

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

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
        Schema::dropIfExists('folders');
    }
}
