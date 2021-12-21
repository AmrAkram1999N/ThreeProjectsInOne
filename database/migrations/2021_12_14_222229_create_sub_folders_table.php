<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_folders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folder_id')->unsigned();
            $table->integer('account_id')->unsigned();

            $table->string('main_folder');
            $table->string('folder_path');
            $table->string('directory_path');
            $table->string('folder_name');
            $table->string('folder_size')->nullable();
            $table->string('icon');
            $table->integer('number_of_folders');
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
        Schema::dropIfExists('sub_folders');
    }
}
