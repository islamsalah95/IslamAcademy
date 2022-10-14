<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');//
            $table->string('course_title');//
            $table->smallInteger('course_price');//
            $table->unsignedBigInteger('user_id');//
            $table->string('course_image');//
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();


            $table->foreign('course_id')->references('id')->on('courses');
            // $table->foreign('course_title')->references('title')->on('courses');
            // $table->foreign('course_price')->references('price')->on('courses');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('course_image')->references('image')->on('courses');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
