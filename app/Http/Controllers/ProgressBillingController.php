<?php

namespace App\Http\Controllers;

use App\Models\Progressbiling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgressBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pgs = Progressbiling::all();
        return response()->json([
            'status' => 200,
            'pgs' => $pgs,
        ]);
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
        $validator = Validator::make($request->all(), [
            'pgStatus' => 'required',
            'pgDate' => 'required',
            'pgNumbers' => 'nullable',
            'pgAmount' => 'nullable',
            'pgRemarks' => 'nullable',
            'pgState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create progress billing.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'pgStatus',
            'pgDate',
            'pgNumbers',
            'pgAmount',
            'pgRemarks',
            'pgState',
            'document_id']);

        $pg = Progressbiling::create($data);

        return response()->json([
            'message' => 'Progress billing created successfully.',
            'pg' => $pg,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Progressbiling $progressbiling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progressbiling $progressbiling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progressbiling $progressbiling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $progressbiling = Progressbiling::find($id);
        $progressbiling->delete();

        return response()->json([
            'message' => 'Progress billing deleted successfully.',
        ], 200);
    }
}