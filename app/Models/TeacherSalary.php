<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSalary extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'teacher_id',
        'allowances',
        'deductions',
        'deductions_reason',
        'bonuses',
        'overTime_hour',
        'overTime_CostPer',
        'total_salary',
        'payment_method',
        'start_date',
        'end_date',
        'payment_date',
        'payment_month'
    ];
    public function teachers(){
        return $this->hasMany('App\Models\Teacher', 'id' ,'teacher_id' );
     }
}
