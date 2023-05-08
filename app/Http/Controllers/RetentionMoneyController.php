<?php

namespace App\Http\Controllers;

use App\Models\RetentionMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RetentionMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rms = RetentionMoney::all();
        return response()->json([
            'status' => 200,
            'rms' => $rms,
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
            'rmStatus' => 'required',
            'rmDate' => 'required',
            'rmAmount' => 'required',
            'rmRemarks' => 'nullable',
            'rmState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return resrponse()->json([
                'message' => 'Unable to create retention money.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'rmStatus',
            'rmDate',
            'rmAmount',
            'rmRemarks',
            'rmState',
            'document_id']);

        $rm = RetentionMoney::create($data);

        return response()->json([
            'message' => 'Retention money created successfully.',
            'rm' => $rm,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RetentionMoney $retentionMoney)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RetentionMoney $retentionMoney)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RetentionMoney $retentionMoney)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $retentionMoney = RetentionMoney::find($id);
        $retentionMoney->delete();

        return response()->json([
            'message' => 'Retention money deleted successfully.',
        ], 200);
    }
}