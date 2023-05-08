<?php

namespace App\Http\Controllers;

use App\Models\FirstBilling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FirstBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fbs = FirstBilling::all();
        return response()->json([
            'status' => 200,
            'fbs' => $fbs,
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
            'fbStatus' => 'required',
            'fbDate' => 'required',
            'fbAmount' => 'required',
            'fbRemarks' => 'nullable',
            'fbState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create first billing.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'fbStatus',
            'fbDate',
            'fbAmount',
            'fbRemarks',
            'fbState',
            'document_id']);

        $fb = FirstBilling::create($data);

        return response()->json([
            'message' => 'First billing created successfully.',
            'fb' => $fb,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FirstBilling $firstBilling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FirstBilling $firstBilling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FirstBilling $firstBilling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $firstBilling = FirstBilling::find($id);
        $firstBilling->delete();

        return response()->json([
            'message' => 'First billing deleted successfully.',
        ], 200);
    }
}