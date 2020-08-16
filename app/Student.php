<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table ="students";
    protected $fillable=[
        'name',
        'course_id',
        
    ];

    public function courses(){
        return $this->belongsToMany(Course::class,'course_student',
    'student_id','course_id')->withTimestamps();
    }
}
