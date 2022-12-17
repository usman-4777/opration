<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployRequest;
use App\Http\Requests\UpdateEmployRequest;
use App\Models\Employ;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employs = Employ::all();
        return response()->json([
          'status' => 'success',
            'data' => $employs
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
     * @param  \App\Http\Requests\StoreEmployRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployRequest $request)
    {
        $validated = $request->validated();
        $employs =  Employ::create($validated);
        return response()->json([
            'status' => 'success',
            'message' => 'employee added sucessfully',
            'data' => $employs
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function show(Employ $employ)
    {
        return response()->json([
            'status' => 'success',
            'data' => $employ
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function edit(Employ $employ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployRequest  $request
     * @param  \App\Models\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployRequest $request, Employ $employ)
    {
        $validated = $request->validate();
        $employ->update($validated);
        return response()->json([
            'status' => 'succss',
            'message' => 'Employ updated successfully',
            'data' => $employ
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employ  $employ
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employ $employ)
    {
        $employ->delete();
        return response()->json([
            'status' => 'sucess',
            'message'=> 'employ deleted sucessfully',
            'data' => $employ
        ],200);
    }
}
