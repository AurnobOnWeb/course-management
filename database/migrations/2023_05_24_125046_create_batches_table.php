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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->string('batch_code');
            $table->string('course_id');
            $table->string('hours');
            $table->string('week_day');
            $table->string('time');
            $table->string('teacher_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('batch_status');
            $table->string('student_count')->default(0);
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
        Schema::dropIfExists('batches');
    }
};
