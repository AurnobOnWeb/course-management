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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('qualification');
            $table->date('dob');
            $table->string('parent_name');
            $table->string('nid')->nullable();
            $table->string('board_exam')->nullable();
            $table->string('board_name')->nullable();
            $table->string('cirtificate')->nullable();
            $table->string('reg_ssc')->nullable();
            $table->string('roll_ssc')->nullable();
            $table->string('student_number');
            $table->string('parent_number');
            $table->string('address');
            $table->string('image');
            $table->string('status');
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
        Schema::dropIfExists('students');
    }
};
