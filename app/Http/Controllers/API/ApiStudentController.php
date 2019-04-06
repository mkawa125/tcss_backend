<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Student as StudentResource;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ApiStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::query()->orderBy('indexNumber', 'asc')->get();
        if (count($students) == 0){
            return response()->json([
                'error' => false,
                'message' => 'No students yet',
            ], 201);
        }else{
            return response()->json([
                'error' => false,
                'message' => 'students successfully retrieved',
                'students' => StudentResource::collection($students)
            ], 201);
        }
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
        $user_validator = Validator::make($request->all(), User::rules());
        if (!$user_validator){
            return response()->json($user_validator->errors(), 401);
        }else{
            $user = $request->all();
            $user['role'] = User::USER_ROLE_STUDENT;
            $user['is_changed'] = false;
            $user['name'] = $request->get('firstName').'  '.$request->get('surname');
            $user['password'] = bcrypt($request->input('surname'));
            $user_id = User::create($user)->id;
            if ($user_id){
                $student = $request->all();
                $student['userId'] = $user_id;
                $student_validator = Validator::make($request->all(), Student::rules());
                if (!$student_validator){
                    return response()->json($student_validator->errors(), 401);
                }else{
                    $student = Student::create($student);
                    return response()->json([
                        'error' => false,
                        'message' => 'student created',
                        'students' => new StudentResource($student),
                    ]);
                }
            }else{
                return response()->json([
                    'error' => true,
                    'message' => 'Failed to create student'
                ], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return response([
            'error' => false,
            'message' => 'success',
            'school' => new StudentResource($student),
        ]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
