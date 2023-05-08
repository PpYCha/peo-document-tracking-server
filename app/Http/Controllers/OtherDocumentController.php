<?php

namespace App\Http\Controllers;

use App\Models\OtherDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtherDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ods = OtherDocument::all();
        return response()->json([
            'status' => 200,
            'ods' => $ods,
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
            'odStatus' => 'required',
            'odDate' => 'required',
            'odDocumentType' => 'required',
            'odRemarks' => 'nullable',
            'odState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create other document.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'odStatus',
            'odDate',
            'odDocumentType',
            'odRemarks',
            'odState',
            'document_id']);

        $od = OtherDocument::create($data);

        return response()->json([
            'message' => 'Other document created successfully.',
            'od' => $od,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(OtherDocument $otherDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OtherDocument $otherDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OtherDocument $otherDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $otherDocument = OtherDocument::find($id);
        $otherDocument->delete();

        return response()->json([
            'message' => 'Other document deleted successfully.',
        ], 200);
    }
}