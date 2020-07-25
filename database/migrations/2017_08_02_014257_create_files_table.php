<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('attachable_id');
            $table->string('attachable_type');
            $table->string('original_name');
            $table->string('file_name', 255);
            $table->string('folder_name', 255);
            $table->string('mime_type', 255);
            $table->string('size', 255);
            $table->string('url_path', 255);
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
        Schema::drop('files');
    }

}
