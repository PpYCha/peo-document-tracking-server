<?php

namespace App\Http\Controllers;

use App\Models\SuspensionResumption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuspensionResumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $srs = SuspensionResumption::all();
        return response()->json([
            'status' => 200,
            'srs' => $srs,
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
            'srStatus' => 'required',
            'srDate' => 'required',
            'srNumbers' => 'required',
            'srReasons' => 'required',
            'srRemarks' => 'nullable',
            'srState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create suspension resumption.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'srStatus',
            'srDate',
            'srNumbers',
            'srReasons',
            'srRemarks',
            'srState',
            'document_id']);

        $sr = SuspensionResumption::create($data);

        return response()->json([
            'message' => 'Suspension resumption created successfully.',
            'sr' => $sr,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuspensionResumption $suspensionResumption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuspensionResumption $suspensionResumption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuspensionResumption $suspensionResumption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suspensionResumption = SuspensionResumption::find($id);
        $suspensionResumption->delete();

        return response()->json([
            'message' => 'Suspension resumption deleted successfully.',
        ], 200);
    }
}