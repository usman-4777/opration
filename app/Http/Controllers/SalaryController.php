<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresalaryRequest;
use App\Http\Requests\UpdatesalaryRequest;
use App\Models\salary;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = salary::all();
        return response()->json([
            'status' => 'sucess',
            'data' => $salary
        ],200);
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
     * @param  \App\Http\Requests\StoresalaryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresalaryRequest $request)
    {
        $validatd = $request->validated();
        $salary = salary::create($validatd);
        return response()->json([
            'status' => 'sucess',
            'message' => 'salary added sucefully',
            'data' => $salary
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(salary $salary)
    {
        return response()->json([
            'status' => 'success',
            'data' => $salary
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesalaryRequest  $request
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesalaryRequest $request, salary $salary)
    {
        $salary->update();
        return response()->json([
            'status' => 'success',
            'message' => 'salary update sucessfuly',
            'data' => $salary
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(salary $salary)
    {
        $salary->delete();
        return response()->json([
            'status'=> 'success',
            'message' => 'salary deleted sucessfully',
            'date' => $salary
        ],200);
    }
}
