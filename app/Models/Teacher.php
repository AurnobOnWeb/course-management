<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

use App\Models\TeacherSalary;
class Teacher extends Model
{
    use HasFactory  , HasRoles; 
    
    protected $fillable = [
        'name',
        'Qualifications',
        'department',
        'expert',
        'phone',
        'email',
        'address',
        'dob',
        'joining',
        'salary',
        'image',
        'cv',
        'teacher_status',
    ];
    public function setNameAttribute($val){
        $this->attributes['name'] = ucwords($val);
    }
    public function teacher_salaries()
    {
        return $this->hasMany(TeacherSalary::class);
    }
}
