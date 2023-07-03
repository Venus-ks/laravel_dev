<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->string('version')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('type')->nullable();
            $table->string('subject')->nullable();
            $table->text('title');
            $table->text('author_info');
            $table->text('abstract');
            $table->text('keywords')->nullable();
            $table->text('abstract_file')->nullable();
            $table->string('presenter')->nullable();
            $table->text('co_authors')->nullable();
            $table->string('country');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
