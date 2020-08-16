<?php

namespace App\Http\Controllers\API;

use App\Course;
use App\Student;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::get();
        return response()->json(['data'=>$students],200);
        //return $this->showAll($students);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|min:4',
            
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $createStudent=Student::create($request->all());
        return response()->json($createStudent,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          try {
            $student=Student::findOrFail($id);
            return $this->showOne($student);
          }
          catch(ModelNotFoundException $e) {
            return $this->errorResponse("Not Found!",404); 
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $updateStudent=Student::find($student->id);
        if(is_null($updateStudent)){
            return response()->json(["msg"=>'Record is not available'],404);
        }
        $updateStudent->update($request->all());
        return response()->json($updateStudent,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $student=Student::findOrFail($id);
            $student->delete();
            return $this->errorResponse("Deleted Successfully!",200); 
          }
        catch(ModelNotFoundException $e) {
            return $this->errorResponse("Not Found!",404); 
        }
       
    }
    public function courses(Student $student){
      $viewCourses=$student->courses()->get();
      return $this->showAll($viewCourses);
    }
}
