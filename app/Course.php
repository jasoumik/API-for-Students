<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table ="courses";
    protected $fillable=[
        'name',
    ];

    public function students(){
        return $this->belongsToMany(Student::class,'course_student',
        'course_id','student_id');
    }
}
