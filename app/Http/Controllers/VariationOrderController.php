<?php

namespace App\Http\Controllers;

use App\Models\VariationOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VariationOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vos = VariationOrder::all();
        return response()->json([
            'status' => 200,
            'vos' => $vos,
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
            'voStatus' => 'required',
            'voDate' => 'required',
            'voNumbers' => 'required',
            'voReasons' => 'required',
            'voRemarks' => 'nullable',
            'voState' => 'required',
            'voScope' => 'nullable',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create variation order.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'voStatus',
            'voDate',
            'voNumbers',
            'voReasons',
            'voRemarks',
            'voState',
            'voScope',
            'document_id']);

        $vo = VariationOrder::create($data);

        return response()->json([
            'message' => 'Variation order created successfully.',
            'vo' => $vo,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(VariationOrder $variationOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariationOrder $variationOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VariationOrder $variationOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $variationOrder = VariationOrder::find($id);
        $variationOrder->delete();

        return response()->json([
            'message' => 'Variation order deleted successfully.',
        ], 200);
    }
}