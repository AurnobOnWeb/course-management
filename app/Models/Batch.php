<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory; 
    protected $fillable = [
        'batch_name',
        'batch_code',
        'course_id',
        'hours',
        'week_day',
        'time',
        'teacher_id',
        'start_date',
        'end_date',
        'batch_status',
        'student_count',
        'student_limit',
    ];
    public function setNameAttribute($val){
        $this->attributes['batch_name'] = ucwords($val);
    }

    public function course(){
       return $this->hasMany('App\Models\course', 'id' ,'course_id' );
    }
    public function teacher(){
        return $this->hasMany('App\Models\Teacher', 'id' ,'teacher_id' );
     }
     public function payments()
     {
         return $this->hasMany(Payment::class);
     }
}
