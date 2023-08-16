<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Qualifications');
            $table->string('department');
            $table->string('expert');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->text('dob');
            $table->text('joining');
            $table->string('salary');
            $table->text('image');
            $table->text('cv')->nullable();
            $table->string('teacher_status');
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
        Schema::dropIfExists('teachers');
    }
};
