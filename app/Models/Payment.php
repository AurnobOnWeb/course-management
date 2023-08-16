<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'student_id',
        'course_id',
        'batch_id',
        'course_price',
        'special_discount',
        'course_fee',
        'payment',
        'payment_date',
        'payment_status',
    ];

    
    public function course(){
        return $this->hasMany('App\Models\course', 'id' ,'course_id' );
     }
     public function batch(){
         return $this->hasMany('App\Models\Batch', 'id' ,'batch_id' );
      }
      public function student(){
        return $this->hasMany('App\Models\Student', 'id' ,'student_id' );
     }
     
}
