<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name',
        'address',
        'phone',
        'email',
        'note',
        'intrested_course',
        'date'
    ];
    public function course(){
        return $this->hasMany('App\Models\course', 'id' ,'intrested_course' );
     }
}
