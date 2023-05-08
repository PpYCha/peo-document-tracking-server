<?php

namespace App\Http\Controllers;

use App\Models\FinalBilling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinalBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $finalbs = FinalBilling::all();
        return response()->json([
            'status' => 200,
            'finalbs' => $finalbs,
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
            'finalBilling_Status' => 'required',
            'finalBilling_Date' => 'required',
            'finalBilling_Amount' => 'required',
            'finalBilling_Remarks' => 'nullable',
            'finalBilling_State' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create final billing.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'finalBilling_Status',
            'finalBilling_Date',
            'finalBilling_Amount',
            'finalBilling_Remarks',
            'finalBilling_State',
            'document_id']);

        $fb = FinalBilling::create($data);

        return response()->json([
            'message' => 'Final billing created successfully.',
            'fb' => $fb,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FinalBilling $finalBilling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinalBilling $finalBilling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FinalBilling $finalBilling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $finalBilling = FinalBilling::find($id);
        $finalBilling->delete();

        return response()->json([
            'message' => 'Final billing deleted successfully.',
        ], 200);
    }
}