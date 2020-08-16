<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        $studentWithCourses=Student::with('courses')->get();
        return response()->json($studentWithCourses,200);
    }
    public function store(Request $request)
    {
        $rules=[
            'student_id'=>'required',
            'course_id'=>'required',
            
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $createStudentWithCourses=CourseStudent::create($request->all());
        return response()->json($createStudentWithCourses,201);
    }
    public function destroy(CourseStudent $id)
    {
        try {
            $student=CourseStudent::findOrFail($id);
            $student->delete();
            return $this->errorResponse("Deleted Successfully!",200); 
          }
        catch(ModelNotFoundException $e) {
            return $this->errorResponse("Not Found!",404); 
        }
       
    }
}