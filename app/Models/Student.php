<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'student_email',
        'student_name',
        'qualification',
        'nid',
        'board_exam',
        'board_name',
        'cirtificate',
        'reg_ssc',
        'roll_ssc',
        'parent_name',
        'student_number',
        'parent_number',
        'address',
        'image',
        'status', 

    ];
    
    public function course(){
        return $this->hasMany('App\Models\course', 'id' ,'course_id' );
     }
     public function batch(){
         return $this->hasMany('App\Models\Batch', 'id' ,'batch_id' );
      }

}
