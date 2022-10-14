<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->unsignedBigInteger('course_id');//
                $table->string('video');
                $table->smallInteger('viewers');
                $table->text('content');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();

                $table->foreign('course_id')->references('id')->on('courses');




            });
            Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlists');
    }
}
