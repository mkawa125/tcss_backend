<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Http\Resources\School as SchoolResource;
use Illuminate\Support\Facades\Validator;

class ApiSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::query()->orderBy('name', 'asc')
//            ->with('students')
            ->get();
        return response([
            'success'=> true,
            'message' => 'schools retrieved',
            'data' => SchoolResource::collection($schools)
        ], 200);
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), School::rules());
        if ($validator->fails()){
            return response()->json($validator->errors(), 401 );
        }else{
            $school = School::create($request->all());
            return response()->json([
                'error' => false,
                'message' => 'school successfully created',
                'data' => new SchoolResource($school),
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return response([
            'error' => false,
            'message' => 'success',
            'data' => new SchoolResource($school)
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $validator = Validator::make($request->all(), School::rules());
        if ($validator->fails()){
            return response($validator->errors(), 404);
        }else{
            School::query()->where('id', $school['id'])->update($request->all());
            $school->refresh();
            return response()->json([
                'error' => false,
                'message' => 'school updated',
                'data' => new SchoolResource($school),
            ], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        School::query()->where('id', $request->school)->delete();
        $schools = School::query()->orderBy('name', 'asc')
//            ->with('students')
            ->get();
        return response([
            'success'=> true,
            'message' => 'schools deleted',
            'data' => SchoolResource::collection($schools)
        ]);
    }
}
