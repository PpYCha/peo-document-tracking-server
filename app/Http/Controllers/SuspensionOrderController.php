<?php

namespace App\Http\Controllers;

use App\Models\SuspensionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuspensionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sos = SuspensionOrder::all();
        return response()->json([
            'status' => 200,
            'sos' => $sos,
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
            'soStatus' => 'required',
            'soDate' => 'required',
            'soNumbers' => 'required',
            'soReasons' => 'required',
            'soRemarks' => 'nullable',
            'soState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create suspension order.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'soStatus',
            'soDate',
            'soNumbers',
            'soReasons',
            'soRemarks',
            'soState',
            'document_id']);

        $so = SuspensionOrder::create($data);

        return response()->json([
            'message' => 'Suspension order created successfully.',
            'so' => $so,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuspensionOrder $suspensionOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuspensionOrder $suspensionOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuspensionOrder $suspensionOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suspensionOrder = SuspensionOrder::find($id);
        $suspensionOrder->delete();

        return response()->json([
            'message' => 'Suspension order deleted successfully.',
        ], 200);
    }
}