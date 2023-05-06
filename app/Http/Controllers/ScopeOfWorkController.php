<?php

namespace App\Http\Controllers;

use App\Models\ScopeOfWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScopeOfWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sow = ScopeOfWork::all();
        return response()->json([
            'status' => 200,
            'sows' => $sow,
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
            'sowStatus' => 'required',
            'sowDate' => 'required',
            'sow' => 'required',
            'sowRemarks' => 'nullable',
            'sowState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to create sow.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->only([
            'sowStatus',
            'sowDate',
            'sow',
            'sowRemarks',
            'sowState',
            'document_id']);

        $sow = ScopeOfWork::create($data);

        return response()->json([
            'message' => 'Sow created successfully.',
            'sow' => $sow,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ScopeOfWork $scopeOfWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ScopeOfWork $scopeOfWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $document_id)
    {
        $validator = Validator::make($request->all(), [
            'sowStatus' => 'required',
            'sowDate' => 'required',
            'sow' => 'required',
            'sowRemarks' => 'nullable',
            'sowState' => 'required',
            'document_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Unable to update sow.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $sow = ScopeOfWork::where('document_id', $document_id)->firstOrFail();

        $data = $request->only([
            'sowStatus',
            'sowDate',
            'sow',
            'sowRemarks',
            'sowState',
            'document_id',
        ]);

        $sow->update($data);

        return response()->json([
            'message' => 'Sow updated successfully.',
            'sow' => $sow,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScopeOfWork $scopeOfWork)
    {
        $scopeOfWork->delete();

        return response()->json([
            'message' => 'Sow deleted successfully.',
        ], 200);
    }
}