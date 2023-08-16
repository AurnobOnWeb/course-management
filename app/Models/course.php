<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'course_name',
        'description',
        'course_price',
        'discount',
        'discount_price',
        'course_status',
        'batch_count',
        'student_count',
    ];
    public function setNameAttribute($val){
        $this->attributes['course_name'] = ucwords($val);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
}
