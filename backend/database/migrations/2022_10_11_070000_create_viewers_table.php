<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewers', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('viewers_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('viewers_id')->references('id')->on('playlists');
             $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewers');
    }
}
