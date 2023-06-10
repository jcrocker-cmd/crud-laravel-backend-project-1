<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use DB;
use Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::all();
        if ($students->count() > 0) {
            return response()->json([
                'status' => 200,
                'students' => $students
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'students' => 'No Records Found'
            ], 404
        );
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:20|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
           $students = Students::create([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
           ]);

           if ($students) {
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Succesfully'
            ], 200);
           } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something Went Wrong',
            ], 500);
           }

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Students::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Student Found"
            ], 404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Students::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Such Student Found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|max:20|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
           $student = Students::find($id);

           if ($student) {

            $student->update([
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
           ]);

            return response()->json([
                'status' => 200,
                'message' => 'Student Edited Succesfully'
            ], 200);
           } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found',
            ], 404);
           }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Students::find($id);

        if ($student) {
            $student->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Student Deleted Succesfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found',
            ], 404);
        }
        
    }
}
