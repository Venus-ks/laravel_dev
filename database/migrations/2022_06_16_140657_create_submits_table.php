<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submits', function (Blueprint $table) {
            $table->id();
            $table->string('version')->nullable();
            // $table->string('level')->nullable();
            // $table->string('option')->nullable();
            $table->string('name');
            // $table->string('eng_name')->nullable();
            $table->string('price');
            $table->string('sosok');
            $table->string('job')->nullable();
            $table->string('email');
            $table->string('cellphone')->nullable();
            // $table->string('zip')->nullable();
            // $table->string('addr1')->nullable();
            // $table->string('addr2')->nullable();
            // $table->string('tel')->nullable();
            // $table->text('extra_guest')->nullable();
            $table->string('status')->default('접수중');
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
        Schema::dropIfExists('submits');
    }
}
