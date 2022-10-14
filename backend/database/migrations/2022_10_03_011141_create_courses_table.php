<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('coach');
            $table->string('title');
            $table->text('desc_en');
            $table->text('des_ar');
            $table->smallInteger('price');
            $table->string('image');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

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
        Schema::dropIfExists('courses');
    }
}
