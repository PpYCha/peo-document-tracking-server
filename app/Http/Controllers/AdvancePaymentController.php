<?php

namespace App\Http\Controllers;

use App\Models\AdvancePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvancePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aps = AdvancePayment::all();
        return response()->json([
            'status' => 200,
            'aps' => $aps,
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
            'apStatus' => 'required',
            'apDate' => 'required',
            'ap' => 'required',
            'apRemarks' => 'nullable',
            'apState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create advance payment.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'apStatus',
            'apDate',
            'ap',
            'apRemarks',
            'apState',
            'document_id']);

        $ap = AdvancePayment::create($data);

        return response()->json([
            'message' => 'Ap created successfully.',
            'ap' => $ap,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AdvancePayment $advancePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdvancePayment $advancePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdvancePayment $advancePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdvancePayment $advancePayment)
    {
        $advancePayment->delete();

        return response()->json([
            'message' => 'advance payment deleted successfully.',
        ], 200);
    }
}