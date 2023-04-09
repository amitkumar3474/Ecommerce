<?php

namespace App\Http\Controllers\API;


use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response($students, 201);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required'
        ]);

        if (!$validator->fails()) {
            $student = Student::create($request->only('name', 'father_name', 'fess', 'phone_number', 'class', 'st_image'));
            $responseData = [
                "status" => true,
                "message" => "Student created successfully...",
                "data" => $student
            ];
            return response($responseData, 201);
        } else {
            return response(['status' => false, 'message' => 'validation failed...'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $student->update($request->all());
        $responseData = [
            "status" => true,
            "message" => "Student Updated successfully...",
            "data" => $student
        ];
        return response($responseData, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response(
            [
                'status' => true,
                'message' => 'Student deleted...'
            ],
            200
        );
    }
}
