<?php

namespace App\Http\Controllers;

use App\Models\Abc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abcs = Abc::all();
        return response()->json([
            'status' => 200,
            'abcs' => $abcs,
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
            'abcStatus' => 'required',
            'abcDate' => 'required',
            'abc' => 'required',
            'abcRemarks' => 'nullable',
            'abcState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create abc.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'abcStatus',
            'abcDate',
            'abc',
            'abcRemarks',
            'abcState',
            'document_id']);

        $abc = Abc::create($data);

        return response()->json([
            'message' => 'Abc created successfully.',
            'abc' => $abc,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Abc $abc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abc $abc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $document_id)
    {
        $validator = Validator::make($request->all(), [
            'abcStatus' => 'required',
            'abcDate' => 'required',
            'abc' => 'required',
            'abcRemarks' => 'nullable',
            'abcState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to update abc.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $abc = Abc::where('document_id', $document_id)->firstOrFail();

        $data = $request->only([
            'abcStatus',
            'abcDate',
            'abc',
            'abcRemarks',
            'abcState',
            'document_id',
        ]);

        $abc->update($data);

        return response()->json([
            'message' => 'Abc updated successfully.',
            'abc' => $abc,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abc $abc)
    {

        $abc->delete();

        return response()->json([
            'message' => 'abc deleted successfully.',
        ], 200);
    }
}