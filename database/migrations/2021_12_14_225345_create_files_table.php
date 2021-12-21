<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folder_id')->unsigned()->nullable();
            $table->integer('account_id')->unsigned();
            $table->string('main_folder');

            $table->string('file_path_db');
            $table->string('folder_path_directory');
            $table->string('file_path_directory');

            $table->string('file_name');
            $table->string('file_type');
            $table->string('file_size');
            $table->string('icon');
            $table->integer('number_of_files');
            $table->timestamps();

            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
}
