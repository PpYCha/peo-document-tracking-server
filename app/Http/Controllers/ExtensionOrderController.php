<?php

namespace App\Http\Controllers;

use App\Models\ExtensionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExtensionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eos = ExtensionOrder::all();
        return response()->json([
            'status' => 200,
            'eos' => $eos,
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
            'eoStatus' => 'required',
            'eoDate' => 'required',
            'eoNumbers' => 'required',
            'eoReasons' => 'required',
            'eoRemarks' => 'nullable',
            'eoState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create extension order.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'eoStatus',
            'eoDate',
            'eoNumbers',
            'eoReasons',
            'eoRemarks',
            'eoState',
            'document_id']);

        $eo = ExtensionOrder::create($data);

        return response()->json([
            'message' => 'Extension order created successfully.',
            'eo' => $eo,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExtensionOrder $extensionOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtensionOrder $extensionOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExtensionOrder $extensionOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $extensionOrder = ExtensionOrder::find($id);
        $extensionOrder->delete();

        return response()->json([
            'message' => 'Extension order deleted successfully.',
        ], 200);
    }
}