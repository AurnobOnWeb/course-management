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
        Schema::create('teacher_salaries', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->string('allowances');
            $table->string('deductions');
            $table->string('deductions_reason');
            $table->string('bonuses');
            $table->string('overTime_hour');
            $table->string('overTime_CostPer');
            $table->string('total_salary');
            $table->string('payment_method');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('payment_date');
            $table->string('payment_month');
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
        Schema::dropIfExists('teacher_salaries');
    }
};
