<?php

namespace App\Http\Controllers;

use App\Models\ExtensionResumption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExtensionResumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ers = ExtensionResumption::all();
        return response()->json([
            'status' => 200,
            'ers' => $ers,
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
            'erStatus' => 'required',
            'erDate' => 'required',
            'erNumbers' => 'required',
            'erReasons' => 'required',
            'erRemarks' => 'nullable',
            'erState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create extension resumption.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'erStatus',
            'erDate',
            'erNumbers',
            'erReasons',
            'erRemarks',
            'erState',
            'document_id']);

        $er = ExtensionResumption::create($data);

        return response()->json([
            'message' => 'Extension Resumption created successfully.',
            'er' => $er,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExtensionResumption $extensionResumption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtensionResumption $extensionResumption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExtensionResumption $extensionResumption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $extensionResumption = ExtensionResumption::find($id);
        $extensionResumption->delete();

        return response()->json([
            'message' => 'Extension resumption deleted successfully.',
        ], 200);
    }
}